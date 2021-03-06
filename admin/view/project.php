<?php
/* View */
include_once(__DIR__.'/menus.php');


function show_admin_project($project) {
	
	if($project->getId() == -1) {
		$action = 'Ajouter';
	}
	else {
		$action = 'Modifier';
	}
	?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
	<meta charset="utf-8"/>

	<title><?php echo $action; ?> un projet - Administration - Xavier Gury</title>

	<link rel="icon" type="image/png" href="/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="/admin/styles.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"/>

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

<?php
$name = $project->getName();
if($project->getId() == -1) {
	$name = 'Nouveau projet';
}

$parents = [ array('Projets', '/admin/projects/') ];

foreach ($project->getParents() as $parent) {
	$parents[] = array($parent->getName(), $parent->getUrlAdmin());
}

$parents[sizeof($parents)-1] = array($name, $project->getUrlAdmin());

show_admin_menus($parents);
?>


<main>
	<div class="container">

		<h1><?php echo $action;?> un projet</h1>


		<form method="POST" action="/admin/projects/<?php echo $project->getId();?>">

			<div class="row">
				<div class="input-field col s12">
					<label for="id_parent">Id du parent</label>
					<input type="text" name="id_parent" id="id_parent" value="<?php echo $project->getIdParent();?>"/>
				</div>
			</div>

			<div class="row">
				<div class="input-field col s12">
					<label for="name">Nom du projet</label>
					<input type="text" name="name" id="name" value="<?php echo $project->getName();?>"/>
				</div>
			</div>

			<p>
				<label for="description">Description du projet</label>
				<textarea id="description" name="description"><?php echo $project->getDescription();?></textarea>
			</p>

			<div class="row">
				<div class="input-field col s12 m6">
					<select name="pictures-display-mode">
						<option value="GRID" <?php if ($project->getPicturesDisplayMode() == 'GRID') { echo 'selected'; } ?>>Grille</option>
						<option value="CAROUSEL"  <?php if ($project->getPicturesDisplayMode() == 'CAROUSEL') { echo 'selected'; } ?>>Caroussel</option>
						<option value="BOOK"  <?php if ($project->getPicturesDisplayMode() == 'BOOK') { echo 'selected'; } ?>>Livre</option>
					</select>
					<label>Mode d'affichage des images</label>
				</div>
			</div>

			<?php if ($project->getIdParent() == 0) { ?>
				<p>
					<label for="color">Couleur du projet</label>
					<input type="color" name="color" id="color" value="#<?php echo $project->getColor();?>"/>
				</p>
			<?php } else { ?>
				<input type="hidden" name="color" value="#<?php echo $project->getColor();?>"/>
			<?php } ?>

			<button class="btn waves-effect waves-light green" type="submit" name="save">
				<?php echo $action;?> le projet
			</button>

			<?php if($project->getId() != -1) { ?>
				<button class="btn waves-effect waves-light red" type="submit" name="delete">
					Supprimer le projet
				</button>
			<?php } ?>

		</form>


		<?php if($project->getId() != -1) { ?>
		
			<hr style="margin-top:20px;margin-bottom:20px;"/>
			<?php
			$children = $project->getChildren();
			if (sizeof($children) > 0) {
				?>
				<div class="row">
					<?php
					foreach ($children as $child) {
						?>
						<div class="col s4">
							<a class="btn-large waves-effect waves-light" href="/admin/projects/<?php echo $child->getId();?>" style="width:100%;margin-bottom:20px;"><?php echo $child->getName();?></a>
						</div>
						<?php
					}
					?>
				</div>
				<?php
			}
			?>

			<p><a href="/admin/projects/new/<?php echo $project->getId();?>" class="btn waves-effect waves-light green">Nouveau projet</a></p>


			<hr style="margin-top:20px;margin-bottom:20px;"/>
			<?php
			$pictures = $project->getPictures();
			if (sizeof($pictures) > 0) {
				?>
				<div class="row">
					<?php
					foreach ($pictures as $key => $picture) {
						?>
						<div
							class="col l3 m6 s12"
							<?php if ($key % 4 == 0) { ?>
								style="clear:left;"
							<?php } ?>
							
						>

							<div class="card hoverable">
								<?php
								if ($picture->getType() != "youtube") {
								?>
									<div class="card-image">
										<div style="overflow:hidden;max-height:400px;">
											<img src="<?php echo $picture->getUrlResource("small");?>">
										</div>
										<span class="card-title"><?php echo $picture->getName();?></span>
									</div>
								<?php
								}
								?>


								<div class="card-content">
									<?php
									if ($picture->getType() == 'youtube') {
										echo '<span class="card-title">'.$picture->getName().'</span>';
									}
									?>
									<?php echo $picture->getDescription();?>
								</div>
								<div class="card-action">
									<a href="<?php echo $picture->getAdminUrl();?>" class="btn-flat waves-effect waves-orange">Modifier</a>
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


			<p>
				<a href="/admin/pictures/new/<?php echo $project->getId();?>" class="btn waves-effect waves-light green">Nouvelle image</a>
				
				<a href="/admin/movies/new/<?php echo $project->getId();?>" class="btn waves-effect waves-light green">Nouvelle vidéo</a>
			</p>
		
		<?php } ?>

		<script src="/static/jquery-3.2.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
		<script  src="/static/ckeditor/ckeditor.js"></script>

		<script>
			$(document).ready(function() {
				CKEDITOR.replace('description');

				$('select').material_select();
				$('.button-collapse').sideNav();
			});
		</script>

	</div>
</main>

</body>
</html>

	<?php
}
