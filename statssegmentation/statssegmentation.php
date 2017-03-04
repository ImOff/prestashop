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
			new None('newsletter # (1)'));
		$this->profile[] = new Criteria('optin', 'Opt in (if enabled)',
			new None('optin # (1)'));

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
		$result = 0;
		$profile_html = null;

		if (Tools::isSubmit('search'))
		{
			$sql = $this->getCriteriaQuery(array_merge($this->profile));
			$customers = Db::getInstance()->ExecuteS($sql);

			$result = count($customers);
		}

		foreach ($this->profile as $criteria)
			$profile_html[] = $criteria->getHtml();

		$this->context->smarty->assign(
			array(
				'segmentation_profile_criterias'	=> $profile_html,
				'segmentation_result'							=> $result,
			)
		);

		return $this->display(__FILE__, 'segmentation.tpl');
	}

	public function getCriteriaQuery($criterias)
	{
		$query = 'SELECT * FROM '._DB_PREFIX_.'customer';

		if (!count($criterias))
			return ($query);

		foreach ($criterias as $key => $criteria)
		{
			if ($criteria->isEnable())
			{
				$query .= ($key > 0) ? ' AND' : ' WHERE';
				$query .= ' ' . $criteria->getQuery();
			}
		}

		return ($query);
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
					case 'categorie' :
						$this->categorie = $value1;
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
			switch ($this->categorie) {
				case 'Profil':
					$this->profile[] = $criter->Create($this->canonical, $this->desc, $this->nameTable, $this->l($this->placeholder), $this->option, $this->column);
					break;
				
				default:
					# code...
					break;
			}
		}
	}
}

