<?php
/* Controller */
include_once(__DIR__."/../model/Project.class.php");


$project_id = $_GET["project_id"];
$project = new Project($project_id);

if($_GET["url"] == $project->getUrl()) {
	include(__DIR__."/../view/project.php");
}
else {
	include("controller/errors/404.php");
}
