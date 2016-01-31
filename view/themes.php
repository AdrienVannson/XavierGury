<?php
/* View */
include_once("model/Theme.class.php");
include_once("head.php");

function show_themes($themes) {
	?>
	
<!DOCTYPE HTML>
<html lang="fr">
	<?php show_head("Thèmes", array("themes-styles.css"), array("themes-scripts.js")); ?>
	<body>
		
		<div id="themes">
			
			<div class="line">
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
			</div>
			<div class="line">
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
			</div>
			<div class="line">
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
			</div>
			<div class="line">
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
			</div>
			<div class="line">
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
			</div>
			<div class="line">
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
			</div>
			<div class="line">
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column"></div>
			</div>
			
		</div>
		
	</body>
</html>
	
	<?php
}
