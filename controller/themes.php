<?php
/* Controller */
include_once("model/Theme.class.php");
include_once("model/themes.php");
include_once("view/themes.php");

$themes = get_themes();
show_themes($themes);
