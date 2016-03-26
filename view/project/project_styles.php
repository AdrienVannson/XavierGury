<?php
/* View */
include_once(__DIR__."/../../model/themes.php");

function show_project_styles() {
	$nbThemes = get_nb_themes();
	?>
/* <style> /* */

body {
	margin: 0;
	padding-bottom: <?php echo 20 + 480/$nbThemes;?>px;
	padding-right: 20px;
	
	background-color: #2B2E34;
}


#menu {
	position: fixed;
    z-index: 100;
	overflow: hidden;
	top: 0;
	left: 0;
	bottom: 0;
	color: #FFF;
	width: 240px;
	
	transition: left .5s;
}

#menu-btn {
	position: fixed;
    z-index: 100;
	cursor: pointer;
	top: 0;
	left: -128px;
	
	color: #FFF;
}

#contents {
	margin-left: 270px;
	color: #EEE;
}

li a {
	color: #FFF;
	text-decoration: none;
	
	display: block;
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
	position: fixed;
	z-index: 10;
	bottom: 0;
}

.color_item {
	display: block;
	margin-top: <?php echo 480/$nbThemes;?>px;
	float: left;
	width: <?php echo 240/$nbThemes;?>px;
	height: <?php echo 480/$nbThemes;?>px;
	
	transition: height .5s, margin-top .5s;
}
.color_item:hover {
	height: <?php echo 720/$nbThemes;?>px;
	margin-top: <?php echo 240/$nbThemes;?>px;
}
.color_item:focus {
	height: <?php echo 960/$nbThemes;?>px;
	margin-top: 0;
}

#color_item_activate {
	margin-top: 0;
}
#color_item_activate:hover {
	height: <?php echo 960/$nbThemes;?>px;
}

#white-item {
	position: fixed;
    z-index: 5;
	left: 480px;
	bottom: 0;
	
	display: block;
	width: <?php echo 240/$nbThemes;?>px;
	height: <?php echo 480/$nbThemes;?>px;
	background-color: #FFF;
}

/* Traits */
.line {
	position: fixed;
	background-color: #FFF;
	z-index: 70;
}

#line-menu {
	z-index: 100;
	top: 20px;
	left: 240px;
	bottom: 0;
	
	width: 1px;
}
#line-bottom {
	left: 0;
	bottom: <?php echo 480/$nbThemes;?>px;
	
	width: <?php echo 500 + 240/$nbThemes;?>px;
	height: 1px;
}
#line-white-item-1 {
	left: 480px;
	bottom: 0;
	
	width: 1px;
	height: <?php echo 10 + 480/$nbThemes;?>px;
}
#line-white-item-2 {
	left: <?php echo 480 + 240/$nbThemes;?>px;
	bottom: 0;
	
	width: 1px;
	height: <?php echo 15 + 480/$nbThemes;?>px;
}

#separator-bottom {
	z-index: 1;
	position: fixed;
	left: 0;
	right: 0;
	bottom: 0;
	height: <?php echo 480/$nbThemes;?>px;
	
	background-color: #2B2E34;
}

@media (max-width: 992px) { /* Petits et moyens écrans */
	
	body {
		padding-top: 25px;
        
        padding-left: 10px;
        padding-right: 10px;
        
        padding-bottom: 10px;
	}
    
    #contents {
        margin-left: 0;
    }
	
	#menu-btn {
		left: 0;
	}
	
	.line {
		display:none;
	}
	
	#menu {
		left: -250px;
		width: 240px;
		padding-top: 30px;
		
		border-right: 1px solid #FFF;
        background-color: #2B2E34;
	}
	
	#white-item {
		display: none;
	}
	
	/* Menu déplié */
	#deplie #menu {
		left: 0;
	}
	
	.color_item {
		margin-top: <?php echo 480/$nbThemes;?>px;
		width: <?php echo 240/$nbThemes;?>px;
		height: <?php echo 480/$nbThemes;?>px;
	}
	.color_item:hover {
		height: <?php echo 720/$nbThemes;?>px;
		margin-top: <?php echo 240/$nbThemes;?>px;
	}
	.color_item:focus {
		height: <?php echo 960/$nbThemes;?>px;
		margin-top: 0;
	}
	
	#color_item_activate:hover {
		height: <?php echo 960/$nbThemes;?>px;
	}
    
    #separator-bottom {
        display: none;
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
