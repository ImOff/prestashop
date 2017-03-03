<?php

if (!defined('_PS_VERSION_'))
  exit;

class MyModule extends Module
{
	public function __construct()
	{
		$this->name = 'mymodule';
		$this->tab = 'front_office_features';
		$this->version = '1.0.0';
		$this->author = 'Capsule.ltd';
		$this->need_instance = 0;
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_); 
		$this->bootstrap = true;

		parent::__construct();

		$this->displayName = $this->l('My module');
		$this->description = $this->l('Description of my module.');

		$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

		

		if (!Configuration::get('MYMODULE_NAME'))      
		  $this->warning = $this->l('No name provided');

	}

	public function install()
	{	
		if (Shop::isFeatureActive())
			Shop::setContext(Shop::CONTEXT_ALL);

		return parent::install() &&
	    $this->registerHook('displayAdminStatsModules') &&
	    Configuration::updateValue('MYMODULE_NAME', 'my friend');
	}

	public function uninstall()
	{
		if (!parent::uninstall() ||
		!Configuration::deleteByName('MYMODULE_NAME')
		)
			return false;
	
		return true;
	}

	public function getContent()
	{
		$output = null;

		if (Tools::isSubmit('submit'.$this->name))
		{
		    $my_module_name = strval(Tools::getValue('MYMODULE_NAME'));
		    if (!$my_module_name
		      || empty($my_module_name)
		      || !Validate::isGenericName($my_module_name))
		        $output .= $this->displayError($this->l('Invalid Configuration value'));
		    else
		    {
		        Configuration::updateValue('MYMODULE_NAME', $my_module_name);
		        $output .= $this->displayConfirmation($this->l('Settings updated'));
		    }
		}
		return $output.$this->displayForm();
	}

	public function displayForm()
	{
		// Get default language
		$default_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		$options = array(
		  array(
		    'id_option' => 1,       // The value of the 'value' attribute of the <option> tag.
		    'name' => 'Method 1'    // The value of the text content of the  <option> tag.
		  ),
		  array(
		    'id_option' => 2,
		    'name' => 'Method 2'
		  ),
		);
		// Init Fields form array
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
			    ),
			    array(
			        'type' => 'text',
			        'label' => $this->l('Configuration value'),
			        'name' => 'MYMODULE_NAME',
			        'size' => 20,
			        'required' => true
			    ),
			    array(
					'type' => 'select',                              // This is a <select> tag.
					'label' => $this->l('Shipping method:'),         // The <label> for this <select> tag.
					'desc' => $this->l('Choose a shipping method'),  // A help text, displayed right next to the <select> tag.
					'name' => 'shipping_method',                     // The content of the 'id' attribute of the <select> tag.
					'required' => true,                              // If set to true, this option must be set.
					'options' => array(
					'query' => $options,                           // $options contains the data itself.
					'id' => 'id_option',                           // The value of the 'id' key must be the same as the key for 'value' attribute of the <option> tag in each $options sub-array.
					'name' => 'name'                               // The value of the 'name' key must be the same as the key for the text content of the <option> tag in each $options sub-array.
					)
				),
				array(
				    'type' => 'switch',
				    'label' => $this->l('Label'),
				    'name' => 'PRESTASHOP_INPUT_SWITCH',
				    'is_bool' => true,
				    'desc' => $this->l('Description'),
				    'values' => array(
				        array(
				            'id' => 'active_on',
				            'value' => true,
				            'label' => $this->l('Enabled')
				        ),
				        array(
				            'id' => 'active_off',
				            'value' => false,
				            'label' => $this->l('Disabled')
				        )
				    )
				)
			),
			'submit' => array(
			    'title' => $this->l('Save'),
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
		$helper->show_toolbar = true;        // false -> remove toolbar
		$helper->toolbar_scroll = true;      // yes - > Toolbar is always visible on the top of the screen.
		$helper->submit_action = 'submit'.$this->name;
		$helper->toolbar_btn = array(
		'save' =>
		array(
		    'desc' => $this->l('Save'),
		    'href' => AdminController::$currentIndex.'&configure='.$this->name.'&save'.$this->name.
		    '&token='.Tools::getAdminTokenLite('AdminModules'),
		),
		'back' => array(
		    'href' => AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'),
		    'desc' => $this->l('Back to list')
		)
		);
		// Load current value
		$helper->fields_value['MYMODULE_NAME'] = Configuration::get('MYMODULE_NAME');

		return $helper->generateForm($fields_form);
	}

	public function hookDisplayLeftColumn($params)
	{
		$t = getcwd();
		$file = file_get_contents($t . '/../../..' . $this->_path.'criteria.xml');
		var_dump(file_exists($t . '/../../'));
		var_dump($t . '/../../..' . $this->_path);
		var_dump($file);
		// var_dump(getcwd());
		// var_dump($this->_path);
		// var_dump(file_exists(getcwd()));
		// var_dump(file_exists($this->_path.'test.txt'));
		// var_dump($this->module->getPath().'criteria.xml')
		// var_dump($this->getPath());
		$this->xml = simplexml_load_string($file);
		// var_dump($this->xml);
		foreach ($this->xml as $key => $value) {
			var_dump($value);
			# code...
		}
		$this->context->smarty->assign(
			array(
				'my_module_xml' => $this->xml,
				'my_module_name' => Configuration::get('MYMODULE_NAME'),
				'my_module_link' => $this->context->link->getModuleLink('mymodule', 'display'),
				'my_module_message' => $this->l('This is a simple text message')
			)
		);
		return $this->display(__FILE__, 'mymodule.tpl');
	}
	public function hookDisplayRightColumn($params)
	{
		return $this->hookDisplayLeftColumn($params);
	}
	public function hookDisplayAdminStatsModules ($params) {
		return $this->hookDisplayLeftColumn($params);
	}
	public function hookDisplayHeader()
	{
		$this->context->controller->addCSS($this->_path.'css/mymodule.css', 'all');
	}  
}