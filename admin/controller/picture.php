<?php
/* Controller */
include_once(__DIR__."/../../model/Picture.class.php");
include_once(__DIR__."/../view/picture.php");

session_start();


$picture = new Picture($_GET["id_picture"]);

if($_GET["id_picture"] == -1 && isset($_SESSION["last_project_id"])) {
	$picture->set_id_project( $_SESSION["last_project_id"] );
}


/* Traitement du formulaire */
if(isset($_POST["save"])) {
	$picture->set_id_project( $_POST["id_project"] );
	$picture->set_name( $_POST["name"] );
	$picture->set_description( $_POST["description"] );
	
	$picture->save();
	
	header("Location: /admin/images/".$picture->get_id());
}
if(isset($_POST["delete"])) {
	$picture->delete();
	
	header("Location: /admin/projets/".$picture->get_id_project());
}


show_admin_picture($picture);
$_SESSION["last_picture_id"] = $picture->get_id();
