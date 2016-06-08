<?php
/* Controller */
include_once(__DIR__."/../model/Project.class.php");
include_once(__DIR__."/../view/project.php");


$project_id = $_GET["project_id"];
$project = new Project($project_id);

//if($_GET["project_name"] == $project->get_name()) {
if (true) { // TODO : check

	show_project($project);

}
else {
	include("controller/errors/404.php");
}
