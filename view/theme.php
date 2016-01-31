<?php
/* View */
include_once("model/Theme.class.php");
include_once("left_menu.php");
include_once("head.php");

function show_theme($theme) {
	?>
	
	<!DOCTYPE HTML>
	<html lang="fr">
		
		<?php show_head($theme->get_name(), array("project.css")); ?>
		
		<body>
				
			<?php show_left_menu($theme); ?>
			
			<div id="contents">
				<a href="/">Accueil</a>
				<h1><?php echo $theme->get_name();?></h1>
				<p><?php echo $theme->get_description();?></p>
				
				
			</div>
			
		</body>
	</html>
	
	<?php
}
