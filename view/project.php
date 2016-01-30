<?php
/* View */

function show_project($project) {
	?>
	
	<p>Page du projet</p>
	
	<h1><?php echo $project->get_name();?></h1>
	<p><?php echo $project->get_description();?></p>
	
	<?php
}
