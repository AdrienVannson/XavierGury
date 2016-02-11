<?php
/* Controller */
include_once(__DIR__."/../model/Resource.class.php");

$resource = new Resource($_GET["resource_id"]);
$file = fopen($resource->get_path_resource($_GET["resource_size"]), "rb");

header("Content-Type: image/jpg");
fpassthru($file);
