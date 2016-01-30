<?php
/* Model */
include_once("../model/connect.php");

class Project {

	public function __construct($id) {
		$db = get_db();

		$result = $db->prepare("SELECT * FROM projects WHERE id=?");
		$result->execute(array($id));
		$datas = $result->fetch();

		$this->_id = $datas["id"];
		$this->id_theme = $datas["id_theme"];
		$this->_name = $datas["name"];
		$this->_description = $datas["description"];
	}

	public function get_id() {
		return $this->_id;
	}
	public function get_id_theme() {
		return $this->id_theme;
	}
	public function get_name() {
		return $this->_name;
	}
	public function get_description() {
		return $this->_description;
	}

	private $_id;
	private $_id_theme;
	private $_name;
	private $_description;
}
