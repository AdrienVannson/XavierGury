<?php
/* Controller */
include_once("model/Project.class.php");
include_once("view/project.php");


$project_id = $_GET["project_id"];
$project = new Project($project_id);
$theme = $project->get_theme();

if($_GET["project_name"] == $project->get_name() &&
   $_GET["theme_id"] == $theme->get_id() &&
   $_GET["theme_name"] == $theme->get_name()) {

	show_project($project);

}
else {
	include("controller/errors/404.php");
}
