<?php
/* Controller */
include_once(__DIR__.'/../../model/ProjectFactory.class.php');

header('HTTP/1.0 404 Not Found');

$PROJECT = ProjectFactory::getProject(9);

include(__DIR__.'/../../view/project.php');
