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
			$name . '" class="datepicker  form-control hasDatepicker" type="date"></td>';

		return $html;
	}

	function getQuery($name, $operator = true)
	{
		if ($operator)
			$query = str_replace("#", "<", $this->query);
		else
			$query = str_replace("#", ">", $this->query);

		$date = Tools::getValue('datepicker_' . $name);
		$query = preg_replace("/@{1}/", $date, $query);

		return ($query);
	}
}
