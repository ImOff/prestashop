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
		$html .= '<input type="number" name="" min="1" max="99" value="20">';
		$html .= '<input type="number" name="" min="1" max="99" value="20">';
		return $html;
	}
}
