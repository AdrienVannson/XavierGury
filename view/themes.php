<?php
/* View */
include_once(__DIR__."/../model/Theme.class.php");
include_once(__DIR__."/head.php");

function show_themes() {
	?>
	
<!DOCTYPE HTML>
<html lang="fr">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
	<?php show_head("Thèmes", array("/styles/themes-styles.css"), array("/scripts/themes-scripts.js")); ?>
	<body>
		
		<div id="themes"></div>
		
	</body>
</html>
	
	<?php
}
