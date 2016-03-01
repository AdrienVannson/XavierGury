<?php
/* View */
include_once(__DIR__."/../../view/head.php");
include_once(__DIR__."/menus.php");
include_once(__DIR__."/errors.php");


function show_admin_picture($picture) {
	
	if($picture->get_id() == -1) {
		$action = "Ajouter";
	}
	else {
		$action = "Modifier";
	}
	
	$project = $picture->get_project();
	$theme = $project->get_theme();
	?>

<!DOCTYPE HTML>
<html lang="fr">
	<?php show_head($action." une image",
			array(
				"/admin/styles.css",
				"https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"),
			
			array(
				"http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js",
				"https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js",
				"/ckeditor/ckeditor.js")
	);?>
	<body>
		<?php
		$name = $picture->get_name();
		if($picture->get_id() == -1) {
			$name = "Nouvelle image";
		}
		
		show_admin_menus(array(
			array("Thèmes", "/admin/themes"),
			array($theme->get_name(), $theme->get_url_admin()),
			array($project->get_name(), $project->get_url_admin()),
			array($name, $picture->get_admin_url())
		));
		?>
		
		<main>
			<div class="container">
			
				<h1><?php echo $action;?> une image</h1>
				
				<?php show_admin_errors();?>
				
				
				<form method="POST" action="/admin/images/<?php echo $picture->get_id();?>" enctype="multipart/form-data">
					
					<div class="row">
						<div class="input-field col s12">
							<label for="id_project">Id du projet</label>
							<input type="text" name="id_project" id="id_project" value="<?php echo $picture->get_id_project();?>"/>
						</div>
					</div>
					
					<div class="row">
						<div class="input-field col s12">
							<label for="name">Nom de l'image</label>
							<input type="text" name="name" id="name" value="<?php echo $picture->get_name();?>"/>
						</div>
					</div>
					
					<p>
						<label for="description">Description de l'image</label>
						<textarea id="description" name="description"><?php echo $picture->get_description();?></textarea>
					</p>
					
					<div class="file-field input-field">
						<div class="btn">
							<span>Image</span>
							<input type="file" name="image">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>
					</div>
					
					
					<button class="btn waves-effect waves-light green" type="submit" name="save">
						<?php echo $action;?> l'image
					</button>
					
					<?php
					if($picture->get_id() != -1) {
						?>
						<button class="btn waves-effect waves-light red" type="submit" name="delete">
							Supprimer l'image
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
