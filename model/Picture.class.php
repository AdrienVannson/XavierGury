<?php
/* Model */
include_once(__DIR__.'/connect.php');
include_once(__DIR__.'/ProjectFactory.class.php');
include_once(__DIR__.'/PictureFactory.class.php');


class Picture {

	private function __construct ($id)
	{
		$db = get_db();
		
		if($id == -1) {
			$this->id = -1;
			$this->idProject;
			$this->type = 'JPG';
			$this->infos = '';
			$this->name = '';
			$this->description = '';
			$this->creationDate = '';
		}
		else {
			$results = $db->prepare('SELECT * FROM pictures WHERE id=?');
			$results->execute(array($id));
			$datas = $results->fetch();
			
			$this->id = $datas['id'];
			$this->idProject = $datas['id_project'];
			$this->type = $datas['type'];
			$this->infos = $datas['infos'];
			$this->name = $datas['name'];
			$this->description = $datas['description'];
			$this->creationDate = $datas['creation_date'];
		}
	}

	private function __clone () {}


	public static function getPicture ($id)
	{
		if (!isset(self::$picturesInstances[$id])) {
			self::$picturesInstances[$id] = new self($id);
		}
		
		return self::$picturesInstances[$id];
	}


	public function save() {
		$db = get_db();
		
		if ($this->id == -1) {
			$request = $db->prepare('INSERT INTO pictures (id_project, type, infos, name, description) VALUES (?, ?, ?, ?, ?);');
			$request->execute(array(
					$this->idProject,
					$this->type,
					$this->infos,
					$this->name,
					$this->description
			));
				
			$results = $db->query('SELECT LAST_INSERT_ID() AS id');
			$datas = $results->fetch();
			$this->id = $datas['id'];
		}
		else {
			$request = $db->prepare('UPDATE pictures SET id_project=?, type=?, infos=?, name=?, description=? WHERE id=?;');
			$request->execute(array(
					$this->idProject,
					$this->type,
					$this->infos,
					$this->name,
					$this->description,

					$this->id
			));
		}
		
		if ($this->creationDate == '') {
			$request = $db->prepare('UPDATE pictures SET creation_date = NULL WHERE id = ?');
			$request->execute(array($this->id));
		}
		else {
			$request = $db->prepare('UPDATE pictures SET creation_date = ? WHERE id = ?');
			$request->execute(array($this->creationDate, $this->id));
		}
	}

	public function delete() {
		if($this->id == -1) {
			return;
		}
		
		// Delete folder
		$dirName = dirname(__DIR__).'/resources/pictures/'.$this->id.'/';
		$dir = opendir($dirName);
		while($file = readdir($dir)) {
			if($file != '.' && $file != '..') {
				$toDel = $dirName.'/'.$file;
				unlink($toDel);
			}
		}
		closedir($dir);
		rmdir($dirName);
		
		$db = get_db();
	
		$results = $db->prepare('DELETE FROM pictures WHERE id=?');
		$results->execute(array($this->id));
	}


	public function getId() {
		return $this->id;
	}


	public function setIdProject($idProject) {
		$this->idProject = $idProject;
	}

	public function getIdProject() {
		return $this->idProject;
	}

	public function getProject() {
		return ProjectFactory::getProject($this->getIdProject());
	}


	public function setType($type) {
		$this->type = $type;
	}

	public function getType() {
		return strtolower($this->type);
	}


	public function setInfos($infos) {
		$this->infos = $infos;
	}

