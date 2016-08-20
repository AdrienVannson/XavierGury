<?php
/* View */
include_once(__DIR__.'/../model/Project.class.php');
include_once(__DIR__.'/../model/Picture.class.php');
include_once(__DIR__.'/head.php');
include_once(__DIR__.'/left_menu.php');

?>

<!DOCTYPE HTML>
<html lang="fr">
<?php

$styles = ['/styles/project.css'];

if ($project->getPicturesDisplayMode() == 'CAROUSEL') {
	$styles[] = 'http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css';
	$styles[] = 'http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css';
}

show_head($project->getName(), $styles);

?>
<body>

<?php show_left_menu($project); ?>


<div id="contents">

	<h1><?php echo $project->getName();?></h1>


	<?php

	$children = $project->getChildren();

	if (sizeof($children)) {

		foreach ($children as $child) {
			?>

				<div class="under-project">
					<h2><a href="<?php echo $child->getUrl();?>"><?php echo $child->getName();?></a></h2>
					<p><?php echo $child->getDescription();?></p>
				</div>

			<?php
		}

	}

	?>

	<?php if ($project->getPicturesDisplayMode() == 'CAROUSEL') { ?> <div id="carousel"> <?php }
	else { ?> <p id="pictures"> <?php } ?>
		
		<?php
		$pictures = $project->getPictures();
		
		foreach($pictures as $index=>$picture) {
			
			if ($picture->getType() == 'youtube') {
				echo $picture->getHtml();
			}
			else {
			?>
				<div>
					<img 
						<?php if ($project->getPicturesDisplayMode() == 'CAROUSEL') { ?>data-lazy<?php }
						else { ?>src<?php } ?>="<?php echo $picture->getUrlResource('medium');?>"
						class="project-picture"
						id="picture-<?php echo $index;?>"
						title="<?php echo $picture->getName();?>"
						alt="<?php echo $picture->getDescription();?>"
						<?php if ($project->getPicturesDisplayMode() != 'CAROUSEL') { ?>
							onclick="showPicture(this)"
						<?php } ?>
						onload="toRefresh[this.id.split('-')[1]]=-1"
					/>
				</div>
			<?php
			}
		}
		?>
	
	<?php if ($project->getPicturesDisplayMode() == 'CAROUSEL') { ?> </div> <?php }
	else { ?> </p> <?php } ?>
	
	<?php
	// Noscript, because of the lazy-loading
	if ($project->getPicturesDisplayMode() == 'CAROUSEL') {
	?>
	<noscript>
		<?php
		$pictures = $project->getPictures();
		
		foreach($pictures as $index=>$picture) {
			?>
				<img
					src="<?php echo $picture->getUrlResource('medium');?>"
					class="project-picture"
					title="<?php echo $picture->getName();?>"
					alt="<?php echo $picture->getName();?>"
				/>
			<?php
		}
		?>
	</noscript>
	<?php
	}
	?>

	<div class="description"><?php echo $project->getDescription();?></div>

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

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script type="text/javascript" src="/scripts/project.js"></script>

<?php if ($project->getPicturesDisplayMode() == 'CAROUSEL') { ?>
	<script>
	$(document).ready(function(){
		$('#carousel').slick({
			centerMode:        true,
			focusOnSelect:     true,
			infinite:          false,
			lazyLoad:          'ondemand',
			slidesToScroll:    1,
			speed:             500,
			swipeToSlide:      false,
			variableWidth:     true,
			waitForAnimate:    false
		}).slick('slickGoTo', 0, false);
	});
	</script>
<?php } ?>

</body>
</html>