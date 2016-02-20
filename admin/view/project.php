<?php
/* View */
include_once(__DIR__."/../../view/head.php");
include_once(__DIR__."/menus.php");


function show_admin_project($project) {
	
	if($project->get_id() == -1) {
		$action = "Ajouter";
	}
	else {
		$action = "Modifier";
	}
	
	?>

<!DOCTYPE HTML>
<html lang="fr">
	<?php show_head($action." un projet",
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
			<div class="container">
			
				<h1><?php echo $action;?> un projet</h1>
				
				
				<form method="POST" action="/admin/projets/<?php echo $project->get_id();?>">
					
					<div class="row">
						<div class="input-field col s12">
							<label for="name">Nom du thème</label>
							<input type="text" name="name" id="name" value="<?php echo $project->get_name();?>"/>
						</div>
					</div>
					
					<p>
						<label for="description">Description du thème</label>
						<textarea id="description" name="description"><?php echo $project->get_description();?></textarea>
					</p>
					
					<p>
						<label for="color">Couleur du thème</label>
						<input type="color" name="color" id="color" value="#<?php echo $project->get_color();?>"/>
					</p>
					
					<!--<input type="submit" value="<?php echo $action;?> le thème" name="save">-->
					
					<button class="btn waves-effect waves-light green" type="submit" name="save">
						<?php echo $action;?> le thème
					</button>
					
					<?php
					if($theme->get_id() != -1) {
						?>
						<button class="btn waves-effect waves-light red" type="submit" name="delete">
							Supprimer le thème
						</button>
						<?php
					}
					?>
					
				</form>
				
				
				<script>
					CKEDITOR.replace("description");
					$(".button-collapse").sideNav();
				</script>
				
			</div>
		</main>
		
	</body>
</html>

	<?php
}
