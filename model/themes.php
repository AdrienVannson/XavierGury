<?php
/* Model */
include_once(__DIR__."/Theme.class.php");


function get_themes() { /* Retourne la liste des thèmes */

	$db = get_db();
	$result = $db->query("SELECT id FROM themes");

	$themes = [];

	while($datas = $result->fetch()) {
		$id = $datas["id"];
		$themes[] = new Theme($id);
	}

	return $themes;
}

function get_nb_themes() {
	
	$db = get_db();
	$result = $db->query("SELECT COUNT(id) FROM themes");
	$datas = $result->fetch();
	return $datas[0];
}
