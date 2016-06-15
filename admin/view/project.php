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
		<?php
		$name = $project->get_name();
		if($project->get_id() == -1) {
			$name = "Nouveau projet";
		}
		
		show_admin_menus(array(
			array("Projet", "/admin/projects/"),
			array($name, $project->get_url_admin())
		));
		?>
		
		
		<main>
			<div class="container">
			
				<h1><?php echo $action;?> un projet</h1>
				
				
				<form method="POST" action="/admin/projets/<?php echo $project->get_id();?>">
					
					<div class="row">
						<div class="input-field col s12">
							<label for="id_theme">Id du parent</label>
							<input type="text" name="id_theme" id="id_theme" value="<?php echo $project->get_id_parent();?>"/>
						</div>
					</div>
					
					<div class="row">
						<div class="input-field col s12">
							<label for="name">Nom du projet</label>
							<input type="text" name="name" id="name" value="<?php echo $project->get_name();?>"/>
						</div>
					</div>
					
					<p>
						<label for="description">Description du projet</label>
						<textarea id="description" name="description"><?php echo $project->get_description();?></textarea>
					</p>
					
					<p>
						<label for="color">Couleur du projet</label>
						<input type="color" name="color" id="color" value="#<?php echo $project->get_color();?>"/>
					</p>
					
					<button class="btn waves-effect waves-light green" type="submit" name="save">
						<?php echo $action;?> le projet
					</button>
					
					<?php
					if($project->get_id() != -1) {
						?>
						<button class="btn waves-effect waves-light red" type="submit" name="delete">
							Supprimer le projet
						</button>
						<?php
					}
					?>
					
				</form>
				
				
				<hr style="margin-top:20px;margin-bottom:20px;"/>
				
				
				<?php
				$pictures = $project->get_pictures();
				if(sizeof($pictures) > 0) {
					?>
					<div class="row">
						<?php
						foreach($pictures as $picture) {
							?>
							<div class="col s3">
								
								<div class="card hoverable">
									<div class="card-image">
										<div style="overflow:hidden;max-height:400px;">
											<img src="<?php echo $picture->get_url_resource("medium");?>">
										</div>
										<span class="card-title"><?php echo $picture->get_name();?></span>
									</div>
									<div class="card-content">
										<?php echo $picture->get_description();?>
									</div>
									<div class="card-action">
										<a href="/admin/images/<?php echo $picture->get_id();?>" class="btn-flat waves-effect waves-orange">Modifier</a>
									</div>
								</div>

							</div>
							<?php
						}
						?>
					</div>
					<?php
				}
				?>
				
				<p><a href="/admin/images/-1" class="btn waves-effect waves-light green right right-btn">Nouvelle image</a></p>
				
				
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
