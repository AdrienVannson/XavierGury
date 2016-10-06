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

.picture {
	height: 128px;
	overflow: hidden;
}

.picture a {
	display: block;
	/*margin: auto;*/
}

.picture a img {
	display: block;
	margin: auto;
	/*min-height: 128px;
	min-width: 128px;*/

	cursor: pointer;
}
