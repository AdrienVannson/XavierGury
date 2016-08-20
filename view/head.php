<?php
/* View */

function show_head($title, $styles=array(), $scripts=array(), $code="") {
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
	
	echo $code;
	?>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

	<?php
}
