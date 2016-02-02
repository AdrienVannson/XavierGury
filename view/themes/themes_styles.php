<?php
/* View */

function show_themes_styles() {
	?>
/* <style>*/

body {
	background-color: #2B2E34;
}

.line {
	height: 100px;
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
	width: calc(10% - 1px);
	background-color: #2B2E34;
}

	<?php
}
