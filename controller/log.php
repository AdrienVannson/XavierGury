<?php
/* Controller */
include_once(__DIR__."/../model/Project.class.php");
include_once(__DIR__."/../model/Picture.class.php");


class LogProject extends Project
{
	public function __construct () {
		$this->id = 10;
		$this->idParent = 0;
		$this->name = "Journal";
		$this->description = "";
		$this->color = "000000";
		$this->picturesDisplayMode = "CAROUSEL";
	}
	
	public function getUrl ()
	{
		return "/journal";
	}
	
	public function getPictures ()
	{
		$request = "SELECT id FROM pictures WHERE creation_date IS NOT NULL ORDER BY creation_date";
		
		$db = get_db();
		$results = $db->prepare($request);
		$results->execute(array($this->id));
		
		$pictures = [];
		while($datas = $results->fetch()) {
			$pictures[] = new Picture($datas["id"]);
		}
		return $pictures;
	}
}

$project = new LogProject();

include(__DIR__."/../view/project.php");
