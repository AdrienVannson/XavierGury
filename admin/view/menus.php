<?php
/* View */

function show_admin_menus($path=array()) {
	?>

<!-- Menu haut  -->
<nav>
	<div class="nav-wrapper">
		<a href="/admin/" class="brand-logo center">Administration</a>
		
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a href="/">Site</a></li>
		</ul>
		
	</div>
</nav>


<!-- Menu de gauche -->
<ul id="slide-out" class="side-nav fixed">
	<li><a href="/admin/projects/">Projets</a></li>
	<li><a href="/admin/help/">Aide</a></li>
</ul>
<a href="#" data-activates="slide-out" class="button-collapse">
	<i class="mdi-navigation-menu" style="font-size:40px;color:#FFF;position:absolute;top:0;"></i>
</a>

<?php
if(sizeof($path) > 0) {
?>
	<nav style="background-color: rgba(238, 110, 115, 0.85);">
		<div class="container nav-wrapper">
			<div class="col s12">
				<?php
				foreach($path as $name) {
					?>
					<a href="<?php echo $name[1];?>" class="breadcrumb"><?php echo $name[0];?></a>
					<?php
				}
				?>
			</div>
		</div>
	</nav>
<?php 
}
?>

	<?php
}