<?php
/* View */
include_once("../model/Themes.class.php");

function show_themes($themes) {
	?>
	
	<h1>Voici les thèmes du site !</h1>
	
	<?php
	
	foreach ($themes as $theme) {
		?>
		
		<h2 style="color:#<?php echo $theme->get_color();?>;"><?php echo $theme->get_name();?></h2>
		<p>
			<?php echo $theme->get_description();?>
		</p>
		
		<?php
	}
}
