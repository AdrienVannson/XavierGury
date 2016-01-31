<?php
/* View */

function show_head($title, $styles=array()) {
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
		?>
	</head>
	
	<?php
}
