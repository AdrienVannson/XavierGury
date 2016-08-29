<?php
// Execute one time, then delete the file
include_once(__DIR__.'/model/PictureFactory.class.php');

$db = get_db();
$result = $db->query('SELECT id FROM pictures');

while ($datas = $result->fetch()) {
	$id = $datas['id'];
	$picture = PictureFactory::getPicture($id);
	
	if ($picture->getType() == 'youtube') {
		continue;
	}


	// Renommage
	$folder = __DIR__ . '/resources/pictures/' . $id;
	
	$oldFilename = $folder . '/large.' . $picture->getType();
	$newFilename = $folder . '/r.' . $picture->getType();
	
	if (file_exists($oldFilename)) {
		rename($oldFilename, $newFilename);
	}
	
	
	// Générations des autrs dimensions
	$picture->generateFiles();
	
	
	echo "$id $folder <br/>";
	ob_flush();
	flush();
}
