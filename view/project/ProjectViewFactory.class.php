<?php
/* 
 * ProjectView Factory
 */

include_once(__DIR__.'/../../model/ProjectFactory.class.php');
include_once('ProjectView.class.php');
include_once('ProjectCarouselView.class.php');


class ProjectViewFactory
{
	
	public static function getProjectView (Project $project)
	{
		if ($project->getPicturesDisplayMode() == 'CAROUSEL') {
			return ProjectCarouselView::getInstance($project);
		}
		
		return ProjectView::getInstance($project);
	}
	
}
