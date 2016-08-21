<?php
/* Controller */
include_once(__DIR__.'/../model/ProjectFactory.class.php');

$project = ProjectFactory::getProject($PROJECT_ID);

if ($URL == $project->getUrl(false)) {
	include(__DIR__.'/../view/project.php');
}
else {
	include('controller/errors/404.php');
}
