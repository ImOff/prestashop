<?php

require_once('Type.php');

class Text extends Type {
	private $tableName = null;
	private $placeholder = null;

	function __construct($query, $tableName, $placeholder) {
		parent::__construct($query);
		$this->tableName = $tableName;
		$this->placeholder = $placeholder;
	}

	function getInput ($name) {
		$html = null;
		$html .= '<td><div class="from"><span>From</span>';
		$html .= '<input type="number" name="" min="1" max="99" value="20">';
		$html .= '</div><div class="to"><span>To</span>';
		$html .= '<input type="number" name="" min="1" max="99" value="20"></div></td>';

		return $html;
	}

	function getQuery($name, $operator = true)
	{
		return ($this->query);
	}
}
