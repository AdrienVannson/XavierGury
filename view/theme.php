<?php
/* View */
include_once(__DIR__."/../model/Theme.class.php");
include_once(__DIR__."/left_menu.php");
include_once(__DIR__."/head.php");

function show_theme($theme) {
	?>
	
	<!DOCTYPE HTML>
	<html lang="fr">
		
		<?php show_head($theme->get_name(), array("/styles/project.css")); ?>
		
		<body>
				
			<?php show_left_menu($theme); ?>
			
			<div id="contents">
				
				<h1><?php echo $theme->get_name();?></h1>
				<div class="description"><?php echo $theme->get_description();?></div>
				
			</div>
			
		</body>
	</html>
	
	<?php
}
