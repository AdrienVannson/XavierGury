<?php
/* Model */
include_once("Theme.class.php");

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
