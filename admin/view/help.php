<?php
/* View */

include_once(__DIR__.'/../../view/head.php');
include_once(__DIR__.'/menus.php');
?>

<!DOCTYPE HTML>
<html lang="fr">
	<?php show_head('Aide - Administration',
			array(
				'/admin/styles.css',
				'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css'),
			
			array(
				'http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js',
				'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js')
	);?>
	
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
		
		
		<script>
		$('.button-collapse').sideNav();
		</script>
		
	</body>
</html>
