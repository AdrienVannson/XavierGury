<?php
/* View */
include_once(__DIR__."/../../view/head.php");
include_once(__DIR__."/menus.php");

function show_admin_themes($themes) {
	?>

<!DOCTYPE HTML>
<html lang="fr">
	<?php show_head("Thèmes - Administration",
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
				
				<h1>Thèmes</h1>
				
				<p>Consulter les thèmes du site.</p>
				
				<div class="row">
					<?php 
					foreach ($themes as $theme) {
						?>
						<div class="col s2">
							<a class="btn-large waves-effect waves-light" href="/admin/themes/<?php echo $theme->get_id();?>" style="width:100%;margin-bottom:20px;background-color:#<?php echo $theme->get_color();?>;"><?php echo $theme->get_name();?></a>
						</div>
						<?php
					}
					?>
				</div>
				
				<p><a href="/admin/themes/-1" class="btn waves-effect waves-light green right">Nouveau thème</a></p>
		
			</div>
		</main>
		
		<script type="text/javascript">
		$(".button-collapse").sideNav();
		</script>
	</body>
	
</html>

	<?php
}