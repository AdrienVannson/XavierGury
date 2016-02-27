<?php
/* Controller */
include_once(__DIR__."/../../model/Project.class.php");
include_once(__DIR__."/../view/project.php");

session_start();


$project = new Project($_GET["id_project"]);

if($_GET["id_project"] == -1 && isset($_SESSION["last_theme_id"])) {
	$project->set_id_theme( $_SESSION["last_theme_id"] );
}


/* Traitement du formulaire */
if(isset($_POST["save"])) {
	$project->set_id_theme( $_POST["id_theme"] );
	$project->set_name( $_POST["name"] );
	$project->set_description( $_POST["description"] );
	
	$project->save();
	
	header("Location: /admin/projets/".$project->get_id());
}
if(isset($_POST["delete"])) {
	$project->delete();
	
	header("Location: /admin/themes/".$_GET["id_theme"]);
}


show_admin_project($project);
$_SESSION["last_project_id"] = $project->get_id();
