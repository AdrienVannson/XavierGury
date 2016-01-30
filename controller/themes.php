<?php
/* Controller */
include_once("../model/Themes.class.php");
include_once("../view/themes.php");

$themes = get_themes();
show_themes($themes);
