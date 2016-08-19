<?php
/* 
 * Project Factory
 */

include_once('Project.class.php');


class ProjectFactory
{
	
	public function __construct () {
		$this->projects = [];
	}
	
	public function __clone () {}
	
	public static function getInstance ()
	{
		if (!isset(self::$instance)) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function getProject ($id)
	{
		if (!isset($projects[$id])) {
			
			if ($id != 10) {
				$projects[$id] = new Project($id);
			} else {
				$projects[$id] = new LogProject(10);
			}
			
		}
		return $projects[$id];
	}
	
	
	private static $instance;
	
	private $projects;
	
}
