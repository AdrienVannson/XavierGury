<?php
/*
 * Controller
 *
 * Generate thumbnails for all the pictures
 */

include_once(__DIR__.'/../../model/PictureFactory.class.php');

set_time_limit(0); // No time limit

$db = get_db();
$result = $db->query('SELECT id FROM pictures');

while ($datas = $result->fetch()) {
	$id = $datas['id'];
	$picture = PictureFactory::getPicture($id);

	if ($picture->getType() == 'youtube') {
		continue;
	}

	// Generate the thumbnails
	$folder = __DIR__ . '/../../resources/pictures/' . $id;
	$picture->generateFiles();

	echo "$id $folder<br/>";
	ob_flush();
	flush();
}
