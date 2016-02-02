<?php
/* View */
include_once("model/themes.php");

function show_project_styles() {
	?>
	body {
		background-color: #2B2E34;
		margin: 0;
	}
	
	
	#menu {
		float: left;
		color: #FFF;
		width: 18%;
	}
	
	#contents {
		margin-left: 20%;
		color: #EEE;
	}
	
	a {
		color: #FFF;
	}
	
	#color_menu {
		position: absolute;
		bottom: 0;
	}
	
	.color_item {
		display: block;
		margin-top: <?php echo 30/get_nb_themes();?>vw;
		float: left;
		width: <?php echo 15/get_nb_themes();?>vw;
		height: <?php echo 30/get_nb_themes();?>vw;
	}
	
	#color_item_activate {
		margin-top: 0;
	}
	
	#white-item {
		position: absolute;
		left: <?php echo 31-(15/get_nb_themes());?>vw;
		bottom: 0;
		
		display: block;
		width: <?php echo 15/get_nb_themes();?>vw;
		height: <?php echo 30/get_nb_themes();?>vw;
		background-color: #FFF;
	}
	
	.line {
		position: absolute;
		background-color: #FFF;
	}
	
	#line-menu {
		top: 1vw;
		left: 15vw;
		bottom: 0;
		
		width: 1px;
	}
	#line-bottom {
		left: 0;
		bottom: <?php echo 30/get_nb_themes();?>vw;
		
		width: 33vw;
		height: 1px;
	}
	#line-white-item-1 {
		left: <?php echo 31-(15/get_nb_themes());?>vw;
		bottom: 0;
		
		width: 1px;
		height: <?php echo 33/get_nb_themes();?>vw;
	}
	#line-white-item-2 {
		left: <?php echo 31-(15/get_nb_themes()) + 15/get_nb_themes();?>vw;
		bottom: 0;
		
		width: 1px;
		height: <?php echo 36/get_nb_themes();?>vw;
	}
	
	<?php
}
