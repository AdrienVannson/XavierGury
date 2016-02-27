<?php
/* Model */
include_once(__DIR__."/connect.php");

class Picture {
	
	public function __construct($id) {
		$db = get_db();
		
		if($id == -1) {
			$this->id = -1;
			$this->idProject;
			$this->name = "";
			$this->description = "";
		}
		else {
			$results = $db->prepare("SELECT * FROM pictures WHERE id=?");
			$results->execute(array($id));
			$datas = $results->fetch();
			
			$this->id = $datas["id"];
			$this->idProject = $datas["id_project"];
			$this->name = $datas["name"];
			$this->description = $datas["description"];
		}
	}
	
	
	public function save() {
		$db = get_db();
		
		if($this->id == -1) {
			$results = $db->prepare("INSERT INTO pictures (id_project, name, description) VALUES (?, ?, ?);");
			$results->execute(array(
					$this->idProject,
					$this->name,
					$this->description
			));
				
			$results = $db->query("SELECT LAST_INSERT_ID() AS id");
			$datas = $results->fetch();
			$this->id = $datas["id"];
		}
		else {
			$results = $db->prepare("UPDATE pictures SET id_project=?, name=?, description=? WHERE id=?;");
			$results->execute(array(
					$this->idProject,
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
	
		$results = $db->prepare("DELETE FROM pictures WHERE id=?");
		$results->execute(array($this->id));
	}
	
	
	public function get_id() {
		return $this->id;
	}
	
	public function set_id_project($idProject) {
		$this->idProject = $idProject;
	}
	public function get_id_project() {
		return $this->idProject;
	}
	
	public function set_name($name) {
		$this->name = $name;
	}
	public function get_name() {
		return $this->name;
	}
	
	public function set_description($description) {
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
	private $name;
	private $description;
}
