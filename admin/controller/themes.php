<?php
/* Controller */
include_once(__DIR__."/../../model/themes.php");
include_once(__DIR__."/../view/themes.php");


show_admin_themes( get_themes() );
