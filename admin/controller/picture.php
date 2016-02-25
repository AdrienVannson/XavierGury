<?php
/* Controller */
include_once(__DIR__."/../../model/Picture.class.php");
include_once(__DIR__."/../view/picture.php");

session_start();


$picture = new Picture($_GET["id_picture"]);

if($_GET["id_picture"] == -1 && isset($_SESSION["last_project_id"])) {
	$picture->set_id_project( $_SESSION["last_project_id"] );
}


show_admin_picture($picture);
$_SESSION["last_picture_id"] = $picture->get_id();
