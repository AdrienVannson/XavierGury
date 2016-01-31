<?php
/* View */
include_once("model/Theme.class.php");
include_once("head.php");

function show_themes($themes) {
	?>
	
	<!DOCTYPE HTML>
	<html lang="fr">
		<?php show_head("Thèmes"); ?>
		<body>
			
			<h1>Voici les thèmes du site !</h1>
			
			<a href="/">Accueil</a>
			
			<?php
			foreach ($themes as $theme) {
				?>
				
				<h2> <a href="/<?php echo $theme->get_id();?>-<?php echo $theme->get_name_formatted();?>" style="color:#<?php echo $theme->get_color();?>;"> <?php echo $theme->get_name();?> </a> </h2>
				<p>
					<?php echo $theme->get_description();?>
				</p>
				
				<?php
			}
			?>
			
		</body>
	</html>
	
	<?php
}
