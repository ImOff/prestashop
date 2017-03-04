<?php

require_once('Criteria.php');

class CriteriaGenerator {
	function __construct () {

	}
	function Create ($canonical, $desc, $nameTable, $placeholder, $isSelect, $column) {
		switch ($isSelect) {
			case 'none':
				return new Criteria($canonical, $desc, new None($canonical . ' # @'));
			case 'text' :
				return new Criteria($canonical, $desc, new Text($canonical . ' # @', $nameTable, $placeholder));
			default:
				return new Criteria($canonical, $desc, new Select($column . ' # (@)', $nameTable, $placeholder));
		}
	}

}