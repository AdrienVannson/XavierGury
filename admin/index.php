<?php
/* Fichier principal : inclut les controllers de l'espace d'administration */

$request = explode("/", $_GET["request"]);
$size = count($request);

// On enlève la chaine vide à la fin, si l'URL se termine par un slash
if($request[$size-1] == "") {
	array_pop($request);
	$size = count($request);
}


if($size == 0 ) { // Homepage
	include("controller/homepage.php");
	exit();
}
if($size == 1) {
	
	if($request[0] == "styles.css") {
		include("controller/styles.php");
		exit();
	}
	
	if($request[0] == "themes") {
		include("controller/themes.php");
		exit();
	}
	
}
if($size == 2) {
	
	if($request[0] == "themes" && is_numeric($request[1])) {
		echo "Theme"; // TODO
		exit();
	}
	
}

// La page n'existe pas
include_once(__DIR__."/../controller/errors/404.php");
