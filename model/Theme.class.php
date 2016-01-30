<?php
/* Model */
include_once("connect.php");
include_once("Project.class.php");

class Theme {
	
	public function __construct($id) {
		$db = get_db();
		
		$results = $db->prepare("SELECT * FROM themes WHERE id=?");
		$results->execute(array($id));
		$datas = $results->fetch();
		
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
	
	public function get_projects() {
		$request = "
			SELECT id
			FROM projects
			WHERE id_theme = ?
		";
		
		$db = get_db();
		$results = $db->prepare($request);
		$results->execute(array($this->_id));
		
		$projects = [];
		while($datas = $results->fetch()) {
			$projects[] = new Project($datas["id"]);
		}
		return $projects;
	}
	
	private $_id;
	private $_name;
	private $_description;
	private $_color;
}
