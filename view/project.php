
<script>
var nbPictures = <?php echo sizeof($pictures)?>;

var infosPictures = [
<?php
foreach ($pictures as $key=>$picture) {
	$datas = json_encode([
		'name' => $picture->getName(),
		'description' => $picture->getDescription(),
		'urlLarge' => $picture->getUrlResource('l')
	]);
	echo "$datas,";
}
?>
];

var toRefresh = [];
toRefresh.length = nbPictures;
toRefresh.fill(0, 0, nbPictures);
</script>

<div id="contents">

	<h1><?php echo $project->getName();?></h1>


	<?php

	$children = $project->getChildren();

	if (sizeof($children)) {

		foreach ($children as $child) {
			?>

				<div class="under-project">
					<h2><a href="<?php echo $child->getUrl();?>"><?php echo $child->getName();?></a></h2>
					<div><?php echo $child->getDescription();?></div>
				</div>

			<?php
		}

	}

	?>

	<div <?php if ($project->getPicturesDisplayMode() == 'CAROUSEL') { ?>id="carousel"<?php }
	else { ?>id="pictures"<?php } ?> >
		
		<?php
		$isLeft = true;

		foreach ($pictures as $index=>$picture) {
			
			if ($picture->getType() == 'youtube') {
				echo $picture->getHtml();
			}
			else {
			?>
				<div>
					<img 
						<?php if ($project->getPicturesDisplayMode() == 'CAROUSEL') { ?>data-lazy<?php }
						else { ?>src<?php } ?>="<?php echo $picture->getUrlResource('medium');?>"
						class="
							project-picture

							<?php
							if ($picture->getHeight() / $picture->getWidth() >= 2) {
								echo 'small';

								if ($isLeft) {
									echo ' small-left';
								}
								$isLeft = !$isLeft;
							}
							else {
								$isLeft = true;
							}
							?>
						"
						id="picture-<?php echo $index;?>"
						title="<?php echo $picture->getName();?>"
						alt="<?php echo $picture->getName();?>"
						<?php if ($project->getPicturesDisplayMode() == 'CAROUSEL') { ?>ondblclick<?php }
						else { ?>onclick<?php } ?>="showPicture(this)"
						
						<?php if ($project->getPicturesDisplayMode() == 'GRID') { ?>
							onload="toRefresh[this.id.split('-')[1]]=-1"
						<?php } ?>
					/>
				</div>
			<?php
			}
		}
		?>
	
	</div>
	
	<?php
	// Noscript, because of the lazy-loading
	if ($project->getPicturesDisplayMode() == 'CAROUSEL') {
	?>
	<noscript>
		<?php
		$pictures = $project->getPictures();
		
		foreach ($pictures as $picture) {
			?>
				<img
					src="<?php echo $picture->getUrlResource('m');?>"
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
	
	$description = $project->getDescription();
	if ($description != '') {
		echo "<div class=\"description\">$description</div>";
	}
	?>
	
</div>


<div id="picture-preview">
	<svg id="close" viewBox="0 0 24 24" fill="#FFF" onclick="closePreview();">
		<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
		<path d="M0 0h24v24H0z" fill="none"/>
	</svg>

	<div id="frame"></div>
</div>


<script>
var usePicturesRefresh = <?php echo intval($project->getPicturesDisplayMode() == 'GRID'); ?>;
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