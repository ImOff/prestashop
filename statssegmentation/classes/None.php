<?php

require_once('Type.php');

class None extends Type
{
	function __construct($query)
	{
		parent::__construct($query);
	}

	function getInput($name)
	{
		return null;
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
