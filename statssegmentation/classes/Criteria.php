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

		$html .= '<tr>' .
			'<td>' . $this->description . '</td>' .
			'<td><div>' .
			'<label class="isnot">' .
				'<input type="checkbox" class="radio" value="0" name="' . $this->name . '">' .
				'<span>Is</span>' .
			'</label>' .
			'<label class="isnot">' .
				'<input type="checkbox" class="radio" value="1" name="' . $this->name . '">' .
				'<span>Is not</span>' .
			'</label>' .
			'</td></div>' .
			$this->type->getInput($this->description) .
			'</tr>';

		return $html;
	}

	function isEnable()
	{
		return (Tools::getValue($this->name) != null ? true : false);
	}

	function isOn()
	{
		if (!$this->isEnable())
			throw "Criteria is not enabled !";
		return (Tools::getValue($this->name) == '0' ? true : false);
	}

	function getQuery($values = array())
	{
		return ($this->type->getQuery($this->name, $this->isOn()));
	}
}
