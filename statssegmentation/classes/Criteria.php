<?php

require_once('Select.php');
require_once('None.php');
require_once('Text.php');

class Criteria
{
	private $name = null;

	private $description = null;

	private $type = null;

	function __construct($name = null, $description = null, $type = null)
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
			'</td></div>';
		if (isset($this->type))
			$html .= $this->type->getInput($this->name);
		$html .= '</tr>';

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

	function getName()
	{
		return $this->name;
	}

	function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	function getDescription()
	{
		return $this->description;
	}

	function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}

	function getType()
	{
		return $this->type;
	}

	function setType($type)
	{
		$this->type = $type;
		return $this;
	}
}
