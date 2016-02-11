<?php
/* View */
include_once(__DIR__."/../../view/head.php");

function show_admin_theme($theme) {
	
	if($theme->get_id() == -1) {
		$action = "Ajouter";
	}
	else {
		$action = "Modifier";
	}
	
	?>

<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<?php show_head($action." un thème", array("/admin/styles.css"));?>
	</head>
	
	<body>
		
		<h1><?php echo $action;?> un thème</h1>
		
		<p><a href="/admin/">Accueil</a></p>
		
		
		<form method="POST" action="/admin/themes/<?php echo $theme->get_id();?>">
			
			<p>
				<label for="name">Nom du thème</label>
				<input type="text" name="name" id="name" value="<?php echo $theme->get_name();?>"/>
			</p>
			
			<p>
				<label for="description">Description du thème</label>
				<textarea name="description" id="description"><?php echo $theme->get_description();?></textarea>
			</p>
			
			<p>
				<label for="color">Couleur du thème</label>
				<input type="color" name="color" id="color" value="#<?php echo $theme->get_color();?>"/>
			</p>
			
			<input type="submit" value="<?php echo $action;?> le thème" name="save">
			
			<?php
			if($theme->get_id() != -1) {
				echo '<input type="submit" value="Supprimer le thème" name="delete">';	
			}
			?>
			
		</form>
	
	</body>
</html>

	<?php
}