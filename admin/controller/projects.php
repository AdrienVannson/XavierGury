<?php
/* Controller */
include_once(__DIR__."/../../model/Project.class.php");
include_once(__DIR__."/../view/projects.php");


show_admin_projects( get_first_level_projects() );
