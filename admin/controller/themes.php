<?php
/* Controller */
include_once(__DIR__."/../../model/Project.class.php");
include_once(__DIR__."/../view/themes.php");


show_admin_themes( get_first_level_projects() );
