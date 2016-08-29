<?php
/*
 * Controller
 *
 * Generate thumbnails for all the pictures
 *
 */

include_once(__DIR__.'/../../model/PictureFactory.class.php');

$db = get_db();
$result = $db->query('SELECT id FROM pictures');

while ($datas = $result->fetch()) {
	$id = $datas['id'];
	$picture = PictureFactory::getPicture($id);

	if ($picture->getType() == 'youtube') {
		continue;
	}


	// Rename
	$folder = __DIR__ . '/../resources/pictures/' . $id;

	$oldFilename = $folder . '/large.' . $picture->getType();
	$newFilename = $folder . '/r.' . $picture->getType();

	if (file_exists($oldFilename)) {
		rename($oldFilename, $newFilename);
	}


	// Generate the thumbnails
	$picture->generateFiles();


	echo "$id $folder <br/>";
	ob_flush();
	flush();
}
