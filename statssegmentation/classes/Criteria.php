<?php

require_once('Select.php');
require_once('None.php');
require_once('Text.php');

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
