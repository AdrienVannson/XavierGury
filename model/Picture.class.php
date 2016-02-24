<?php
/* Model */
include_once(__DIR__."/connect.php");

class Picture {
	
	public function __construct($id) {
		$db = get_db();
		
		if($id == -1) { /* Ajout d'une nouvelle ressource */
			$results = $db->prepare("INSERT INTO resources () VALUES ();");
			$results->execute(array());
			
			$results = $db->query("SELECT LAST_INSERT_ID() AS id");
			$datas = $results->fetch();
			$id = $datas["id"];
		}
		
		$results = $db->prepare("SELECT * FROM resources WHERE id=?");
		$results->execute(array($id));
		$datas = $results->fetch();
		
		$this->id = $datas["id"];
		$this->idProject = $datas["id_project"];
		$this->type = $datas["type"];
		$this->name = $datas["name"];
		$this->description = $datas["description"];
	}
	
	public function get_id() {
		return $this->id;
	}
	
	public function set_id_project($idProject) {
		$db = get_db();
		$results = $db->prepare("UPDATE resources SET id_project=? WHERE id=?;");
		$results->execute(array($idProject, $this->id));
		
		$this->idProject = $idProject;
	}
	public function get_id_project() {
		return $this->idProject;
	}
	
	public function set_type($type) {
		$db = get_db();
		$results = $db->prepare("UPDATE resources SET type=? WHERE id=?;");
		$results->execute(array($type, $this->id));
	
		$this->type = $type;
	}
	public function get_type() {
		return $this->type;
	}
	
	public function set_name($name) {
		$db = get_db();
		$results = $db->prepare("UPDATE resources SET name=? WHERE id=?;");
		$results->execute(array($name, $this->id));
	
		$this->name = $name;
	}
	public function get_name() {
		return $this->name;
	}
	
	public function set_description($description) {
		$db = get_db();
		$results = $db->prepare("UPDATE resources SET description=? WHERE id=?;");
		$results->execute(array($description, $this->id));
		
		$this->description = $description;
	}
	public function get_description() {
		return $this->description;
	}
	
	public function get_path_resource($size) {
		return "resources/pictures/".$this->id."/".$size.".jpg";
	}
	public function get_url_resource($size) {
		return "/ressources/".$this->id."-".$size.".jpg";
	}
	
	private $id;
	private $idProject;
	private $type;
	private $name;
	private $description;
}
