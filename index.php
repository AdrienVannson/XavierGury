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
	if($request[0] == "robots.txt") { // Fichier robots.txt
		include("controller/robots_txt.php");
		exit();
	}
	if( preg_match("#^[0-9]+-.*$#", $request[0]) ) { // Page de thème
		$datas = explode("-", $request[0]);
		
		$_GET["theme_id"] = $datas[0];
		$_GET["theme_name"] = $datas[1];
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
		
		if($request[1] == "project.js") {
			include("controller/project/project-script.php");
			exit();
		}
		
	}
	if($request[0] == "ressources") { // Ressources
		
		if( preg_match("#^[0-9]+-.*\.*$#", $request[1]) ) { // TODO : vérifier l'extension
			$datas = explode("-", $request[1]);
			
			$_GET["resource_id"] = $datas[0];
			$_GET["resource_size"] = substr($datas[1], 0, sizeof($datas[1])-5);
			include("controller/picture.php");
			exit();
		}
		
	}
	if(preg_match("#^[0-9]+-.*$#", $request[0]) && preg_match("#^[0-9]+-.*$#", $request[1])) { // Page de projet
		$datasTheme = explode("-", $request[0]);
		$datasProject = explode("-", $request[1]);
		
		
		$_GET["theme_id"] = $datasTheme[0];
		$_GET["theme_name"] = $datasTheme[1];
		
		$_GET["project_id"] = $datasProject[0];
		$_GET["project_name"] = $datasProject[1];
		
		include("controller/project.php");
		exit();
	}
}

// La page n'existe pas
include_once("controller/errors/404.php");
