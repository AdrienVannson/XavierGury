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
			
			<style>
body {
	background-color: #111;
}


#menu {
	color: #FFF;
	width: 18%;
}

#contents {
	margin-left: 20%;
	color: #EEE;
}

a {
	color: #FFF;
}
			</style>
			
			<div id="menu">
				<ul>
					<?php 
					$projects = $theme->get_projects();
					
					foreach($projects as $project) {
						?>
						<li>
							<a href="/<?php echo $theme->get_id();?>-<?php echo $theme->get_name_formatted();?>/<?php echo $project->get_id();?>-<?php echo $project->get_name_formatted();?>">
								<?php echo strtoupper($project->get_name());?>
							</a>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
			
			<div id="contents">
				<a href="/">Accueil</a>
				<h1><?php echo $theme->get_name();?></h1>
				<p><?php echo $theme->get_description();?></p>
				
				<h2>Projets :</h2>
				
				
			</div>
			
		</body>
	</html>
	
	<?php
}
