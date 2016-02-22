<?php
/* Controller */
include_once(__DIR__."/../../model/Project.class.php");
include_once(__DIR__."/../view/project.php");


$project = new Project($_GET["id_project"]);

/* Traitement du formulaire */
if(isset($_POST["save"])) {
	print_r($_POST);
	
	$project->set_id_theme( $_POST["id_theme"] );
	$project->set_name( $_POST["name"] );
	$project->set_description( $_POST["description"] );
	
	$project->save();
	
	header("Location: /admin/themes/".$project->get_id_theme()."/projets/".$project->get_id());
}
if(isset($_POST["delete"])) {
	$project->delete();
	
	header("Location: /admin/themes/".$_GET["id_theme"]);
}


show_admin_project($project);
