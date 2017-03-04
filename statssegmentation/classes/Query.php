<?php

class Query
{
	protected $query;

	protected $parameters;

	function __construct($query = null, $parametrs = [])
	{
	}

	function getQuery()
	{
		$i = 0;
		$query = $this->query;

		$query = preg_replace('/#/', $this->parameters[$i], $query, 1);
		return $query;
	}
}
