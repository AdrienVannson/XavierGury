<?php
/* Controller */
include_once(__DIR__."/../../model/Picture.class.php");
include_once(__DIR__."/../view/picture.php");


$picture = new Picture($_GET["id_picture"]);


show_admin_picture($picture);
