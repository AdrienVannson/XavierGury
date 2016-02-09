<?php
$message = "";

/* Traitement du formulaire */
if(isset($_POST["add"])) {
	include_once("save-image.php");
	include_once("../model/Resource.class.php");
	
	$resource = new Resource(-1);
	$resource->set_id_project( $_POST["id_project"] );
	$resource->set_type( $_POST["type"] );
	$resource->set_name( $_POST["name"] );
	$resource->set_description( $_POST["description"] );
	
	/* Envoi du fichier */
	$dir = dirname(__DIR__)."/resources/".$resource->get_id();
	mkdir($dir, 0777);
	
	save_image($_FILES["file"]["tmp_name"], $dir."/", "small");
	save_image($_FILES["file"]["tmp_name"], $dir."/", "medium");
	save_image($_FILES["file"]["tmp_name"], $dir."/", "large");
	
	$message = "La ressource a bien été ajoutée";
}
?>
<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Ajouter une ressource - Xavier Gury</title>
		<link rel="stylesheet" type="text/css" href="/admin/styles.css"/>
	</head>
	
	<body>
		
		<h1>Ajouter une ressource</h1>
		
		<?php
		if($message != "") {
			echo '<p id="message">'.$message.'</p>';
		}
		?>
		
		<p>Sur cette page, vous pouvez ajouter une ressource à un projet du site.</p>
		
		<p><a href="/">Accueil</a><br/>
		<a href="/admin/">Accueil de l'espace administration</a></p>
		
		<form method="POST" action="/admin/ajouter-ressource.php" enctype="multipart/form-data">
			
			<p>
				<label for="id_project">Id du projet</label>
				<input type="text" name="id_project" id="id_project"/>
			</p>
			
			<p>
				<label for="type">Type</label>
				<select name="type" id="type">
					<option value="picture" selected>Image</option> 
					<option value="video">Vidéo</option>
				</select>
			</p>
			
			<p>
				<label for="name">Nom</label>
				<input type="text" name="name" id="name"/>
			</p>
			
			<p>
				<label for="description">Description</label>
				<textarea name="description" id="description"></textarea>
			</p>
			
			<p>
				<label for="file">Fichier</label>
				<input type="file" name="file" id="file"/>
			</p>
			
			<input type="submit" value="Ajouter la ressource" name="add">
			
		</form>
	
	</body>
</html>
