<?php
/* View */
include_once(__DIR__.'/menus.php');
?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
<meta charset="utf-8"/>

<title>Aide - Administration - Xavier Gury</title>

<link rel="icon" type="image/png" href="/favicon.png"/>
<link rel="stylesheet" type="text/css" href="/admin/styles.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<?php show_admin_menus();?>

<main class="container">

	<h1>Aide</h1>

	<div class="row">

		<div class="col s12">
			<div class="card green hoverable">
				<div class="card-content white-text">
					<span class="card-title">Ajouter une vidéo</span>

					<ul>
						<li>Connectez-vous sur le compte Google du site</li>
						<li>Rendez-vous à cette adresse : <a href="https://www.youtube.com/upload">https://www.youtube.com/upload</a></li>
						<li>Publiez la vidéo sur Youtube</li>
						<li>Créer une nouvelle vidéo depuis l’espace administration du site</li>
						<li>Dans le champ “Code”, copiez-collez le code de la vidéo</li>
					</ul>

					<p>Le code de la vidéo est visible dans l'adresse de celle-ci, après watch?v=<br/>
					Par exemple, pour cette vidéo :<br/>
					https://www.youtube.com/watch?v=BPNTC7uZYrI<br/>
					Le code est : BPNTC7uZYrI</p>

				</div>
			</div>
		</div>
	</div>

</main>


<script src="/static/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

<script>
$('.button-collapse').sideNav();
</script>

</body>
</html>
