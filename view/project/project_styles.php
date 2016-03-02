<?php
/* View */
include_once(__DIR__."/../../model/themes.php");

function show_project_styles() {
	$nbThemes = get_nb_themes();
	?>
/* <style> /* */

body {
	margin: 0;
	padding-bottom: <?php echo 40/$nbThemes;?>vw;
	padding-right: 2vw;
	
	background-color: #2B2E34;
}


#menu {
	position: fixed;
	overflow: hidden;
	top: 0;
	left: 0;
	bottom: 0;
	color: #FFF;
	background-color: #2B2E34;
	width: 15vw;
	
	transition: left .5s;
}

#menu-btn {
	position: fixed;
	top: 0;
	left: -128px;
	
	color: #FFF;
}

#contents {
	margin-left: 20%;
	color: #EEE;
}

li a {
	background-color: #2B2E34;
	color: #FFF;
	text-decoration: none;
	
	display:block;
	padding: 20px;
	
	transition: background-color .3s;
}
li a:hover {
	background-color: #000;
}
ul {
	list-style-type: none;
	padding-left: 0;
}

.active {
	background-color: #000;
}

/* Menu coloré */
#color_menu {
	position: absolute;
	z-index: 10;
	bottom: 0;
}

.color_item {
	display: block;
	margin-top: <?php echo 30/$nbThemes;?>vw;
	float: left;
	width: <?php echo 15/$nbThemes;?>vw;
	height: <?php echo 30/$nbThemes;?>vw;
	
	transition: height .5s, margin-top .5s;
}
.color_item:hover {
	height: <?php echo 45/$nbThemes;?>vw;
	margin-top: <?php echo 15/$nbThemes;?>vw;
}
.color_item:focus {
	height: <?php echo 60/$nbThemes;?>vw;
	margin-top: 0;
}

#color_item_activate {
	margin-top: 0;
}
#color_item_activate:hover {
	height: <?php echo 60/$nbThemes;?>vw;
}

#white-item {
	position: absolute;
	left: <?php echo 31-(15/$nbThemes);?>vw;
	bottom: 0;
	
	display: block;
	width: <?php echo 15/$nbThemes;?>vw;
	height: <?php echo 30/$nbThemes;?>vw;
	background-color: #FFF;
}

/* Traits */
.line {
	position: absolute;
	background-color: #FFF;
	z-index: -1;
}

#line-menu {
	z-index: 100;
	top: 1vw;
	left: 15vw;
	bottom: 0;
	
	width: 1px;
}
#line-bottom {
	left: 0;
	bottom: <?php echo 30/$nbThemes;?>vw;
	
	width: 33vw;
	height: 1px;
}
#line-white-item-1 {
	left: <?php echo 31-(15/$nbThemes);?>vw;
	bottom: 0;
	
	width: 1px;
	height: <?php echo 33/$nbThemes;?>vw;
}
#line-white-item-2 {
	left: <?php echo 31-(15/$nbThemes) + 15/$nbThemes;?>vw;
	bottom: 0;
	
	width: 1px;
	height: <?php echo 36/$nbThemes;?>vw;
}

#separator-bottom {
	z-index: -1;
	position: fixed;
	left: 0;
	right: 0;
	bottom: 0;
	height: <?php echo 30/$nbThemes;?>vw;
	
	background-color: #2B2E34;
}

@media (max-width: 992px) { /* Petits et moyens écrans */
	
	body {
		padding-top: 25px;
	}
	
	#menu-btn {
		left: 0;
	}
	
	.line {
		display:none;
	}
	
	#menu {
		left: -70vw;
		width: 45vw;
		padding-top: 30px;
		
		border-right: 1px solid #FFF;
	}
	
	#contents {
		margin-left: 2vw;	
	}
	
	#white-item {
		display: none;
	}
	
	/* Menu déplié */
	#deplie #menu {
		left: 0;
	}
	
	.color_item {
		margin-top: <?php echo 90/$nbThemes;?>vw;
		width: <?php echo 45/$nbThemes;?>vw;
		height: <?php echo 90/$nbThemes;?>vw;
	}
	.color_item:hover {
		height: <?php echo 135/$nbThemes;?>vw;
		margin-top: <?php echo 45/$nbThemes;?>vw;
	}
	.color_item:focus {
		height: <?php echo 60/$nbThemes;?>vw;
		margin-top: 0;
	}
	
}

@media (max-width: 600px) { /* Petits écrans */
	
	#menu {
		width: 90vw;
		left: -95vw;
	}
	
	.color_item {
		margin-top: <?php echo 180/$nbThemes;?>vw;
		width: <?php echo 90/$nbThemes;?>vw;
		height: <?php echo 180/$nbThemes;?>vw;
	}
	.color_item:hover {
		height: <?php echo 270/$nbThemes;?>vw;
		margin-top: <?php echo 90/$nbThemes;?>vw;
	}
	.color_item:focus {
		height: <?php echo 120/$nbThemes;?>vw;
		margin-top: 0;
	}
	
}


/* Description */
.description {
	clear: left;
	
	text-indent: 3em;
	text-align: justify;
}


/* Image */
.image_project {
	margin: 1vw;
	height: 33vh;
	float: left;
}

	<?php
}
