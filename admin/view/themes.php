<?php
/* View */
include_once(__DIR__."/../../view/head.php");

function show_admin_themes($themes) {
	?>

<!DOCTYPE HTML>
<html lang="fr">
	
	<?php show_head("Thèmes - Administration", array("/admin/styles.css"));?>
	
	<body>
		
		<h1>Thèmes</h1>
		
		<p>Consulter les thèmes du site.</p>
		<p><a href="/admin/">Accueil</a></p>
		
		<ul>
			<?php 
			foreach ($themes as $theme) {
				?>
				<li><a href="/admin/themes/<?php echo $theme->get_id();?>"><?php echo $theme->get_name();?></a></li>
				<?php
			}
			?>
		</ul>
		
		<p><a href="/admin/themes/-1">Nouveau thème</a></p>
		
	</body>
	
</html>

	<?php
}