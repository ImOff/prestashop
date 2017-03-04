<?php
if (!defined('_PS_VERSION_'))
	exit;

abstract class Type
{
	protected $query = null;

	function __construct($query)
	{
		$this->query = $query;
	}

	abstract function getInput($name);
}

class Select extends Type
{
	private $tableName = null;

	private $list = null;

	private $labelForAll = null;

	function __construct($query, $tableName, $labelForAll)
	{
		parent::__construct($query);
		$this->tableName = $tableName;
		$this->labelForAll = $labelForAll;

		$sql = new DbQuery();
		$sql->select('*')->from(pSQL($tableName));

		if ($results = Db::getInstance()->ExecuteS($sql))
		{
			$this->list = array();
			foreach ($results as $row)
				$this->list[] = array('id' => $row['id_' . $tableName], 'name' => $row['name']);
		}
	}

	function getInput($name)
	{
		$html = null;

		$html .= '<select name="s_' . $name . '">';
		$html .= '<option value="0">' . $this->labelForAll . '</option>';
		foreach ($this->list as $element)
			$html .= '<option value="' . $element['id'] . '">' . $element['name'] . '</option>';
		$html .= '</select>';

		return $html;
	}
}

class None extends Type
{
	function __construct($query)
	{
		parent::__construct($query);
	}

	function getInput($name)
	{
		return null;
	}
}

class Text extends Type {
	private $tableName = null;
	private $placeholder = null;

	function __construct($query, $tableName, $placeholder) {
		parent::__construct($query);
		$this->tableName = $tableName;
		$this->placeholder = $placeholder;
	}

	function getInput ($name) {
		$html = null;
		$html .= '<input type="number" name="" min="1" max="99" value="20">';
		$html .= '<input type="number" name="" min="1" max="99" value="20">';
		return $html;
	}
}

class Criteria
{
	private $name = null;

	private $description = null;

	private $type = null;

	function __construct($name, $description, $type)
	{
		$this->name = $name;
		$this->description = $description;
		$this->type = $type;
	}

	function getHtml()
	{
		$html = null;

		$html .= '<label>' . $this->description . '</label>';
		$html .= '<input type="checkbox" name="' . $this->name . '_on">';
		$html .= '<input type="checkbox" name="' . $this->name . '_off">';
		$html .= $this->type->getInput($this->name) . '<br>';

		return $html;
	}
}

class CriteriaGenerator {
	function __construct () {

	}
	function Create ($canonical, $desc, $nameTable, $placeholder, $isSelect, $column) {
		switch ($isSelect) {
			case 'none':
				return new Criteria($canonical, $desc, new None($canonical . ' # @'));
			case 'text' :
				return new Criteria($canonical, $desc, new Text($canonical . ' # @', $nameTable, $placeholder));
			default:
				return new Criteria($canonical, $desc, new Select($column . ' # (@)', $nameTable, $placeholder));
		}
	}

}

class MyModule extends Module
{
	private $criterias = null;

	public function __construct()
	{
		$this->name = 'mymodule';
		$this->tab = 'administration';
		$this->version = '1.0.0';
		$this->author = 'Flavien Schriever';

		$this->need_instance = 0;
		$this->ps_version_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
		$this->bootstrap = true;

		parent::__construct();

		$this->displayName = $this->l('My module');
		$this->description = $this->l('This is a simple module.');

		if (!Configuration::get('MYMODULE_NAME'))
			$this->warning = $this->l('No name provider');

		$this->criterias[] = new Criteria('newsletter', 'Newsletter (if enabled)',
			new None('newsletter # @'));
		$this->criterias[] = new Criteria('language', 'Language(s)',
			new Select('id_lang # (@)', 'lang', $this->l('All languages')));

		$this->parseXml();
	}

