<?php
/* View */
include_once(__DIR__."/../../view/head.php");
include_once(__DIR__."/menus.php");

function show_admin_projects($projects) {
	?>

<!DOCTYPE HTML>
<html lang="fr">
	<?php show_head("Projets - Administration",
			array(
				"/admin/styles.css",
				"https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"),
			
			array(
				"http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js",
				"https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js")
	);?>
	<body>
		<?php show_admin_menus(array(
			array("Projets", "/admin/projects/")
		));?>
		
		<main>
			<div class="container">
				
				<h1>Projets</h1>
				
				<p>Consulter les projets du site</p>
				
				<div class="row">
					<?php 
					foreach ($projects as $project) {
						?>
						<div class="col s12 m6 l4">
							<a class="btn-large waves-effect waves-light" href="/admin/projects/<?php echo $project->get_id();?>" style="width:100%;margin-bottom:20px;background-color:#<?php echo $project->get_color();?>;"><?php echo $project->get_name();?></a>
						</div>
						<?php
					}
					?>
				</div>
				
				<p><a href="/admin/projects/new/0" class="btn waves-effect waves-light green right">Nouveau projet</a></p>
		
			</div>
		</main>
		
		<script type="text/javascript">
		$(".button-collapse").sideNav();
		</script>
	</body>
	
</html>

	<?php
}