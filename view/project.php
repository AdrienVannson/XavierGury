<?php
/* View */
include_once("../model/Project.class.php");

function show_project($project) {
	?>
	<a href="/">Accueil</a>
	
	<h1><?php echo $project->get_name();?></h1>
	<p><?php echo $project->get_description();?></p>
	
	<?php
}
