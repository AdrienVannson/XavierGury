<?php
/* View */
include_once(__DIR__.'/menus.php');

?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
	<meta charset="utf-8"/>

	<title>Paramètres - Administration - Xavier Gury</title>

	<link rel="icon" type="image/png" href="/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="/admin/styles.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"/>

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

<?php
show_admin_menus( array( array('Paramètres', '/admin/settings/') ));
?>


<main>
	<div class="container">

		<h1>Paramètres</h1>


		<form method="POST" action="/admin/settings/">

			<p>
				<label for="description">Description (texte affiché sur la page d'accueil)</label>
				<textarea id="description" name="description"><?php echo $SETTINGS->getDescription();?></textarea>
			</p>

			<button class="btn waves-effect waves-light green" type="submit" name="save">Enregistrer</button>

		</form>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
		<script src="/static/ckeditor/ckeditor.js"></script>

		<script>
			CKEDITOR.replace('description');
			$('.button-collapse').sideNav();
		</script>

	</div>
</main>

</body>
</html>