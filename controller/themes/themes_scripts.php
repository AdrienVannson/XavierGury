<?php
/* Controller */
include_once(__DIR__."/../../model/Project.class.php");
include_once(__DIR__."/../../view/themes/themes_script.php");

header("Content-Type: text/js");

show_theme_script( get_first_level_projects() );
