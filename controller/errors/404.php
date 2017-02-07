<?php
/* Controller */
include_once(__DIR__.'/../../model/ProjectFactory.class.php');
include_once(__DIR__.'/../../view/project/ProjectView.class.php');

header('HTTP/1.0 404 Not Found');

$project = ProjectFactory::getProject(9);

$vue = new ProjectView ($project);
$vue->sendContents();
