<?php
/* Controller */
include_once("../model/Project.class.php");
include_once("../view/project.php");


$project_id = $_GET["project_id"];
$project = new Project($project_id);
show_project($project);
