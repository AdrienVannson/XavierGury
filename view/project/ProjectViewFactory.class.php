<?php
/* 
 * ProjectView Factory
 */

include_once(__DIR__.'/../../model/ProjectFactory.class.php');
include_once('ProjectView.class.php');


class ProjectViewFactory
{
	
	public static function getProjectView ($project)
	{
		$projectView = ProjectView::getInstance($project);
        return $projectView;
	}
	
}
