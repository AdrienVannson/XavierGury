<?php
/* View */

function show_left_menu_styles() {
	?>
	body {
		background-color: #2B2E34;
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
		margin-top: 50px;
		float: left;
		width: 50px;
		height: 50px;
	}
	
	#color_item_activate {
		margin-top: 0;
	}
	<?php
}
