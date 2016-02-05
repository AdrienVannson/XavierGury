<?php
/* Model */
include_once("connect.php");

class Resource {
	
	public function __construct($id) {
		$db = get_db();
		
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
	public function get_id_project() {
		return $this->idProject;
	}
	public function get_type() {
		return $this->type;
	}
	public function get_name() {
		return $this->name;
	}
	public function get_description() {
		return $this->description;
	}
	
	public function get_path_resource() {
		return "resources/".$this->id."/image.jpg";
	}
	public function get_url_resource() {
		return "/ressources/".$this->id."-image.jpg";
	}
	
	private $id;
	private $idProject;
	private $type;
	private $name;
	private $description;
}
