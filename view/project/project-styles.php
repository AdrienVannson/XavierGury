<?php
/* View */
include_once(__DIR__.'/../../model/Project.class.php');

header('Content-Type: text/css');

$nbFirstLevelProjects = getNbFirstLevelProjects() - 1;

$widthColorItem = 240 / $nbFirstLevelProjects;
$heightColorItem = 480 / $nbFirstLevelProjects;
?>

body {
	margin: 0;
	padding-bottom: <?php echo 20 + $heightColorItem;?>px;
	padding-right: 20px;

	background-color: #2B2E34;
}

a {
	color: #FFF;
	text-decoration: none;
}

a:hover {
	text-decoration: underline;
}

p {
	text-indent: 2em;
	text-align: justify;
}


/*
 * Contents
 */

#contents {
	margin-left: 270px;
	color: #EEE;
}


/*
 * Left menu
 */

#menu {
	position: fixed;
	z-index: 100;
	top: 0;
	left: 0;
	bottom: 0;
	width: 240px;
	overflow: hidden;

	color: #FFF;

	transition: left .5s;
}

#menu ul {
	/* Scrolling the menu */
	max-height: calc(100% - <?php echo 20 + 2*$heightColorItem;?>px);
	overflow: auto;
}

#menu-btn {
	position: fixed;
    z-index: 100;
	top: 0;
	display: none;

	cursor: pointer;
	color: #FFF;
}

#menu li a {
	display: block;
	padding: 20px;

	text-decoration: none;
	color: #FFF;

	transition: background-color .3s;
}

#menu li a:hover {
	text-decoration: none;
	background-color: #000;
}

#menu ul {
	padding-left: 0;
	list-style-type: none;
}

#menu .active {
	background-color: #000;
}


/* Colored menu */

#colored-menu {
	position: absolute;
	z-index: 10;
	bottom: 0;
}

.colored-item {
	display: block;
	margin-top: <?php echo $heightColorItem;?>px;
	float: left;
	width: <?php echo $widthColorItem;?>px;
	height: <?php echo $heightColorItem;?>px;

	transition: height .5s, margin-top .5s;
}

.colored-item:hover {
	height: <?php echo 1.5 * $heightColorItem;?>px;
	margin-top: <?php echo $widthColorItem;?>px;
}

.colored-item:focus {
	height: <?php echo 2 * $heightColorItem;?>px;
	margin-top: 0;
}

#colored-item-activated {
	margin-top: 0;
}

#colored-item-activated:hover {
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


/* Lines */

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

@media (max-width: 992px) { /* Smalls and mediums screens */

	body {
		padding: 10px;
		padding-top: 25px;
	}

    #contents {
        margin-left: 0;
    }

	#menu-btn {
		display: block;
	}

	.line {
		display: none;
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
	#unfloded #menu {
		left: 0;
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
 * Pictures and movies
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
 * Preview
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
	top: 60px;
	bottom: 60px;
	left: 60px;
	right: 60px;

	background-color: #000;
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
	
	background-color: #FFF;
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
	
	background-color: #414349;
	border-radius: 16px;
	
	transition: box-shadow .3s;
}

.under-project:hover {
	box-shadow: 4px 4px 8px #000;
}

.under-project h2 a {
	color: #FFF;
}


/*
 * Carousel
 */

#carousel {
	margin: 25px;
}

#carousel .slick-slide {
	outline-style: none;
}
