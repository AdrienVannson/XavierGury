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
			<div class="container">
			
				<h1><?php echo $action;?> un thème</h1>
				
				<form method="POST" action="/admin/themes/<?php echo $theme->get_id();?>">
					
					<div class="row">
						<div class="input-field col s12">
							<label for="name">Nom du thème</label>
							<input type="text" name="name" id="name" value="<?php echo $theme->get_name();?>"/>
						</div>
					</div>
					
					<p>
						<label for="description">Description du thème</label>
						<textarea id="description" name="description"><?php echo $theme->get_description();?></textarea>
					</p>
					
					<p>
						<label for="color">Couleur du thème</label>
						<input type="color" name="color" id="color" value="#<?php echo $theme->get_color();?>"/>
					</p>
					
					
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
				
				
				<hr style="margin-top:20px;margin-bottom:20px;"/>
				
				<div class="row">
					<?php
					$projects = $theme->get_projects();
					if(sizeof($projects) > 0) {
						echo "<ul>";
						
						foreach($projects as $project) {
							?>
							<div class="col s4">
								<a class="btn-large waves-effect waves-light" href="/admin/themes/<?php echo $project->get_id_theme();?>/projets/<?php echo $project->get_id();?>" style="width:100%;margin-bottom:20px;"><?php echo $project->get_name();?></a>
							</div>
							<?php
						}
						
						echo "</ul>";
					}
					?>
				</div>
				
				
				
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