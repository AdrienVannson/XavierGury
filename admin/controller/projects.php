<?php
/* Controller */
include_once(__DIR__."/../../model/Project.class.php");
include_once(__DIR__."/../view/projects.php");

$projects = getFirstLevelProjects();
$projects[] = new Project(10);

show_admin_projects( $projects );
