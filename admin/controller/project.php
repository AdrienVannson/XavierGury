<?php
/* Controller */
include_once(__DIR__."/../../model/Project.class.php");
include_once(__DIR__."/../view/project.php");

$project = new Project($_GET["id_project"]);

if($_GET["id_project"] == -1) {
	$project->set_id_parent( $_GET["id_parent"] );
}


/* Traitement du formulaire */
if(isset($_POST["save"])) {
	$project->set_id_parent( $_POST["id_theme"] );
	$project->set_name( $_POST["name"] );
	$project->set_description( $_POST["description"] );
	$project->set_color( $_POST["color"] );
	
	$project->save();
	
	header("Location: /admin/projects/".$project->get_id());
}
if(isset($_POST["delete"])) {
	$project->delete();
	
	header("Location: /admin/projects/");
}


show_admin_project($project);
$_SESSION["last_project_id"] = $project->get_id();
