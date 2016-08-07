<?php
/* View */
include_once(__DIR__."/../../view/head.php");
include_once(__DIR__."/menus.php");
include_once(__DIR__."/errors.php");


function show_admin_picture($picture) {
	
	if($picture->getId() == -1) {
		$action = "Ajouter";
	}
	else {
		$action = "Modifier";
	}
	
	$project = $picture->getProject();
	?>

<!DOCTYPE HTML>
<html lang="fr">
	<?php show_head($action." une ". ($picture->getType()=="youtube" ? "vidéo" : "image"),
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
		$name = $picture->getName();
		if($picture->getId() == -1) {
			if ($picture->getType() == "youtube")  {
				$name = "Nouvelle vidéo";
			}
			else {
				$name = "Nouvelle image";
			}	
		}
		
		show_admin_menus(array(
			array("Projets", "/admin/projects/"),
			array($project->getName(), $project->getUrlAdmin()),
			array($name, $picture->getAdminUrl())
		));
		?>
		
		<main>
			<div class="container">
			
				<h1><?php echo $action;?></h1>
				
				<?php show_admin_errors();?>
				
				
				<form method="POST" action="<?php echo $picture->getAdminUrl();?>" enctype="multipart/form-data">
					
					<div class="row">
						<div class="input-field col s12">
							<label for="id_project">Id du projet</label>
							<input type="text" name="id_project" id="id_project" value="<?php echo $picture->getIdProject();?>"/>
						</div>
					</div>
					
					<div class="row">
						<div class="input-field col s12">
							<label for="name">Nom</label>
							<input type="text" name="name" id="name" value="<?php echo $picture->getName();?>"/>
						</div>
					</div>
					
					<p>
						<label for="description">Description</label>
						<textarea id="description" name="description"><?php echo $picture->getDescription();?></textarea>
					</p>
					
					<?php
					if ($picture->getType() != 'youtube') {
					?>
						<div class="file-field input-field">
							<div class="btn">
								<span>Image</span>
								<input type="file" name="image">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>
					<?php
					}
					else {
						$infos = explode("\n", $picture->getInfos());
						?>
						<div class="row">
							<div class="input-field col s12">
								<label for="name">Code</label>
								<input type="text" name="url" id="url" value="<?php echo $infos[0];?>"/>
							</div>
						</div>
						
						<div class="row">
							<div class="input-field col s12">
								<label for="name">Hauteur</label>
								<input type="text" name="height" id="height" value="<?php echo $infos[1];?>"/>
							</div>
						</div>
						
						<div class="row">
							<div class="input-field col s12">
								<label for="name">Largeur</label>
								<input type="text" name="width" id="width" value="<?php echo $infos[2];?>"/>
							</div>
						</div>
						<?php
					}
					?>
					
					<input type="hidden" name="type" value="<?php echo $picture->getType();?>"/>
					
					
					<button class="btn waves-effect waves-light green" type="submit" name="save">
						<?php echo $action;?>
					</button>
					
					<?php
					if($picture->getId() != -1) {
						?>
						<button class="btn waves-effect waves-light red" type="submit" name="delete">
							Supprimer
						</button>
						<?php
					}
					?>
					
				</form>
				
				<hr style="margin:30px;"/>
				
				<a class="waves-effect waves-light btn modal-trigger" href="#apercu">Aperçu</a>
				
				<!-- Aperçu de l'image -->
				<div id="apercu" class="modal">
					<div class="modal-content">
						<?php
						if ($picture->getType() == "youtube") {
							echo $picture->getHtml(true);
						}
						else {
							echo $picture->getHtml("medium");
						}
						?>
					</div>
					<div class="modal-footer">
						<a href="#" class="modal-action modal-close waves-effect btn-flat">Fermer</a>
					</div>
				</div>
				
				<script>
				$(document).ready(function(){
					$('.modal-trigger').leanModal();
					CKEDITOR.replace("description");
					$(".button-collapse").sideNav();
				});
				</script>
				
			</div>
		</main>
		
	</body>
</html>

	<?php
}