	public function getInfos() {
		return $this->infos;
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


	public function setCreationDate($creationDate) {
		$this->creationDate = $creationDate;
	}

	public function getCreationDate() {
		return $this->creationDate;
	}


	public function getUrl () {
		$db = get_db();
		$results = $db->prepare("SELECT COUNT(*) AS pos
								 FROM pictures
								 WHERE id_project = :idProject AND (creation_date < :creationDate OR
																   (creation_date = :creationDate AND id < :id) OR
																   (creation_date IS NULL AND (id < :id OR :creationDate != 'NULL')) )");

		$results->bindParam('id', $this->id);
		$results->bindParam('idProject', $this->idProject);

		$creationDate = $this->creationDate;

		if ($creationDate == '') {
			$creationDate = 'NULL';
		}

		$results->bindParam('creationDate', $this->creationDate);

		$results->execute();
		$datas = $results->fetch();

		return $this->getProject()->getUrl() . '#' . $datas['pos'] . '-1';
	}

	public function getPathResource($size) {
		return 'resources/pictures/'.$this->id.'/'.$size.'.'.$this->getType();
	}

	public function getUrlResource($size, $encode=true) {
		$url = $this->getProject()->getUrl($encode) . '/ressources/' . $this->id . $size[0];

		if ($encode) {
			$name = urlencode($this->name);
		}
		else {
			$name = $this->name;
		}

		if ($name != '') {
			$url .= '-' . $name;
		}
		
		$url .= '.' . $this->getType();
		
		return $url;
	}

	public function getAdminUrl() {
		if ($this->getId() == -1) {
			return '/admin/pictures/new/'.$this->getIdProject();
		}
		return '/admin/pictures/'.$this->getId();
	}

	public function getHtml($a=0) {
		// Picture : a = (int) size
		// Movie : a = (bool) show dimensions in px
		
		if ($this->getType() != 'youtube') {
			return '<img src="'.$this->getUrlResource($a).'"/>';
		}
		
		// Movie
		$infos = explode(PHP_EOL, $this->infos);
		
		$infos[0] = rtrim($infos[0]);
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


	public function generateFiles () {
		
		$dirName = dirname(__DIR__).'/resources/pictures/'.$this->getId(); // dirname : dossier parent

		// Clear the folder
		$dir = opendir($dirName);
		while ($file = readdir($dir)) {
			if ($file != '.' && $file != '..' && $file != 'r.'.$this->getType()) {
				$todel = $dirName . '/' . $file;
				unlink($todel);
			}
		}
		closedir($dir);


		// Generate the files
		$realFileName = $dirName . '/r.' . $this->getType();

		if ($this->getType() == 'jpg') {
			$img = imagecreatefromjpeg($realFileName);
		} elseif ($this->getType() == 'gif') {
			$img = imagecreatefromgif($realFileName);
		} elseif ($this->getType() == 'png') {
			$img = imagecreatefrompng($realFileName);
		}

		$infos = getimagesize($realFileName);
		$width = $infos[0];
		$height = $infos[1];


		// Small
		$newWidth = floor(128 * $width / $height);
		if ($newWidth < $width) {
			$s = imagescale($img, $newWidth);
		}
		else {
			$s = $img;
		}

		// Medium
		$newWidth = floor(384 * $width / $height);
		if ($newWidth < $width) {
			$m = imagescale($img, $newWidth);
		}
		else {
			$m = $img;
		}

		// Large
		$newWidth = floor(896 * $width / $height);
		if ($newWidth < $width) {
			$l = imagescale($img, $newWidth);
		}
		else {
			$l = $img;
		}


		if ($this->getType() == 'jpg') {
			imagejpeg($s, $dirName.'/s.jpg', 80);
			imagejpeg($m, $dirName.'/m.jpg', 80);
			imagejpeg($l, $dirName.'/l.jpg', 80);
		}
		elseif ($this->getType() == 'gif') {
			imagegif($s, $dirName.'/s.gif');
			imagegif($m, $dirName.'/m.gif');
			imagegif($l, $dirName.'/l.gif');
		}
		elseif ($this->getType() == 'png') {
			imagealphablending($s, false);
			imagealphablending($m, false);
			imagealphablending($l, false);

			imagesavealpha($s, true);
			imagesavealpha($m, true);
			imagesavealpha($l, true);

			imagepng($s, $dirName.'/s.png', 9);
			imagepng($m, $dirName.'/m.png', 9);
			imagepng($l, $dirName.'/l.png', 9);
		}

	}


	public function getWidth ()
	{
		return getimagesize( $this->getPathResource('r') )[0];
	}
	
	public function getHeight ()
	{
		return getimagesize( $this->getPathResource('r') )[1];
	}


	protected $id;
	protected $idProject;
	protected $type;
	protected $infos;
	protected $name;
	protected $description;
	protected $creationDate;

	protected static $picturesInstances;
}
