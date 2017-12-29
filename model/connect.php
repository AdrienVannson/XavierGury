<?php

try {
	$db = new PDO('HIDDEN');
}
catch (Exception $e) {
	echo 'Erreur lors de la connexion à la base de données';
	exit();
}

function get_db() {
	global $db;
	return $db;
}

