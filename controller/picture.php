<?php
/* Controller */
include_once(__DIR__."/../model/Picture.class.php");

$resource = new Picture($_GET["resource_id"]);
$file = fopen($resource->getPathResource($_GET["resource_size"]), "rb");

header("Content-Type: image/".$resource->getType());
fpassthru($file);
