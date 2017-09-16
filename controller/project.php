<?php
/* Controller */
include_once(__DIR__.'/../model/ProjectFactory.class.php');
include_once(__DIR__.'/../view/project/ProjectViewFactory.class.php');

$url = $URL;
$request = $REQUEST;


// Process the URL
$path = [];

foreach ($request as $level) {
	$path[] = explode('-', $level);
}

$projectID = end($path)[0];


$project = ProjectFactory::getProject($projectID);

if ($url == $project->getUrl(false)) {
	$projectView = ProjectViewFactory::getProjectView($project);
	$projectView->sendContents();
}
else {
	include('controller/errors/404.php');
}
