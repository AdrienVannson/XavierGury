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

	<?php show_head($project->get_name(), array("/styles/project.css"), array("/scripts/project.js")); ?>

	<body>

		<?php show_left_menu($theme, $project->get_id()); ?>

		<div id="contents">

			<h1><?php echo $project->get_name();?></h1>

			<p>
				<?php
				$pictures = $project->get_resources();
				foreach($pictures as $picture) {
					?>
					<img 
						 src="<?php echo $picture->get_url_resource("medium");?>"
						 class="project-picture"
						 title="<?php echo $picture->get_name();?>"
						 alt="<?php echo $picture->get_description();?>"
						 onclick="showPicture(<?php echo $picture->get_id();?>)"
					/>
					<?php
				}
				?>
			</p>

			<div class="description"><?php echo $project->get_description();?></div>

		</div>
		
		<div id="picture-preview">
			<!--<div style="background-color:red;position:absolute;top:10px;bottom:10px; left:0;right:0;"></div>-->
		</div>

	</body>
</html>
	
	<?php
}
