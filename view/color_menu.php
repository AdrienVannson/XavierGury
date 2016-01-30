<?php
/* View */
include_once("../model/Theme.class.php");
include_once("../model/themes.php");

function show_color_menu($id_activate=-1) {
	
	$themes = get_themes();
	?>
	
	<style>

#color_menu {
	position: absolute;
	bottom: 0;
}

.color_item {
	margin-top: 50px;
	float: left;
	width: 50px;
	height: 50px;
}

#color_item_activate {
	margin-top: 0;
}
	</style>
	
	
	<div id="color_menu">
		
		<?php 
		foreach($themes as $theme) {
			?>
			<div 
				<?php if($theme->get_id()==$id_activate){?>id="color_item_activate"<?php }?>
				class="color_item"
				style="background-color: #<?php echo $theme->get_color();?>;"
			></div>
			<?php
		}
		?>
		
	</div>
	
	<?php
}