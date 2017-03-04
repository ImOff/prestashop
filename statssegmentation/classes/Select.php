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

		$html .= '<td><div class="multiselect"><div class="selectBox" onclick="showCheckboxes(\'' . $this->tableName . '\')">';
		$html .= '<select name="s_' . $name . '"><option value="0">' . $this->labelForAll . '</option></select>';
		$html .= '<div class="overSelect"></div></div>';
		$html .= '<div id="' . $this->tableName . '" class="checkboxes">';
		$i = 0;
		foreach ($this->list as $element) {
			$html .= '<label for="' . $i . "_" . $this->tableName . '">';
			$html .= '<input type="checkbox" id="' . $i . "_" . $this->tableName . '"/>';
			$html .= '<span>' . $element['name'] . '</span></label>';
			$i++;
		}
		$html .= '</div></td>';
		return $html;
	}

	function getQuery($name, $operator = true)
	{
		return ($query);
	}
}
