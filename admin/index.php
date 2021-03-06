<?php
/* Fichier principal : inclut les controllers de l'espace d'administration */
session_start();

$request = explode('/', $_GET['request']);
$size = count($request);

// On enlève la chaine vide à la fin, si l'URL se termine par un slash
if ($request[$size-1] == '') {
	array_pop($request);
	$size = count($request);
}


if ($size == 0 ) { // Homepage
	include('controller/homepage.php');
	exit();
}
if ($size == 1) {
	
	if ($request[0] == 'styles.css') {
		include('controller/styles.php');
		exit();
	}
	
	if ($request[0] == 'projects') {
		include('controller/projects.php');
		exit();
	}
	
	if ($request[0] == 'settings') {
		include('controller/settings.php');
		exit();
	}

	if ($request[0] == 'help') {
		include('controller/help.php');
		exit();
	}
	
	if ($request[0] == 'generate-thumbnails') {
		include("controller/generate-thumbnails.php");
		exit();
	}
	
}
if ($size == 2) {
	
	if ($request[0] == 'projects' && is_numeric($request[1])) {
		$_GET['id_project'] = intval($request[1]);
		include('controller/project.php');
		exit();
	}
	
	if ($request[0] == 'pictures' && is_numeric($request[1])) {
		$_GET['id_picture'] = intval($request[1]);
		include('controller/picture.php');
		exit();
	}
	
}
if ($size == 3) {
	
	if ($request[1] == 'new' && is_numeric($request[2])) {
		
		if ($request[0] == 'projects') {
			$_GET['id_project'] = -1;
			$_GET['id_parent'] = intval($request[2]);
			include('controller/project.php');
			exit();
		}
		
		if ($request[0] == 'pictures') {
			$_GET['id_picture'] = -1;
			$_GET['id_parent'] = intval($request[2]);
			$_GET['type'] = '';
			include('controller/picture.php');
			exit();
		}
		
		if ($request[0] == 'movies') {
			$_GET['id_picture'] = -1;
			$_GET['id_parent'] = intval($request[2]);
			$_GET['type'] = 'youtube';
			include('controller/picture.php');
			exit();
		}
		
	}
	
}


// La page n'existe pas
include_once(__DIR__.'/../controller/errors/404.php');
