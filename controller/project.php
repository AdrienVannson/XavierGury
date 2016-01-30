<?php
/* Controller */
include_once("../model/Project.class.php");
include_once("../view/project.php");

$id = $_GET["id"];
$project = new Project($id);
show_project($project);
