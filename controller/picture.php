<?php
/* Controller */
include_once(__DIR__.'/../model/PictureFactory.class.php');

$picture = PictureFactory::getPicture($RESOURCE_ID);

if ($picture->getUrlResource($RESOURCE_SIZE, false) != $URL) {
	include('errors/404.php');
}
else {
	$file = fopen($picture->getPathResource($RESOURCE_SIZE), 'rb');
	
	header('Content-Type: image/'.$picture->getType());
	fpassthru($file);
}
