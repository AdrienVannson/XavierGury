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
	
}
