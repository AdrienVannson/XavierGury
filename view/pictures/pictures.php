<?php
/* View */
include_once(__DIR__.'/../head.php');
?>

<!DOCTYPE HTML>
<html lang="fr">
	<?php show_head(
		'Explorer',
		array('/styles/pictures-styles.css'),
		array('http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js', '/scripts/pictures-scripts.js')
	); ?>
	
	<body>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
		<table id="pictures"></table>
	</body>
</html>