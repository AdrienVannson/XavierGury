<?php
/* View */
include_once(__DIR__.'/menus.php');

function show_admin_homepage() {
	?>

<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>

		<title>Administration - Xavier Gury</title>

		<link rel="stylesheet" type="text/css" href="/admin/styles.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"/>

		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<?php show_admin_menus();?>
		
		
		<main>
			
			<div class="container">
				<h1>Administration</h1>

				<div class="card">
					<div class="card-content">
						<p>Bienvenu dans l'interface d'administration du site.<br/>
						Ici, vous pouvez ajouter des projets ou des ressources au site.<br/>
						Si vous n'êtes pas l'administrateur du site, veuiller fermer cette page IMMEDIATEMENT.</p>
					</div>
				</div>
				
				<div class="row">

					<div class="col s12 m6">
						<div class="card green hoverable">
							<div class="card-content white-text">
								<span class="card-title">Changements principaux récents</span>
								<ul>
									<li style="font-weight: bold";>10 septembre 2016: Possibilité de modifier des paramètres, tels le texte de la page d'accueil ; et
									d'afficher les images des projets via un caroussel (sélectionner "Caroussel" au lieu de "Grille" dans la page de modification d'un projet).</li> 
									<li>24 août 2016: Modification des polices de caractères et amélioration de l'aperçu des images</li>
									<li>08 août 2016: Ajout du journal</li>
									<li>19 juillet 2016: Possibilité d'envoyer des vidéos</li>
									<li>10 juillet 2016: Possibilité de définir des sous-projets</li>
									<li>10 juin 2016: Modification de la structure de la base de données</li>
								</ul>
							</div>
						</div>
					</div>


					<div class="col s12 m6">
						<div class="card green hoverable">
							<div class="card-content white-text">
								<span class="card-title">Contact</span>
								<p>Voici mon adresse mail : <a class="red-text" href="mailto:adrien.vannson@gmail.com">adrien.vannson@gmail.com</a></p>
							</div>
						</div>
					</div>

					<div class="col s12 m6">
						<div class="card orange hoverable">
							<div class="card-content white-text">
								<span class="card-title">Paramètres</span>
								<p>Il est désormait possible de modifier des paramètres du site, comme par exemple le texte de la page d'accueil.</p>

								<div class="card-action">
									<a href="/admin/settings" class="white-text">Accéder aux paramètres</a>
								</div>
							</div>
						</div>
					</div>

				</div>
				
				<ul>
					<li><a href="/admin/projects/" class="btn waves-effect waves-light right">Afficher les projets</a></li>
				</ul>
			</div>
			
		</main>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

		<script>
		$('.button-collapse').sideNav();
		</script>
		
	</body>
</html>

	<?php
}
