<?php
/* View */

function show_admin_styles() {
	?>

body {
	padding-bottom: 20px;
}

.right-btn {
	margin-bottom: 20px;
}

header, main, footer, nav {
	padding-left: 240px;
}
@media only screen and (max-width : 992px) {
	header, main, footer, nav {
		padding-left: 0;
	}
}

.breadcrumb::before {
	content: '→' !important;
	font-family: ;
}

/*body {
	background-color: #2B2E34;
	color: #FFF;
}

a {
	color: #FFF;
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}

/* Formulaires *//*
label {
	display: inline-block;
	width: 300px;
}


/* Résultats *//*
#message {
	display: inline-block;
	margin-left: 30px;
	font-style: italic;
}*/

	<?php
}
