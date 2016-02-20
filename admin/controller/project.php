<?php
/* Controller */
include_once(__DIR__."/../../model/Project.class.php");
include_once(__DIR__."/../view/project.php");


$theme = new Project($_GET["id_project"]);

/* Traitement du formulaire *//*
if(isset($_POST["save"])) {
	
	$theme->set_name( $_POST["name"] );
	$theme->set_description( $_POST["description"] );
	$theme->set_color( $_POST["color"] );
	
	$theme->save();
	
	header("Location: /admin/themes/".$theme->get_id());
}
if(isset($_POST["delete"])) {
	$theme->delete();
	
	header("Location: /admin/themes");
}
*/

show_admin_project($theme);
