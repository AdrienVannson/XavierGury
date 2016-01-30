<?php
/* View */
include_once("../model/Theme.class.php");

function show_theme($theme) {
	?>
	
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
	
	<?php
}
