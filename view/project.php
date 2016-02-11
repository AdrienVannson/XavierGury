<?php
/* View */
include_once(__DIR__."/../model/Project.class.php");
include_once(__DIR__."/../model/Theme.class.php");
include_once(__DIR__."/../model/Resource.class.php");
include_once(__DIR__."/head.php");
include_once(__DIR__."/left_menu.php");


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
					$resources = $project->get_resources();
					foreach($resources as $resource) {
						?>
						<img src="<?php echo $resource->get_url_resource("medium");?>" class="image_project" title="<?php echo $resource->get_name();?>" alt="<?php echo $resource->get_description();?>"/>
						<?php
					}
					?>
				</p>
				
				<p class="description"><?php echo $project->get_description();?></p>
				
				
			</div>
			
		</body>
	</html>
	
	<?php
}
