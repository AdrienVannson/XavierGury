<?php
/* View */
include_once("../model/Theme.class.php");

function show_theme($theme) {
	?>
	
	<h1><?php echo $theme->get_name();?></h1>
	<p><?php echo $theme->get_description();?></p>
	
	<?php
}
