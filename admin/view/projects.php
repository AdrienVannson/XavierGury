<?php
/* View */
include_once(__DIR__.'/menus.php');

function show_admin_projects($projects) {
	?>

<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>

		<title>Projets - Administration - Xavier Gury</title>

		<link rel="icon" type="image/png" href="/favicon.png"/>
		<link rel="stylesheet" type="text/css" href="/admin/styles.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"/>

		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

	<body>
		<?php show_admin_menus(array(
			array('Projets', '/admin/projects/')
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
							<a class="btn-large waves-effect waves-light" href="/admin/projects/<?php echo $project->getId();?>" style="width:100%;margin-bottom:20px;background-color:#<?php echo $project->getColor();?>;"><?php echo $project->getName();?></a>
						</div>
						<?php
					}
					?>
				</div>
				
				<p><a href="/admin/projects/new/0" class="btn waves-effect waves-light green right">Nouveau projet</a></p>
		
			</div>
		</main>


		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

		<script type="text/javascript">
		$('.button-collapse').sideNav();
		</script>
	</body>
	
</html>

	<?php
}