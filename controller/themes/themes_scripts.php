<?php
/* Controller */
include_once("model/Theme.class.php");
include_once("model/themes.php");
include("view/themes/themes_script.php");

header("Content-Type: text/js");

$themes = get_themes();
show_theme_script($themes);
