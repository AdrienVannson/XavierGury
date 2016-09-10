<?php
/* View */
include_once(__DIR__.'/../../view/head.php');
include_once(__DIR__.'/menus.php');

?>

<!DOCTYPE HTML>
<html lang="fr">
<?php show_head('Paramètres',
		array(
			'/admin/styles.css',
			'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css'),

		array(
			'http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js',
			'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js',
			'/ckeditor/ckeditor.js')
);?>
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


		<script>
			CKEDITOR.replace('description');
			$('.button-collapse').sideNav();
		</script>

	</div>
</main>

</body>
</html>