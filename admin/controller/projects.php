<?php
/* Controller */
include_once(__DIR__.'/../../model/ProjectFactory.class.php');
include_once(__DIR__.'/../view/projects.php');

$projects = getFirstLevelProjects();

show_admin_projects( $projects );
