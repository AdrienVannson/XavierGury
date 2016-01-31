<?php
/* View */
include_once("../model/Theme.class.php");
include_once("../model/themes.php");

function show_left_menu($currentTheme) {
	
	$themes = get_themes();
	?>
	
	
	<div id="menu">
		<ul>
			<?php 
			$projects = $currentTheme->get_projects();
			
			foreach($projects as $project) {
				?>
				<li>
					<a href="/<?php echo $currentTheme->get_id();?>-<?php echo $currentTheme->get_name_formatted();?>/<?php echo $project->get_id();?>-<?php echo $project->get_name_formatted();?>">
						<?php echo strtoupper($project->get_name());?>
					</a>
				</li>
				<?php
			}
			?>
		</ul>
	
		<div id="color_menu">
			
			<?php 
			foreach($themes as $theme) {
				?>
				<a
					<?php if($theme->get_id()==$currentTheme->get_id()){?>id="color_item_activate"<?php }?>
					class="color_item"
					style="background-color: #<?php echo $theme->get_color();?>;"
					href="/<?php echo $theme->get_id();?>-<?php echo $theme->get_name_formatted();?>"
				></a>
				<?php
			}
			?>
			
		</div>
	
	</div>
	
	<?php
}