	public function parseXml () {
		$criter = new CriteriaGenerator();
		$pwd = getcwd();
		$file = file_get_contents($pwd . '/../../..' . $this->_path . 'criteria.xml');
		$this->xml = simplexml_load_string($file);
		foreach ($this->xml as $key => $value) {
			$this->switch = array();
			foreach ($value as $key1 => $value1) {
				$isSelect = "";
				switch ($key1) {
					case 'canonical':
						$this->canonical = $value1;
						break;
					case 'description':
						$this->desc = $value1;
						break;
					case 'switch':
						array_push($this->switch, $value1);
						break;
					case 'type' :
						foreach ($value1 as $key2 => $value2) {
							switch ($key2) {
								case 'name' :
									$this->option = $value2;
									break;
								case 'nameTable':
									$this->nameTable = $value2;
									break;
								case 'column':
									$this->column = $value2;
								case 'placeholder':
									$this->placeholder = $value2;
									break;
								default:
									break;
							}
						}
					default:
						break;
				}
			}
			$this->criterias[] = $criter->Create($this->canonical, $this->desc, $this->nameTable, $this->l($this->placeholder), $this->option, $this->column);
		}
	}

	public function install()
	{
		if (Shop::isFeatureActive())
			Shop::setContext(Shop::CONTEXT_ALL);

		return parent::install() &&
			$this->registerHook('leftColumn') &&
			$this->registerHook('header') &&
			$this->registerHook('adminStatsModules') &&
			Configuration::updateValue('MYMODULE_NAME', 'my friend');
	}

	public function uninstall()
	{
		if (!parent::uninstall() ||
			!Configuration::deleteByName('MYMODULE_NAME'))
			return false;
		return true;
	}

	public function getContent()
	{
		$output = null;

		if (Tools::isSubmit('submit'.$this->name))
		{
			$my_module_name = strval(Tools::getValue('MYMODULE_NAME'));
			if (!$my_module_name || empty($my_module_name) || !Validate::isGenericName($my_module_name))
			{
				$output .= $this->displayError($this->l('Invalid Configuration value'));
			}
			else
			{
				Configuration::updateValue('MYMODULE_NAME', $my_module_name);
				$output .= $this->displayConfirmation($this->l('Setting updated'));
			}
		}
		return $output.$this->displayForm();
	}

	public function displayForm()
	{
		$default_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		$fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->l('Settings'),
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->l('Configuration value'),
					'name' => 'MYMODULE_NAME',
					'size' => 20,
					'required' => true
				)
			),
			'submit' => array(
				'title' => $this->l('Save it'),
				'class' => 'btn btn-default pull-right'
			)
		);

		$helper = new HelperForm();

		// Module, token and currentIndex
		$helper->module = $this;
		$helper->name_controller = $this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

		// Language
		$helper->default_form_language = $default_lang;
		$helper->allow_employee_form_lang = $default_lang;

		// Title and toolbar
		$helper->title = $this->displayName;
		$helper->show_toolbar = true;
		$helper->toolbar_scroll = true;
		$helper->submit_action = 'submit'.$this->name;
		$helper->toolbar_btn = array(
			'save' =>
			array(
				'desc' => $this->l('Save it'),
				'href' => AdminController::$currentIndex.'&configure='.$this->name.'&save'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			),
			'back' => array(
				'href' => AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'),
				'desc' => $this->l('Back to list')
			)
		);

		$helper->fields_value['MYMODULE_NAME'] = Configuration::get('MYMODULE_NAME');

		return $helper->generateForm($fields_form);
	}

	public function hookDisplayAdminStatsModules($params)
	{
		$search = 'SELECT * FROM customer WHERE ';

		$criters = null;

		foreach ($this->criterias as $criteria)
			$criters[] = $criteria->getHtml();

		$this->context->smarty->assign(
			array(
				'my_module_name' => Configuration::get('MYMODULE_NAME'),
				'my_module_date' => ModuleGraph::getDateBetween(),
				'my_module_criterias' => $criters,
				'my_module_search' => $search,
			)
		);
		return $this->display(__FILE__, 'mymodule.tpl');
	}

	public function hookDisplayHeader()
	{
		$this->context->controller->addCSS($this->_path.'css/mymodule.css', 'all');
	}

}
