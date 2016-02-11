<?php
/* View */
include_once(__DIR__."/../../view/head.php");

function show_admin_theme($theme) {
	?>

<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<?php show_head("Ajouter un thème", array("/admin/styles.css"));?>
	</head>
	
	<body>
		
		<h1>Ajouter un thème</h1>
		
		<p>Sur cette page, vous pouvez ajouter un nouveau thème au site.<br/>
		Ensuite, il faudra ajouter des projets dans ce thème, afin de ne pas le laisser vide.<br/>
		Attention, après la validation du formulaire, le contenu est immédiatement publié sur Internet, sans possibilité de modification.</p>
		
		<p><a href="/admin/">Accueil</a></p>
		
		<form method="POST" action="/admin/ajouter-theme.php">
			
			<p>
				<label for="name">Nom du thème</label>
				<input type="text" name="name" id="name"/>
			</p>
			
			<p>
				<label for="description">Description du thème</label>
				<textarea name="description" id="description"></textarea>
			</p>
			
			<p>
				<label for="color">Couleur du thème</label>
				<input type="color" name="color" id="color"/>
			</p>
			
			<input type="submit" value="Ajouter le thème" name="ajouter">
			
		</form>
	
	</body>
</html>

	<?php
}