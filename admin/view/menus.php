<?php
/* View */

function show_admin_menus($categories=array()) {
	?>

<!-- Menu haut  -->
<nav>
	<div class="nav-wrapper">
		<a href="/admin/" class="brand-logo center">Administration</a>
		
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a href="/">Site</a></li>
		</ul>
		
		<nav>
			<div class="nav-wrapper">
				<div class="col s12">
					<a href="#!" class="breadcrumb">First</a>
					<a href="#!" class="breadcrumb">Second</a>
					<a href="#!" class="breadcrumb">Third</a>
				</div>
			</div>
		</nav>
		
	</div>
</nav>


<!-- Menu de gauche -->
<ul id="slide-out" class="side-nav fixed">
	<li><a href="/admin/themes/">Thèmes</a></li>
</ul>
<a href="#" data-activates="slide-out" class="button-collapse">
	<i class="mdi-navigation-menu" style="font-size:40px;color:#FFF;position:absolute;top:0;"></i>
</a>

	<?php
}