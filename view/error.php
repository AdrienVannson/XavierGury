<?php
/* View */
include_once(__DIR__.'/head.php');
include_once(__DIR__.'/left_menu.php');

function show_error($message) {
	?>
	
<!DOCTYPE HTML>
<html lang="fr">
	<?php show_head($message)?>
	<body>
		<style>
body {
	background-color: #2B2E34;
	color: #FFF;
}
a {
	color: #FFF;
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}

#message {
	font-style: italic;
	text-indent: 30px;
}
		</style>
		
		<h1>Erreur</h1>
		<p id="message"><?php echo $message;?></p>
		
		<p><a href="/">Retour à l'accueil</a></p>
	
	</body>
		
</html>
	
	<?php
}