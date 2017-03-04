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
				'<input type="checkbox" class="radio" value="0" name="' . $this->name . '[1][]">' .
				'<span>Is</span>' .
			'</label>' .
			'<label class="isnot">' .
				'<input type="checkbox" class="radio" value="1" name="' . $this->name . '[1][]">' .
				'<span>Is not</span>' .
			'</label>' .
			'</td></div>' .
			$this->type->getInput($this->name) .
			'</tr>';

		return $html;
	}
}
