<?php
/* Controller */
include_once(__DIR__."/../../model/Theme.class.php");
include_once(__DIR__."/../view/theme.php");

$theme = new Theme($_GET["id_theme"]); 

/* Traitement du formulaire */
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


show_admin_theme($theme);
$_SESSION["last_theme_id"] = $theme->get_id();
