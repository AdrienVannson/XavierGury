<?php
/* Controller */
include_once(__DIR__.'/../model/ProjectFactory.class.php');

$project = ProjectFactory::getInstance()->getProject($PROJECT_ID);

if ($URL == $project->getUrl()) {
	include(__DIR__."/../view/project.php");
}
else {
	include("controller/errors/404.php");
}
