<?php
/* Model */
include_once(__DIR__."/connect.php");
include_once(__DIR__."/Theme.class.php");
include_once(__DIR__."/Resource.class.php");

class Project {

	public function __construct($id) {
		$db = get_db();
		
		if($id == -1) { /* Ajout d'un nouveau projet */
			$results = $db->prepare("INSERT INTO projects () VALUES ();");
			$results->execute(array());
			
			$results = $db->query("SELECT LAST_INSERT_ID() AS id");
			$datas = $results->fetch();
			$id = $datas["id"];
		}

		$result = $db->prepare("SELECT * FROM projects WHERE id=?");
		$result->execute(array($id));
		$datas = $result->fetch();

		$this->id = $datas["id"];
		$this->id_theme = $datas["id_theme"];
		$this->name = $datas["name"];
		$this->description = $datas["description"];
	}

	public function get_id() {
		return $this->id;
	}
	
	public function set_id_theme($id_theme) {
		$db = get_db();
		$results = $db->prepare("UPDATE projects SET id_theme=? WHERE id=?;");
		$results->execute(array($id_theme, $this->id));
		
		$this->id_theme = $id_theme;
	}
	public function get_id_theme() {
		return $this->id_theme;
	}
	public function get_theme() {
		return new Theme( $this->id_theme );
	}
	
	public function set_name($name) {
		$db = get_db();
		$results = $db->prepare("UPDATE projects SET name=? WHERE id=?;");
		$results->execute(array($name, $this->id));
	
		$this->name = $name;
	}
	public function get_name() {
		return $this->name;
	}
	public function get_name_formatted() {
		return urlencode($this->name);
	}
	
	public function set_description($description) {
		$db = get_db();
		$results = $db->prepare("UPDATE projects SET description=? WHERE id=?;");
		$results->execute(array($description, $this->id));
	
		$this->description = $description;
	}
	public function get_description() {
		return $this->description;
	}
	
	public function get_resources() {
		$request = "
			SELECT id
			FROM resources
			WHERE id_project = ?
		";
	
		$db = get_db();
		$results = $db->prepare($request);
		$results->execute(array($this->id));
	
		$resources = [];
		while($datas = $results->fetch()) {
			$resources[] = new Resource($datas["id"]);
		}
		return $resources;
	}

	private $id;
	private $id_theme;
	private $name;
	private $description;
}
