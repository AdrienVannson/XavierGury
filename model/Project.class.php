<?php
/* Model */
include_once("connect.php");
include_once("Theme.class.php");
include_once("Resource.class.php");

class Project {

	public function __construct($id) {
		$db = get_db();

		$result = $db->prepare("SELECT * FROM projects WHERE id=?");
		$result->execute(array($id));
		$datas = $result->fetch();

		$this->_id = $datas["id"];
		$this->_id_theme = $datas["id_theme"];
		$this->_name = $datas["name"];
		$this->_description = $datas["description"];
	}

	public function get_id() {
		return $this->_id;
	}
	
	public function get_id_theme() {
		return $this->_id_theme;
	}
	public function get_theme() {
		return new Theme( $this->_id_theme );
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
	
	public function get_resources() {
		$request = "
			SELECT id
			FROM resources
			WHERE id_project = ?
		";
	
		$db = get_db();
		$results = $db->prepare($request);
		$results->execute(array($this->_id));
	
		$resources = [];
		while($datas = $results->fetch()) {
			$resources[] = new Resource($datas["id"]);
		}
		return $resources;
	}

	private $_id;
	private $_id_theme;
	private $_name;
	private $_description;
}
