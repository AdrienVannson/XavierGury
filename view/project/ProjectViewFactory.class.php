<?php
/* 
 * ProjectView Factory
 */

include_once(__DIR__.'/../../model/ProjectFactory.class.php');
include_once('ProjectGridView.class.php');
include_once('ProjectCarouselView.class.php');
include_once('ProjectBookView.class.php');


class ProjectViewFactory
{
	
	public static function getProjectView (Project $project)
	{
		switch ($project->getPicturesDisplayMode()) {
			case 'GRID':
				return new ProjectGridView($project);

			case 'CAROUSEL':
				return new ProjectCarouselView($project);

			case 'BOOK':
				return new ProjectBookView($project);
		}
	}
	
}
