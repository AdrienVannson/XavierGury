<?php
/* Model */
include_once("../model/connect.php");

class Theme {
	
	public function __construct($id) {
		$db = get_db();
		
		$result = $db->prepare("SELECT * FROM themes WHERE id=?");
		$result->execute(array($id));
		$datas = $result->fetch();
		
		$this->_id = $datas["id"];
		$this->_name = $datas["name"];
		$this->_description = $datas["description"];
		$this->_color = $datas["color"];
	}
	
	public function get_id() {
		return $this->_id;
	}
	
	public function get_name() {
		return $this->_name;
	}
	public function get_name_formatted() {
		return urlencode($this->_name);
	}
	
	public function get_description() {
		return $this->_description;
	}
	
	public function get_color() {
		return $this->_color;
	}
	
	private $_id;
	private $_name;
	private $_description;
	private $_color;
}
