<?php
/* View */
include_once(__DIR__.'/../head.php');
?>

<!DOCTYPE HTML>
<html lang="fr">
	<?php show_head(
		'Images',
		array('/styles/pictures-styles.css')
	); ?>
	
	<body>
		<table id="pictures"></table>

		<script>
		var pictures = [
			<?php
			$pictures = PictureFactory::getRandomPictures(150);

			foreach ($pictures as $picture) {
				$datas = json_encode([
					'name' => $picture->getName(),
					'urlPicture' => $picture->getUrlResource('s'),
					'urlLink' => $picture->getProject()->getUrl()
				]);

				echo "$datas,";
			}
			?>
		];
		</script>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
		<script type="text/javascript" src="/scripts/pictures-scripts.js"></script>
	</body>
</html>