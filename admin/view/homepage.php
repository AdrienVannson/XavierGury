<?php
/* View */
include_once(__DIR__."/../../view/head.php");

function show_admin_homepage() {
	?>

<!DOCTYPE HTML>
<html lang="fr">
	<?php show_head("Administration", array("/admin/styles.css"));?>
	
	<body>
		
		<h1>Administration</h1>
		
		<p>Bienvenu dans l'interface d'administration du site.<br/>
		Ici, vous pouvez ajouter des catégories, des projets ou des ressources au site.<br/>
		Si vous n'êtes pas l'administrateur du site, veuiller fermer cette page IMMEDIATEMENT.</p>
		
		<ul>
			<li><a href="/admin/themes">Afficher les thèmes</a></li>
		</ul>
		
	</body>
	
</html>

	<?php
}
