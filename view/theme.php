<?php
/* View */
include_once("../model/Theme.class.php");
include_once("head.php");

function show_theme($theme) {
	?>
	
	<!DOCTYPE HTML>
	<html lang="fr">
		
		<?php show_head($theme->get_name()); ?>
		
		<body>
			<a href="/">Accueil</a>
			<h1><?php echo $theme->get_name();?></h1>
			<p><?php echo $theme->get_description();?></p>
			
			<h2>Projets :</h2>
			
			<ul>
				<?php 
				$projects = $theme->get_projects();
				
				foreach($projects as $project) {
					?>
					<li>
						<a href="/<?php echo $theme->get_id();?>-<?php echo $theme->get_name_formatted();?>/<?php echo $project->get_id();?>-<?php echo $project->get_name_formatted();?>">
							<?php echo $project->get_name();?>
						</a>
					</li>
					<?php
				}
				?>
			</ul>
			
		</body>
	</html>
	
	<?php
}
