<?php
/* View */
header('Content-Type: text/css');
?>

/* <style>*/

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

.line {
	height: 128px;
}

.cel {
	border: 1px solid #FFF;
}

.picture {
	overflow: hidden;
}

.picture img {
	display: block;
	margin: auto;
	min-height: 128px;
	min-width: 128px;

	cursor: pointer;
}
