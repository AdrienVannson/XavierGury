<?php
/* Controller */
include_once(__DIR__."/../../model/Project.class.php");
include_once(__DIR__."/../view/project.php");


$project = new Project($_GET["id_project"]);

/* Traitement du formulaire *//*
if(isset($_POST["save"])) {
	
	$theme->set_name( $_POST["name"] );
	$theme->set_description( $_POST["description"] );
	$theme->set_color( $_POST["color"] );
	
	$theme->save();
	
	header("Location: /admin/themes/".$theme->get_id());
}*/
if(isset($_POST["delete"])) {
	$project->delete();
	
	header("Location: /admin/themes/".$_GET["id_theme"]);
}


show_admin_project($project);
