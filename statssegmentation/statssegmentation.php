<?php
if (!defined('_PS_VERSION_'))
	exit;

require_once('classes/Criteria.php');

class StatsSegmentation extends Module
{
	private $criterias = null;

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

		$this->criterias[] = new Criteria('newsletter', 'Newsletter (if enabled)',
			new None('newsletter # @'));
		$this->criterias[] = new Criteria('language', 'Language(s)',
			new Select('id_lang # (@)', 'lang', $this->l('All languages')));
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
		$criters = null;

		foreach ($this->criterias as $criteria)
			$criters[] = $criteria->getHtml();

		$this->context->smarty->assign(
			array(
				'my_module_name' => Configuration::get('MYMODULE_NAME'),
				'my_module_criterias' => $criters,
				'my_module_search' => $search,
			)
		);

		return $this->display(__FILE__, 'segmentation.tpl');
	}

	public function hookBackOfficeHeader($params)
	{
		return $this->context->controller->addCSS($this->_path.'css/segmentation.css');
	}
}

