<?php
/* Controller */
include_once(__DIR__.'/../model/Project.class.php');
include_once(__DIR__.'/../model/SettingsFactory.class.php');


$FIRST_LEVEL_PROJECTS = getFirstLevelProjects();
$SETTINGS = SettingsFactory::getSettings();

include(__DIR__.'/../view/homepage.php');