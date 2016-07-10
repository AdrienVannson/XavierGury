<?php
/* Model */
include_once(__DIR__."/connect.php");
include_once(__DIR__."/Picture.class.php");

class Project {

	public function __construct($id) {
		$db = get_db();
		
		if($id == -1) {
			$this->id = -1;
			$this->name = "";
			$this->description = "";
			$this->color = "000000";
		}
		else {
			$result = $db->prepare("SELECT * FROM projects WHERE id=?");
			$result->execute(array($id));
			$datas = $result->fetch();
	
			$this->id = $datas["id"];
			$this->id_parent = $datas["id_parent"];
			$this->name = $datas["name"];
			$this->description = $datas["description"];
			$this->color = $datas["color"];
		}
	}
	
	public function save() {
		$db = get_db();
		
		if($this->id == -1) {
			$results = $db->prepare("INSERT INTO projects (id_parent, name, description, color) VALUES (?, ?, ?, ?);");
			$results->execute(array(
					$this->id_parent,
					$this->name,
					$this->description,
					$this->color
			));
				
			$results = $db->query("SELECT LAST_INSERT_ID() AS id");
			$datas = $results->fetch();
			$this->id = $datas["id"];
		}
		else {
			$results = $db->prepare("UPDATE projects SET id_parent=?, name=?, description=?, color=? WHERE id=?;");
			$results->execute(array(
					$this->id_parent,
					$this->name,
					$this->description,
					$this->color,
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
	
	public function set_id_parent($id_parent) {
		$this->id_parent = $id_parent;
	}
	public function get_id_parent() {
		return $this->id_parent;
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
	
	public function set_color ($color) {
		if($color[0] == "#") {
			$color = substr($color, 1);
		}
		$this->color = $color;
	}
	public function get_color () {
		return $this->color;
	}
	
	
	// Get members of the family
	public function get_parent () {
		return new Project( $this->id_parent );
	}
	
	public function get_parents () {
		$parents = [];
		
		$parent = $this;
		
		do {
			$parents[] = $parent;
			
			$parent = $parent->get_parent();
		} while ($parent->get_id() != 0);
		
		return array_reverse($parents);
	}
	
	public function get_children () {
		$request = "SELECT id FROM projects WHERE id_parent=?";
		
		$db = get_db();
		$results = $db->prepare($request);
		$results->execute(array( $this->id ));
		
		$children = [];
		while($datas = $results->fetch()) {
			$children[] = new Project($datas["id"]);
		}
		return $children;
	}
	
	public function get_brothers () {
		$request = "SELECT id FROM projects WHERE id_parent=?";
		
		$db = get_db();
		$results = $db->prepare($request);
		$results->execute(array( $this->id_parent ));
		
		$brothers = [];
		while($datas = $results->fetch()) {
			$brothers[] = new Project($datas["id"]);
		}
		return $brothers;
	}
	
	
	public function get_pictures () {
		$request = "SELECT id FROM pictures WHERE id_project=?";
		
		$db = get_db();
		$results = $db->prepare($request);
		$results->execute(array($this->id));
		
		$pictures = [];
		while($datas = $results->fetch()) {
			$pictures[] = new Picture($datas["id"]);
		}
		return $pictures;
	}
	
	
	public function get_url_admin () {
		return "/admin/projects/".$this->get_id();
	}
	
	public function get_url () {
		$parents = $this->get_parents();
		$url = "";
		
		foreach ($parents as $parent) {
			$url .= "/" . $parent->get_id() . "-" . $parent->get_name_formatted();
		}
		
		return $url;
	}
	

	private $id;
	private $id_parent;
	private $name;
	private $description;
	private $color;
}


// Easily get the first level projects
function get_first_level_projects ()
{
	$db = get_db();
	$result = $db->query("SELECT id FROM projects WHERE id_parent=0");

	$projects = [];

	while ($datas = $result->fetch()) {
		$id = $datas["id"];
		$projects[] = new Project($id);
	}

	return $projects;
}

function get_nb_first_level_projects ()
{
	$db = get_db();
	$result = $db->query("SELECT COUNT(id) FROM projects WHERE id_parent=0");
	$datas = $result->fetch();
	return $datas[0];
}
