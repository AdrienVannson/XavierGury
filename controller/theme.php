<?php
/* Controller */
include_once("model/Project.class.php");
include_once("view/theme.php");


$theme_id = $_GET["theme_id"];
$theme = new Theme($theme_id);
show_theme($theme);
