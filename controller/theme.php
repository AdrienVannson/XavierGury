<?php
/* Controller */
include_once(__DIR__."/../model/Project.class.php");
include_once(__DIR__."/../view/theme.php");


$theme_id = $_GET["theme_id"];
$theme = new Theme($theme_id);

if($_GET["theme_name"] == $theme->get_name()) {
	show_theme($theme);
}
else {
	include("controller/errors/404.php");
}
