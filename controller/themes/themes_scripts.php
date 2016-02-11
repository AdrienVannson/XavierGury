<?php
/* Controller */
include_once(__DIR__."/../../model/Theme.class.php");
include_once(__DIR__."/../../model/themes.php");
include_once(__DIR__."/../../view/themes/themes_script.php");

header("Content-Type: text/js");

$themes = get_themes();
show_theme_script($themes);
