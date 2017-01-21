<?php
/* Controller */
include_once(__DIR__.'/../view/HomepageView.class.php');

$homepageView = new HomepageView;
$homepageView->sendContents();
