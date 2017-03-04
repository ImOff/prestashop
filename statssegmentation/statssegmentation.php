<?php
if (!defined('_PS_VERSION_'))
	exit;

require_once('classes/CriteriaGenerator.php');

class StatsSegmentation extends Module
{
	private $profile = null;

	public function __construct()
	{
		$this->name = 'statssegmentation';
		$this->tab = 'analytics_stats';
		$this->version = '1.0.0';
		$this->author = 'Toolife.xyz';
		$this->need_instance = 0;

		$this->ps_version_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
		$this->bootstrap = true;

		parent::__construct();

		$this->displayName = $this->l('Segmentation Module');
		$this->description = $this->l('This is a simple module.');

		$this->profile[] = new Criteria('newsletter', 'Newsletter (if enabled)',
			new None('newsletter # @'));
		$this->profile[] = new Criteria('language', 'Language(s)',
			new Select('id_lang # (@)', 'lang', $this->l('All languages')));

		$this->parseXml('criteria.xml');
	}

	public function install()
	{
		return (parent::install() &&
			$this->registerHook('backOfficeHeader') && 
			$this->registerHook('adminStatsModules'));
	}

	public function uninstall()
	{
		if (!parent::uninstall())
			return false;
		return true;
	}

	public function hookDisplayAdminStatsModules($params)
	{
		$profile_html = null;

		foreach ($this->profile as $criteria)
			$profile_html[] = $criteria->getHtml();

		$this->context->smarty->assign(
			array(
				'segmentation_profile_criterias' => $profile_html,
			)
		);

		return $this->display(__FILE__, 'segmentation.tpl');
	}

	public function hookBackOfficeHeader($params)
	{
		return $this->context->controller->addCSS($this->_path.'css/segmentation.css');
	}

	public function parseXml ($fileName) {
		$criter = new CriteriaGenerator();
		$pwd = getcwd();
		$file = file_get_contents($pwd . '/../../..' . $this->_path . $fileName);
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
					case 'categorie':
						$this->categorie = $value1;
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
}

