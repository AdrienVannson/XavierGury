<?php
/* View */
include_once(__DIR__."/../../view/head.php");
include_once(__DIR__."/menus.php");


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
	<?php show_head($action." un thème",
			array(
				"/admin/styles.css",
				"https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"),
			
			array(
				"http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js",
				"https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js",
				"/ckeditor/ckeditor.js")
	);?>
	<body>
		<?php show_admin_menus();?>
		
		
		<main>
			<h1><?php echo $action;?> un thème</h1>
			
			<?php
			$projects = $theme->get_projects();
			if(sizeof($projects) > 0) {
				echo "<ul>";
				
				foreach($projects as $project) {
					echo '<li><a href="/admin/projets/'.$project->get_id().'">'.$project->get_name()."</a></li>";
				}
				
				echo "</ul>";
			}
			?>
			
			
			<form method="POST" action="/admin/themes/<?php echo $theme->get_id();?>">
				
				<p>
					<label for="name">Nom du thème</label>
					<input type="text" name="name" id="name" value="<?php echo $theme->get_name();?>"/>
				</p>
				
				<p>
					<label for="description">Description du thème</label>
					<textarea id="description" name="description"><?php echo $theme->get_description();?></textarea>
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
			
			
			<script>
				CKEDITOR.replace("description");
			</script>
		
		</main>
		
	</body>
</html>

	<?php
}