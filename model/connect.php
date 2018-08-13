<?php

include_once('../config.php');

try {
	$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
}
catch (Exception $e) {
	echo 'Erreur lors de la connexion à la base de données';
	exit();
}

function get_db() {
	global $db;
	return $db;
}
