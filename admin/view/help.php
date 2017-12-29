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
		
		<main>
			
			<div class="container">
				<h1>Aide</h1>
				
				<p>
					<div class="col s12">
						<a class="btn-large waves-effect waves-light" href="https://docs.google.com/document/d/1hg9tuYOozgpznKPkMDH__L1XOE5c9VzeFjym_ypg2Hk/">
							Ajouter une vidéo
						</a>
					</div>
				</p>
			</div>
			
		</main>


		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

		<script>
		$('.button-collapse').sideNav();
		</script>
		
	</body>
</html>
