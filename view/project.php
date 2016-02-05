<?php
/* View */
include_once("model/Project.class.php");
include_once("model/Theme.class.php");
include_once("model/Resource.class.php");
include_once("head.php");
include_once("left_menu.php");


function show_project($project) {
	$theme = $project->get_theme();
	?>
	
	<!DOCTYPE HTML>
	<html lang="fr">
		
		<?php show_head($project->get_name(), array("project.css")); ?>
		
		<body>
				
			<?php show_left_menu($theme, $project->get_id()); ?>
			
			<div id="contents">
				
				<h1><?php echo $project->get_name();?></h1>
				
				<p>
					<?php
					$img = new Resource(1);
					echo $img->get_description() . "<br/>";
					?>
				</p>
				
				<p><?php echo $project->get_description();?></p>
				
				
			</div>
			
		</body>
	</html>
	
	<?php
}
