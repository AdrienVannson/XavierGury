<?php
/* Fichier principal : inclut les controllers */

$request = explode('/', $_GET['request']);
$size = count($request);

// On enlève la chaine vide à la fin, si l'URL se termine par un slash
if ($request[$size-1] == '') {
	array_pop($request);
	$size = count($request);
}


if ($size == 0) { // Homepage
	include('controller/homepage.php');
	exit();
}

if ($size == 1) {
	
	if ($request[0] == 'themes') { // Page des thèmes
		include('controller/themes.php');
		exit();
	}
	
	if ($request[0] == 'robots.txt') { // Fichier robots.txt
		include('controller/robots-txt.php');
		exit();
	}
	
}

if ($size == 2) {
	
	if ($request[0] == 'styles') { // Feuilles de styles 
		
		if ($request[1] == 'project.css') {
			include('controller/project/project-styles.php');
			exit();
		}
		
		if ($request[1] == 'themes-styles.css') {
			include('controller/themes/themes_styles.php');
			exit();
		}
		
	}
	if ($request[0] == 'scripts') { // Scripts
		
		if ($request[1] == 'themes-scripts.js') {
			include('controller/themes/themes_scripts.php');
			exit();
		}
		
		if ($request[1] == 'project.js') {
			include('controller/project/project-script.php');
			exit();
		}
		
	}
	
}


$regexPictures = '#^([0-9]+-.*/)+ressources/([0-9]+)(s|m|l|r)-.*\.(png|jpg|gif)$#';
if (preg_match($regexPictures, $_GET['request'])) {
	$infos = explode('\n', preg_replace($regexPictures, '$2\n$3', $_GET['request']));

	$_GET['resource_id'] = $infos[0];
	$_GET['resource_size'] = $infos[1];
	include('controller/picture.php');
	exit();
}

if (preg_match('#^([0-9]+-.*)+$#', $_GET['request'])) { // Page de projet

	$path = [];
	
	foreach ($request as $level) {
		$path[] = explode('-', $level);
	}

	$PROJECT_ID = end($path)[0];
	$URL = '/'.implode('/', $request);

	include('controller/project.php');
	exit();
}


// La page n'existe pas
include_once('controller/errors/404.php');
