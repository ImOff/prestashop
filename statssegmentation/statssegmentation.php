<?php
if (!defined('_PS_VERSION_'))
	exit;

require_once('classes/CriteriaGenerator.php');

class StatsSegmentation extends Module
{
	private $profile = null;
	private $abandoned = null;
	private $activity = null;
	private $purchases = null;
	private $habits = null;

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

			var_dump($sql);
			$customers = Db::getInstance()->ExecuteS($sql);

			$result = count($customers);
		}

		foreach ($this->profile as $criteria)
			$profile_html[] = $criteria->getHtml();
		foreach ($this->abandoned as $criteria)
			$abandoned_html[] = $criteria->getHtml();
		foreach ($this->activity as $criteria)
			$activity_html[] = $criteria->getHtml();
		foreach ($this->purchases as $criteria)
			$purchases_html[] = $criteria->getHtml();
		foreach ($this->habits as $criteria)
			$habits_html[] = $criteria->getHtml();

		$this->context->smarty->assign(
			array(
				'segmentation_profile_criterias' => $profile_html,
				'segmentation_abandoned_criterias' => $abandoned_html,
				'segmentation_activity_criterias' => $activity_html,
				'segmentation_purchases_criterias' => $purchases_html,
				'segmentation_habits_criterias' => $habits_html,
				'segmentation_result' => $result,
			)
		);

		return $this->display(__FILE__, 'segmentation.tpl');
	}

	public function getCriteriaQuery($criterias)
	{
		$query = 'SELECT * FROM '._DB_PREFIX_.'customer';

		if (!count($criterias))
			return ($query);

		$first = false;
		foreach ($criterias as $key => $criteria)
		{
			if ($criteria->isEnable())
			{
				if (!$first)
				{
					$query .= ' WHERE';
					$first = true;
				}
				else
					$query .= ' AND';

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
		$file = file_get_contents($pwd . '/..' . $this->_path . $fileName);
		$this->xml = simplexml_load_string($file);
		foreach ($this->xml as $data_criteria) {

			$criteria = new Criteria();
			$criteria
				->setName($data_criteria->canonical->__toString())
				->setDescription($data_criteria->description->__toString())
				;

			$type = $data_criteria->type;
			switch ($type->name)
			{
				case 'none':
					$criteria->setType(new None($type->query->__toString()));
					break;
				case 'select':
					$criteria->setType(new Select($type->query->__toString(),
						$type->nameTable->__toString(),
						$type->placeholder->__toString()));
					break;
				case 'text':
					$criteria->setType(new Text($type->query->__toString(),
						$type->nameTable->__toString(),
						$type->placeholder->__toString()));
			}

			switch ($data_criteria->categorie->__toString()) {
				case 'Profil':
					$this->profile[] = $criteria;
					break;
				case 'Abandoned':
					$this->abandoned[] = $criteria;
					break;
				case 'Activity':
					$this->activity[] = $criteria;
					break;
				case 'Purchases':
					$this->purchases[] = $criteria;
					break;
				case 'Habits':
					$this->habits[] = $criteria;
					break;
			}
		}
	}
}

