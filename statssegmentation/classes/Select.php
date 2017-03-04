<?php

require_once('Type.php');

class Select extends Type
{
	private $tableName = null;

	private $list = null;

	private $labelForAll = null;

	function __construct($query, $tableName, $labelForAll)
	{
		parent::__construct($query);
		$this->tableName = $tableName;
		$this->labelForAll = $labelForAll;

		$sql = new DbQuery();
		$sql->select('*')->from(pSQL($tableName));

		if ($results = Db::getInstance()->ExecuteS($sql))
		{
			$this->list = array();
			foreach ($results as $row)
				$this->list[] = array('id' => $row['id_' . $tableName], 'name' => $row['name']);
		}
	}

	function getInput($name)
	{
		$html = null;

		$html .= '<select name="s_' . $name . '">';
		$html .= '<option value="0">' . $this->labelForAll . '</option>';
		foreach ($this->list as $element)
			$html .= '<option value="' . $element['id'] . '">' . $element['name'] . '</option>';
		$html .= '</select>';

		return $html;
	}
}
