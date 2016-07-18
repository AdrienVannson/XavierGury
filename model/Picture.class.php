<?php
/* Model */
include_once(__DIR__."/connect.php");
include_once(__DIR__."/Project.class.php");

class Picture {
	
	public function __construct($id) {
		$db = get_db();
		
		if($id == -1) {
			$this->id = -1;
			$this->idProject;
			$this->type = "JPG";
			$this->infos = "";
			$this->name = "";
			$this->description = "";
		}
		else {
			$results = $db->prepare("SELECT * FROM pictures WHERE id=?");
			$results->execute(array($id));
			$datas = $results->fetch();
			
			$this->id = $datas["id"];
			$this->idProject = $datas["id_project"];
			$this->type = $datas["type"];
			$this->infos = $datas["infos"];
			$this->name = $datas["name"];
			$this->description = $datas["description"];
		}
	}
	
	
	public function save() {
		$db = get_db();
		
		if($this->id == -1) {
			$results = $db->prepare("INSERT INTO pictures (id_project, type, infos, name, description) VALUES (?, ?, ?, ?, ?);");
			$results->execute(array(
					$this->idProject,
					$this->type,
					$this->infos,
					$this->name,
					$this->description
			));
				
			$results = $db->query("SELECT LAST_INSERT_ID() AS id");
			$datas = $results->fetch();
			$this->id = $datas["id"];
		}
		else {
			$results = $db->prepare("UPDATE pictures SET id_project=?, type=?, infos=?, name=?, description=? WHERE id=?;");
			$results->execute(array(
					$this->idProject,
					$this->type,
					$this->infos,
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
		
		// Delete folder
		$dirName = dirname(__DIR__)."/resources/pictures/".$this->id."/";
		$dir = opendir($dirName);
		while($file = readdir($dir)) {
			if($file != "." && $file != "..") {
				$toDel = $dirName."/".$file;
				unlink($toDel);
			}
		}
		closedir($dir);
		rmdir($dirName);
		
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
	public function get_project() {
		return new Project($this->get_id_project());
	}
	
	public function set_type($type) {
		$this->type = $type;
	}
	public function get_type() {
		return strtolower($this->type);
	}
	
	public function set_infos($infos) {
		$this->infos = $infos;
	}
	public function get_infos() {
		return $this->infos;
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
		return "resources/pictures/".$this->id."/".$size.".".$this->get_type();
	}
	public function get_url_resource($size) {
		return "/ressources/".$this->id."-".$size.".".$this->get_type();
	}
	
	public function get_admin_url() {
		return "/admin/pictures/".$this->get_id();
	}
	
	public function get_html($a=0) {
		// Picture : a = (int) size
		// Movie : a = (bool) show dimensions in px
		
		if ($this->get_type() != 'youtube') {
			return '<img src="'.$this->get_url_resource($a).'"/>';
		}
		
		// Movie
		$infos = explode("_", $this->infos);
		$infos[1] = intval($infos[1]);
		$infos[2] = intval($infos[2]);

		$width = $infos[2] * 33 / $infos[1];

		$code = '<iframe src="https://www.youtube.com/embed/'.$infos[0].'" frameborder="0" allowfullscreen ';
		
		if ($a) {
			$code .= 'style="width:50vw; height:40vh;"';
		}
		else {
			$code .= 'style="width:'.$width.'vh;"';
		}
		
		$code .= '></iframe>';
		
		return $code;
	}
	
	private $id;
	private $idProject;
	private $type;
	private $infos;
	private $name;
	private $description;
}
