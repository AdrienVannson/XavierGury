<?php
/* Controller */
include_once(__DIR__.'/../view/SitemapView.class.php');

$view = new SitemapView;
$view->sendContents();
