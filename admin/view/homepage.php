<?php
/* View */

function show_admin_homepage() {
	?>

<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Administration - Xavier Gury</title>
		<link rel="stylesheet" type="text/css" href="/admin/styles.css"/>
	</head>
	
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
