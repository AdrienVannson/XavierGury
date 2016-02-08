<?php
$message = "";

/* Traitement du formulaire */
if(isset($_POST["ajouter"])) {

	include_once("../model/Project.class.php");
	
	$id_theme = $_POST["id_theme"];
	$name = $_POST["name"];
	$description = $_POST["description"];

	$project = new Project(-1);
	$project->set_id_theme($id_theme);
	$project->set_name($name);
	$project->set_description($description);

	$message = "Le projet a bien été ajouté à la base de données";
}
?>
<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Ajouter un projet - Xavier Gury</title>
		<link rel="stylesheet" type="text/css" href="/admin/styles.css"/>
	</head>
	
	<body>
		
		<h1>Ajouter un projet</h1>
		
		<?php
		if($message != "") {
			echo '<p id="message">'.$message.'</p>';
		}
		?>
		
		<p>Sur cette page, vous pouvez ajouter un nouveau projet au site.</p>
		
		<p><a href="/">Accueil</a><br/>
		<a href="/admin/">Accueil de l'espace administration</a></p>
		
		<form method="POST" action="/admin/ajouter-projet.php">
			
			<p>
				<label for="id_theme">Id du thème</label>
				<input type="text" name="id_theme" id="id_theme"/>
			</p>
			
			<p>
				<label for="name">Nom du projet</label>
				<input type="text" name="name" id="name"/>
			</p>
			
			<p>
				<label for="description">Description du projet</label>
				<textarea name="description" id="description"></textarea>
			</p>
			
			<input type="submit" value="Ajouter le projet" name="ajouter">
			
		</form>
	
	</body>
</html>
