<?php 
/* View */
include_once(__DIR__."/head.php");


function show_homepage() {
	?>
	
	<!DOCTYPE HTML>
	<html lang="fr">
		
		<?php show_head("Accueil"); ?>
		
		<body>
			<p>Bienvenue !</p>
			
			<ul>
				<li><a href="/themes">Mots</a></li>
				<li><a href="/grille-images">Images</a></li>
				<li><a href="/journal">Journal</a></li>
			</ul>
			
		</body>
	</html>
	
	<?php
}

