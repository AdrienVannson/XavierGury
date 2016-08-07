<?php
/* Controller */
include_once(__DIR__."/../model/Project.class.php");

class LogProject
{
	public function getId ()
	{
		return -1;
	}
	
	public function getIdParent ()
	{
		return 0;
	}
	
	public function getName ()
	{
		return "Journal";
	}
	
	public function getUrl ()
	{
		return "/journal";
	}
	
	public function getFirstLevelParent ()
	{
		return $this;
	}
	
	public function getChildren ()
	{
		return array();
	}
	
	public function getPictures ()
	{
		return array();
	}
}

$project = new LogProject();

include(__DIR__."/../view/log.php");
