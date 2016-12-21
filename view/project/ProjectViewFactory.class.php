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
				return ProjectGridView::getInstance($project);

			case 'CAROUSEL':
				return ProjectCarouselView::getInstance($project);

			case 'BOOK':
				return ProjectBookView::getInstance($project);
		}
	}
	
}
