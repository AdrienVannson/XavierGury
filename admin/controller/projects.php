<?php
/* Controller */
include_once(__DIR__.'/../../model/ProjectFactory.class.php');
include_once(__DIR__.'/../view/projects.php');

$projects = getFirstLevelProjects();
$projects[] = ProjectFactory::getProject(10);

show_admin_projects( $projects );
