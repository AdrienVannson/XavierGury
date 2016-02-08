<?php
$message = "";

/* Traitement du formulaire */
if(isset($_POST["ajouter"])) {
	
	$name = $_POST["name"];
	$description = $_POST["description"];
	$color = substr($_POST["color"], 1);
	
	
}


?>
<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Ajouter un thème - Xavier Gury</title>
		<link rel="stylesheet" type="text/css" href="/admin/styles.css"/>
	</head>
	
	<body>
	
		<h1>Ajouter un thème</h1>
		
		<p id="message"><?php echo $message;?></p>
		
		<p>Sur cette page, vous pouvez ajouter un nouveau thème au site.
		Ensuite, il faudra ajouter des projets dans ce thème, afin de ne pas le laisser vide.
		Attention, après la validation du formulaire, le contenu est immédiatement publié sur Internet, sans possibilité de modification.</p>
		
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
