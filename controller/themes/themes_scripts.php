<?php
/* Controller */
include_once(__DIR__."/../../model/Project.class.php");

$themes = getFirstLevelProjects();

include(__DIR__."/../../view/themes/themes_script.php");