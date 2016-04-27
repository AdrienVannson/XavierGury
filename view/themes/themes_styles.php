<?php
/* View */

function show_themes_styles() {
	?>
/* <style>*/

html {
	height: 100%;
}

body {
	background-color: #2B2E34;
	margin: 8px;
}

#themes {
	width: 100%;
	
	table-layout: fixed;
	border-collapse: collapse;
}

.line {
	height: 70px;
}

.cel {
	border: 1px solid #FFF;
}

.theme {
	text-align: center;
	cursor: pointer;
}

.theme a {
	color: #000;
	text-decoration: none;
	
	display: block;
}

/* Div utilisé pour centrer le nom du thème */
.theme div {
	height: 100%;
}

.theme a, .theme div {
	display: inline-block;
	vertical-align: middle;
} 

	<?php
}
