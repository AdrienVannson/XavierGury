<?php
/* View */
?>

<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">

		<title>Images - Xavier Gury</title>

		<link rel="stylesheet" type="text/css" href="/styles/pictures-styles.css"/>

		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

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