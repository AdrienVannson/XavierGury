<?php
/* View */

function show_head($title, $styles=array(), $scripts=array()) {
	?>
	
	<head>
		<meta charset="utf-8">
		
		<title><?php echo $title;?> - Xavier Gury</title>
		
		<?php
		foreach($styles as $style) {
			?>
			<link rel="stylesheet" type="text/css" href="<?php echo $style;?>"/>
			<?php
		}
		foreach($scripts as $script) {
			?>
			<script type="text/javascript" src="<?php echo $script;?>"> </script>
			<?php
		}
		?>
	</head>
	
	<?php
}
