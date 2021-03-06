<?php
/* Model */
include_once(__DIR__.'/connect.php');
include_once(__DIR__.'/ProjectFactory.class.php');
include_once(__DIR__.'/PictureFactory.class.php');


class Project
{

	protected function __construct ($id)
	{
		$db = get_db();

		if($id == -1) {
			$this->id = -1;
			$this->name = '';
			$this->description = '';
			$this->color = '000000';
			$this->picturesDisplayMode = 'GRID';
		}
		else {
			$result = $db->prepare('SELECT * FROM projects WHERE id=?');
			$result->execute(array($id));
			$datas = $result->fetch();

			$this->id = $datas['id'];
			$this->idParent = $datas['id_parent'];
			$this->name = $datas['name'];
			$this->description = $datas['description'];
			$this->color = $datas['color'];
			$this->picturesDisplayMode = $datas['pictures_display_mode'];
		}
	}

	private function __clone () {}


	public static function getProject ($id)
	{
		if (!isset(self::$projectsInstances[$id])) {
			self::$projectsInstances[$id] = new self($id);
		}

		return self::$projectsInstances[$id];
	}


	public function save() {
		$db = get_db();

		if($this->id == -1) {
			$results = $db->prepare('INSERT INTO projects (id_parent, name, description, color, pictures_display_mode) VALUES (?, ?, ?, ?, ?);');
			$results->execute(array(
					$this->idParent,
					$this->name,
					$this->description,
					$this->color,
					$this->picturesDisplayMode
			));

			$results = $db->query('SELECT LAST_INSERT_ID() AS id');
			$datas = $results->fetch();
			$this->id = $datas['id'];
		}
		else {
			$results = $db->prepare('UPDATE projects SET id_parent=?, name=?, description=?, color=?, pictures_display_mode=? WHERE id=?;');
			$results->execute(array(
					$this->idParent,
					$this->name,
					$this->description,
					$this->color,
					$this->picturesDisplayMode,
					$this->id
			));
		}

	}

	public function delete() {
		if($this->id == -1) {
			return;
		}

		foreach ($this->getChildren() as $child) {
			$child->delete();
		}

		foreach ($this->getPictures() as $picture) {
			$picture->delete();
		}

		$db = get_db();

		$results = $db->prepare('DELETE FROM projects WHERE id=?');
		$results->execute(array($this->id));
	}



	public function getId() {
		return $this->id;
	}

	public function setIdParent($idParent) {
		$this->idParent = $idParent;
	}
	public function getIdParent() {
		return $this->idParent;
	}

	public function setName($name) {
		$this->name = str_replace('/', '-', rtrim($name));
	}
	public function getName() {
		return $this->name;
	}

	public function setDescription($description) {
		$this->description = $description;
	}
	public function getDescription() {
		return $this->description;
	}

	public function setColor ($color) {
		if($color[0] == '#') {
			$color = substr($color, 1);
		}
		$this->color = $color;
	}
	public function getColor () {
		return $this->color;
	}

	public function setPicturesDisplayMode ($picturesDisplayMode) {
		$this->picturesDisplayMode = $picturesDisplayMode;
	}
	public function getPicturesDisplayMode () {
		return $this->picturesDisplayMode;
	}


	// Get members of the family
	public function getParent () {
		return ProjectFactory::getProject($this->idParent);
	}
	
	public function getParents () {
		$parents = [];

		$parent = $this;

		do {
			$parents[] = $parent;
			
			$parent = $parent->getParent();
		} while ($parent->getId() != 0);

		return array_reverse($parents);
	}
	
	public function getFirstLevelParent () {
		return $this->getParents()[0];
	}
	
	public function getChildren () {
		$request = 'SELECT id FROM projects WHERE id_parent=?';

		$db = get_db();
		$results = $db->prepare($request);
		$results->execute(array( $this->id ));

		$children = [];
		while($datas = $results->fetch()) {
			$children[] = ProjectFactory::getProject($datas['id']);
		}
		return $children;
	}
	
	public function getBrothers () {
		$request = 'SELECT id FROM projects WHERE id_parent=?';

		$db = get_db();
		$results = $db->prepare($request);
		$results->execute(array( $this->idParent ));

		$brothers = [];
		while($datas = $results->fetch()) {
			$brothers[] = ProjectFactory::getProject($datas['id']);
		}
		return $brothers;
	}
	
	
	public function getPictures () {
		$request = 'SELECT id FROM pictures WHERE id_project=? ORDER BY creation_date ASC, id ASC';

		$db = get_db();
		$results = $db->prepare($request);
		$results->execute(array($this->id));

		$pictures = [];
		while($datas = $results->fetch()) {
			$pictures[] = PictureFactory::getPicture($datas['id']);
		}
		return $pictures;
	}
	
	
	public function getUrlAdmin () {
		if ($this->getId() == -1) {
			return '/admin/projects/new/'.$this->getIdParent();
		}
		return '/admin/projects/'.$this->getId();
	}
	
	public function getUrl ($encode=true) {
		if ($this->getIdParent() == -1) { // Aucun parent (y compris la racine)
			return '/';
		}

		$parents = $this->getParents();
		$url = '';

		foreach ($parents as $parent) {
			$url .= '/' . $parent->getId() . '-';
			
			if ($encode) {
				$url .= urlencode($parent->getName());
			}
			else {
				$url .= $parent->getName();
			}
		}

		return $url;
	}
	

	protected $id;
	protected $idParent;
	protected $name;
	protected $description;
	protected $color;
	protected $picturesDisplayMode;
	
	protected static $projectsInstances;
}


// Easily get the first level projects
function getFirstLevelProjects ()
{
	$db = get_db();
	$result = $db->query('SELECT id FROM projects WHERE id_parent=0');

	$projects = [];

	while ($datas = $result->fetch()) {
		$projects[] = ProjectFactory::getProject($datas['id']);
	}

	return $projects;
}

function getNbFirstLevelProjects ()
{
	$db = get_db();
	$result = $db->query('SELECT COUNT(id) FROM projects WHERE id_parent=0');
	$datas = $result->fetch();
	return $datas[0];
}
