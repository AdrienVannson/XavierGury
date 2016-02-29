<?php
/* View */
include_once(__DIR__."/../model/Project.class.php");
include_once(__DIR__."/../model/Theme.class.php");
include_once(__DIR__."/../model/Picture.class.php");
include_once(__DIR__."/head.php");
include_once(__DIR__."/left_menu.php");


function show_project($project) {
	$theme = $project->get_theme();
	?>
	
	<!DOCTYPE HTML>
	<html lang="fr">
		
		<?php show_head($project->get_name(), array("/styles/project.css")); ?>
		
		<body>
				
			<?php show_left_menu($theme, $project->get_id()); ?>
			
			<div id="contents">
				
				<h1><?php echo $project->get_name();?></h1>
				
				<p>
					<?php
					$pictures = $project->get_resources();
					foreach($pictures as $picture) {
						?>
						<img src="<?php echo $picture->get_url_resource("medium");?>" class="image_project" title="<?php echo $picture->get_name();?>" alt="<?php echo $picture->get_description();?>"/>
						<?php
					}
					?>
				</p>
				
				<div class="description"><?php echo $project->get_description();?></div>
				
			</div>
			
		</body>
	</html>
	
	<?php
}
