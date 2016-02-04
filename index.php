<?php
/* Fichier principal : inclut les controllers */

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
	
	if($request[0] == "themes") { // Page des thèmes
		include("controller/themes.php");
		exit();
	}
	if( preg_match("#[0-9]+-.*#", $request[0]) ) { // Page de thème
		$datas = explode("-", $request[0]);
		
		$_GET["theme_id"] = $datas[0]; // TODO : faire propre !
		include("controller/theme.php");
		exit();
	}
	
}

if($size == 2) {
	
	if($request[0] == "styles") { // Feuilles de styles 
		
		if($request[1] == "project.css") {
			include("controller/project/project_styles.php");
			exit();
		}
		if($request[1] == "themes-styles.css") {
			include("controller/themes/themes_styles.php");
			exit();
		}
		
	}
	if($request[0] == "scripts") { // Scripts
		
		if($request[1] == "themes-scripts.js") {
			include("controller/themes/themes_scripts.php");
			exit();
		}
		
	}
	if(preg_match("#[0-9]+-.*#", $request[0]) && preg_match("#[0-9]+-.*#", $request[1])) { // Page de projet
		$datas = explode("-", $request[1]);
		
		$_GET["project_id"] = $datas[0];
		include("controller/project.php");
		exit();
	}
}

// La page n'existe pas
echo "404";
