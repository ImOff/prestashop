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
}

