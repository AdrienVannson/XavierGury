<?php
/* 
 * Project Factory
 */

include_once('Project.class.php');


class ProjectFactory
{
	
	public static function getProject ($id)
	{
		return Project::getProject($id);
	}

	public static function getAllProjects ()
	{
		$db = get_db();

		$result = $db->prepare('SELECT id FROM projects');
		$result->execute();

		$projects = [];

		while ($datas = $result->fetch()) {
			array_push($projects, ProjectFactory::getProject($datas['id']));
		}

		return $projects;
	}
	
}
