<?php
/* Model */
include_once("connect.php");
include_once("Project.class.php");

class Theme {
	
	public function __construct($id) {
		$db = get_db();
		
		if($id == -1) { /* Ajout d'un nouveau thème */
			$results = $db->prepare("INSERT INTO themes () VALUES ();");
			$results->execute(array());
			
			$results = $db->query("SELECT LAST_INSERT_ID() AS id");
			$datas = $results->fetch();
			$id = $datas["id"];
		}
		
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
	
	public function set_name($name) {
		$db = get_db();
		$results = $db->prepare("UPDATE themes SET name=? WHERE id=?;");
		$results->execute(array($name, $this->_id));
		
		$this->_name = $name;
	}
	public function get_name() {
		return $this->_name;
	}
	public function get_name_formatted() {
		return urlencode($this->_name);
	}
	public function get_url() {
		return "/".$this->get_id()."-".$this->get_name_formatted();
	}
	
	public function set_description($description) {
		$db = get_db();
		$results = $db->prepare("UPDATE themes SET description=? WHERE id=?;");
		$results->execute(array($description, $this->_id));
	
		$this->_description = $description;
	}
	public function get_description() {
		return $this->_description;
	}
	
	public function set_color($color) {
		$db = get_db();
		$results = $db->prepare("UPDATE themes SET color=? WHERE id=?;");
		$results->execute(array($color, $this->_id));
	
		$this->_color = $color;
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
