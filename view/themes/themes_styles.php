<?php
/* View */

function show_themes_styles() {
	?>
/* <style>*/

/* TODO : Traits de 2px */

body {
	background-color: #2B2E34;
}

.line {
	height: 70px;
	background-color: white;
}
.line:last-child .column {
	margin-bottom: 1px;
	height: calc(100% - 2px);
}
.column:first-child {
	margin-left: 1px;
}

.column {
	float: left;
	margin-top: 1px;
	margin-right: 1px;
	height: calc(100% - 1px);
	background-color: #2B2E34;
}

.theme {
	text-align: center;
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
