<?php
/* View */
include_once(__DIR__."/../../view/head.php");
include_once(__DIR__."/menus.php");

function show_admin_homepage() {
	?>

<!DOCTYPE HTML>
<html lang="fr">
	<?php show_head("Administration",
			array(
				"/admin/styles.css",
				"https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"),
			
			array(
				"http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js",
				"https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js")
	);?>
	
	<body>
		<?php show_admin_menus();?>
		
		
		<main>
					
			<div class="container">
				<h1>Administration</h1>
				
				<p>Bienvenu dans l'interface d'administration du site.<br/>
				Ici, vous pouvez ajouter des catégories, des projets ou des ressources au site.<br/>
				Si vous n'êtes pas l'administrateur du site, veuiller fermer cette page IMMEDIATEMENT.</p>
				
				<div class="row">
					<div class="col s12 m6">
						<div class="card green">
							<div class="card-content white-text">
								<span class="card-title">Changements récents</span>
								<ul>
									<li>Correction de problèmes d'affichage du menu de gauche</li>
									<li>Correction des bugs lors de l'enregistrement de nouvelles images</li>
									<li>Enregistrement des images en plusieurs formats</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				
				<ul>
					<li><a href="/admin/themes" class="btn waves-effect waves-light right">Afficher les thèmes</a></li>
				</ul>
			</div>
			
		</main>
		
		
		<script>
		$(".button-collapse").sideNav();
		</script>
		
	</body>
</html>

	<?php
}
