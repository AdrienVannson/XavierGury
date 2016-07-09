<?php
/* Controller */
include_once(__DIR__."/../view/homepage.php");
include_once(__DIR__."/../model/Project.class.php");

show_homepage(get_first_level_projects());
