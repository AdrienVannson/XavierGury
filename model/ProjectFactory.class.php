<?php
/* 
 * Project Factory
 */

include_once('Project.class.php');


class ProjectFactory
{
	
	public static function getProject ($id)
	{
		if ($id != 10) {
			return Project::getProject($id);
		} else {
			return LogProject::getProject(10);
		}
	}
	
}
