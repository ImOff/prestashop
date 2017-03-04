<?php

abstract class Type
{
	protected $query = null;

	function __construct($query)
	{
		$this->query = $query;
	}

	abstract function getInput($name);
	abstract function getQuery($name, $operator = true);
}
