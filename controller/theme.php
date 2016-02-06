<?php
/* Controller */
include_once("model/Project.class.php");
include_once("view/theme.php");


$theme_id = $_GET["theme_id"];
$theme = new Theme($theme_id);

if($_GET["theme_name"] == $theme->get_name_formatted()) {
	show_theme($theme);
}
else {
	include("controller/errors/404.php");
}
