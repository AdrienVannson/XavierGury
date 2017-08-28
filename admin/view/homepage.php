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

		<link rel="icon" type="image/png" href="/favicon.png"/>
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
						<p>Bienvenue dans l'interface d'administration du site.<br/>
						Ici, vous pouvez ajouter des projets et des ressources sur le site.</p>
					</div>
				</div>


				<div class="row">

					<div class="col s12 m6">
						<div class="card green hoverable">
							<div class="card-content white-text">
								<span class="card-title">Changements récents</span>
								<ul>
									<li>03 août 2017 : Correction de bugs</li>
									<li>12 juillet 2017 : Affichage d'un slider sur la page du journal pour faire défiler les images</li>
									<li>10 juillet 2017 : Amélioration de l'affichage des sous-projets</li>
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
						<div class="card green hoverable">
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
