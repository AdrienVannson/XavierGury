<?php
/* Controller */
include_once(__DIR__."/../../model/Theme.class.php");
include_once(__DIR__."/../view/theme.php");


$theme = new Theme($_GET["id_theme"]); 

/* Traitement du formulaire */
if(isset($_POST["ajouter"])) {
	
	$name = $_POST["name"];
	$description = $_POST["description"];
	$color = substr($_POST["color"], 1);
	
	$theme = new Theme(-1);
	$theme->set_name($name);
	$theme->set_description($description);
	$theme->set_color($color);
	
	$message = "Le thème a bien été ajouté à la base de données";
}


show_admin_theme($theme);
