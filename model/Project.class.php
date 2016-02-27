<?php
/* Model */
include_once(__DIR__."/connect.php");
include_once(__DIR__."/Theme.class.php");
include_once(__DIR__."/Picture.class.php");

class Project {

	public function __construct($id) {
		$db = get_db();
		
		if($id == -1) {
			$this->id = -1;
			$this->name = "";
			$this->description = "";
		}
		else {
			$result = $db->prepare("SELECT * FROM projects WHERE id=?");
			$result->execute(array($id));
			$datas = $result->fetch();
	
			$this->id = $datas["id"];
			$this->id_theme = $datas["id_theme"];
			$this->name = $datas["name"];
			$this->description = $datas["description"];
		}
	}
	
	public function save() {
		$db = get_db();
		
		if($this->id == -1) {
			$results = $db->prepare("INSERT INTO projects (id_theme, name, description) VALUES (?, ?, ?);");
			$results->execute(array(
					$this->id_theme,
					$this->name,
					$this->description
			));
				
			$results = $db->query("SELECT LAST_INSERT_ID() AS id");
			$datas = $results->fetch();
			$this->id = $datas["id"];
		}
		else {
			$results = $db->prepare("UPDATE projects SET id_theme=?, name=?, description=? WHERE id=?;");
			$results->execute(array(
					$this->id_theme,
					$this->name,
					$this->description,
					$this->id
			));
		}
		
	}
	
	public function delete() {
		if($this->id == -1) {
			return;
		}
		
		$db = get_db();
		
		$results = $db->prepare("DELETE FROM projects WHERE id=?");
		$results->execute(array($this->id));
	}
	
	

	public function get_id() {
		return $this->id;
	}
	
	public function set_id_theme($id_theme) {
		$this->id_theme = $id_theme;
	}
	public function get_id_theme() {
		return $this->id_theme;
	}
	public function get_theme() {
		return new Theme( $this->id_theme );
	}
	
	public function set_name($name) {
		$this->name = $name;
	}
	public function get_name() {
		return $this->name;
	}
	public function get_name_formatted() {
		return urlencode($this->name);
	}
	
	public function set_description($description) {
		$this->description = $description;
	}
	public function get_description() {
		return $this->description;
	}
	
	public function get_resources() {
		$request = "
			SELECT id
			FROM pictures
			WHERE id_project = ?
		";
		
		$db = get_db();
		$results = $db->prepare($request);
		$results->execute(array($this->id));
		
		$resources = [];
		while($datas = $results->fetch()) {
			$resources[] = new Picture($datas["id"]);
		}
		return $resources;
	}
	
	
	public function get_pictures() {
		$request = "
			SELECT id
			FROM pictures
			WHERE id_project = ?
		";
		
		$db = get_db();
		$results = $db->prepare($request);
		$results->execute(array($this->id));
		
		$pictures = [];
		while($datas = $results->fetch()) {
			$pictures[] = new Picture($datas["id"]);
		}
		return $pictures;
	}
	
	
	public function get_url_admin() {
		return "/admin/projets/".$this->get_id();
	}
	

	private $id;
	private $id_theme;
	private $name;
	private $description;
}
