<?php
/* View */
include_once("model/Theme.class.php");
include_once("head.php");

function show_themes($themes) {
	?>
	
<!DOCTYPE HTML>
<html lang="fr">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
	<?php show_head("Thèmes", array("themes-styles.css"), array("themes-scripts.js")); ?>
	<body>
		
		<div id="themes"></div>
		
	</body>
</html>
	
	<?php
}
