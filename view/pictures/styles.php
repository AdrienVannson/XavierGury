<?php
/* View */
header('Content-Type: text/css');
?>

/* <style> /**/

html {
	height: 100%;
}

body {
	margin: 8px;

	background-color: #2B2E34;
}

#pictures {
	width: 100%;

	table-layout: fixed;
	border-collapse: collapse;
}

tr {
	height: 128px;
}

td {
	border: 1px solid #FFF;
	padding: 0;
}

.picture a {
	display: block;
	height: 128px;
	overflow: hidden;

	opacity: 0;
	transition: opacity .3s;
}

.picture a:hover {
	opacity: 1;
}

.picture a img {
	display: block;

	min-width: 100%;
}
