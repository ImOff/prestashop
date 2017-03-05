<?php

require_once('Type.php');

class Date extends Type
{
	function __construct($query)
	{
		parent::__construct($query);
	}

	function getInput($name)
	{
		$html = null;

		$html .= '<td>' .
			'<input name="datepicker_' . $name . '" id="datepicker_' .
			$name . '" class="datepicker  form-control hasDatepicker" type="text"></td>';

		return $html;
	}

	function getQuery($name, $operator = true)
	{
		if ($operator)
			$query = str_replace("#", "IN", $this->query);
		else
			$query = str_replace("#", "NOT IN", $this->query);

		return ($query);
	}
}
