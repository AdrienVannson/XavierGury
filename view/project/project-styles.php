<?php
/* View */
include_once(__DIR__."/../../model/Project.class.php");

function show_project_styles() {
	$nbFirstLevelProjects = get_nb_first_level_projects();
	
	$widthColorItem = 240 / $nbFirstLevelProjects;
	$heightColorItem = 480 / $nbFirstLevelProjects;
	?>
/* <style> /* */

body {
	margin: 0;
	padding-bottom: <?php echo 20 + $heightColorItem;?>px;
	padding-right: 20px;
	
	background-color: #2B2E34;
}

a {
	color: #000;
	text-decoration: none;
}

a:hover {
	text-decoration: underline;
}

p {
	text-indent: 3em;
	text-align: justify;
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

#menu ul {
	max-height: calc(100% - <?php echo 20 + 2*$heightColorItem;?>px);
	overflow: auto;
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
	text-decoration: none;
}
ul {
	list-style-type: none;
	padding-left: 0;
}

.active {
	background-color: #000;
}


/*
 * Menu coloré
 */
#color_menu {
	position: absolute;
	z-index: 10;
	bottom: 0;
}

.color_item {
	display: block;
	margin-top: <?php echo $heightColorItem;?>px;
	float: left;
	width: <?php echo $widthColorItem;?>px;
	height: <?php echo $heightColorItem;?>px;
	
	transition: height .5s, margin-top .5s;
}
.color_item:hover {
	height: <?php echo 1.5 * $heightColorItem;?>px;
	margin-top: <?php echo $widthColorItem;?>px;
}
.color_item:focus {
	height: <?php echo 2 * $heightColorItem;?>px;
	margin-top: 0;
}

#color_item_activate {
	margin-top: 0;
}
#color_item_activate:hover {
	height: <?php echo 2 * $heightColorItem;?>px;
}

#white-item {
	position: fixed;
    z-index: 5;
	left: 480px;
	bottom: 0;
	
	display: block;
	width: <?php echo $widthColorItem;?>px;
	height: <?php echo $heightColorItem?>px;
	background-color: #FFF;
}


/*
 * Traits
 */
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
	bottom: <?php echo $heightColorItem;?>px;
	
	width: <?php echo 500 + $widthColorItem;?>px;
	height: 1px;
}
#line-white-item-1 {
	left: 480px;
	bottom: 0;
	
	width: 1px;
	height: <?php echo 10 + $heightColorItem;?>px;
}
#line-white-item-2 {
	left: <?php echo 480 + $widthColorItem;?>px;
	bottom: 0;
	
	width: 1px;
	height: <?php echo 15 + $heightColorItem;?>px;
}

#separator-bottom {
	z-index: 1;
	position: fixed;
	left: 0;
	right: 0;
	bottom: 0;
	height: <?php echo $heightColorItem;?>px;
	
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
		margin-top: <?php echo $heightColorItem;?>px;
		width: <?php echo $widthColorItem;?>px;
		height: <?php echo $heightColorItem;?>px;
	}
	.color_item:hover {
		height: <?php echo 1.5 * $heightColorItem;?>px;
		margin-top: <?php echo $widthColorItem;?>px;
	}
	.color_item:focus {
		height: <?php echo 2 * $heightColorItem;?>px;
		margin-top: 0;
	}
	
	#color_item_activate:hover {
		height: <?php echo 2 * $heightColorItem;?>px;
	}
    
    #separator-bottom {
        display: none;
    }
	
}


/* 
 * Description
 */
.description {
	clear: left;
}


/*
 *Image
 */
.project-picture, #pictures iframe {
	margin: 1vw;
	height: 33vh;
	float: left;
}
.project-picture:hover {
	cursor: pointer;
}

/*
 * Aperçu
 */
#picture-preview {
	display: none;
	position: fixed;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	z-index: 100;
	
	background-color: rgba(0, 0, 0, .5);
	opacity: 0;
	
	transition: opacity .5s;
}

#frame {
	position: fixed;
	top: 120px;
	bottom: 120px;
	left: 120px;
	right: 120px;
	
	background-color: #E9E9EA;
}

#close {
	position: absolute;
	height: 48px;
	width: 48px;
	right: 0;
	
	color: #FFF;
	cursor: pointer;
}

#picture-container {
	height: 100%;
	width: 100%;
	padding-right: 362px;
}

#picture-container div {
	padding-right: 360px;
	height: 100%;
}

#picture {
	height: 100%;
	display: block;
	margin: auto;
}

#informations {
	position: absolute;
	
	padding-left: 4px;
	width: 360px;
	right: 0;
	top: 0;
	height: 100%;
	
	border-left: 2px solid #000;
}

#title {
	margin: 0;
}


/*
 * Liens vers les sous-projets
 */

.under-project {
	width: 46%;
	float: left;
	margin: 1%;
	padding: 1%;
	
	background-color: rgba(255, 255, 255, .1);
	border-radius: 16px;
	
	transition: box-shadow .3s;
}

.under-project:hover {
	box-shadow: 4px 4px 8px #000;
}

.under-project h2 a {
	color: #FFF;
}


	<?php
}
