<?php
/* View */
include_once(__DIR__."/../model/Project.class.php");
include_once(__DIR__."/../model/Picture.class.php");
include_once(__DIR__."/head.php");
include_once(__DIR__."/left_menu.php");


function show_project($project) {
	?>
	
<!DOCTYPE HTML>
<html lang="fr">
<?php show_head($project->get_name(), array("/styles/project.css")); ?>
<body>

<?php show_left_menu($project->get_id()); ?>


<div id="contents">

	<h1><?php echo $project->get_name();?></h1>


	<?php

	$children = $project->get_children();

	if (sizeof($children)) {

		foreach ($children as $child) {
			?>

				<div class="under-project">
					<h2><a href="<?php echo $child->get_url();?>"><?php echo $child->get_name();?></a></h2>
					<p><?php echo $child->get_description();?></p>
				</div>

			<?php
		}

	}

	?>

	<p id="pictures">
		<?php
		$pictures = $project->get_pictures();
		
		foreach($pictures as $index=>$picture) {
			
			if ($picture->get_type() == 'youtube') {
				echo $picture->get_url();
			}
			else {
			?>
				<img 
					 src="<?php echo $picture->get_url_resource("medium");?>"
					 class="project-picture"
					 id="picture-<?php echo $index;?>"
					 title="<?php echo $picture->get_name();?>"
					 alt="<?php echo $picture->get_description();?>"
					 onclick="showPicture(this)"
					 onload="toRefresh[this.id.split('-')[1]]=-1"
				/>
			<?php
			}
		}
		?>
	</p>

	<div class="description"><?php echo $project->get_description();?></div>

</div>


<div id="picture-preview">

	<svg id="close" viewBox="0 0 24 24" fill="#FFF" onclick="closePreview();">
		<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
		<path d="M0 0h24v24H0z" fill="none"/>
	</svg>

	<div id="frame">

		<div id="picture-container">
			<div><img id="picture"/></div>
		</div>

		<div id="informations">
			<h1 id="title"></h1>
			<p id="description"></p>
		</div>

	</div>
</div>


<script>
var nbPictures = <?php echo sizeof($pictures)?>;
</script>

<script type="text/javascript" src="/scripts/project.js"> </script>

</body>
</html>

<?php
}
