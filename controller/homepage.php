<?php
/* Controller */
include_once(__DIR__."/../model/Project.class.php");


$firstLevelProjects = getFirstLevelProjects();

include(__DIR__."/../view/homepage.php");