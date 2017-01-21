<?php
/* Controller */
include_once(__DIR__.'/../../view/pictures/Pictures.class.php');

$view = new PicturesView;
$view->sendContents();
