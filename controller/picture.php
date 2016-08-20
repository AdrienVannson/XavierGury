<?php
/* Controller */
include_once(__DIR__.'/../model/PictureFactory.class.php');

$picture = PictureFactory::getPicture($_GET['resource_id']);
$file = fopen($picture->getPathResource($_GET['resource_size']), 'rb');

header('Content-Type: image/'.$picture->getType());
fpassthru($file);
