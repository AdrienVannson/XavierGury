<?php
/* Controller */
include_once(__DIR__."/../../model/Picture.class.php");
include_once(__DIR__."/../view/picture.php");


$picture = new Picture($_GET["id_picture"]);

if ($_GET["id_picture"] == -1) {
	$picture->set_id_project( $_GET["id_parent"] );
}


/* Traitement du formulaire */
if (isset($_POST["save"])) {
	$picture->set_id_project( $_POST["id_project"] );
	$picture->set_name( $_POST["name"] );
	$picture->set_description( $_POST["description"] );
	
	if ($picture->get_type() == 'youtube') {
		$picture->set_url( $_POST["url"] . "_" . $_POST["width"] );
	}
    
    $picture->save();
	
	
	/* Envoi de l'image */
	$error = $_FILES["image"]["error"];
	if($error == UPLOAD_ERR_INI_SIZE || $error == UPLOAD_ERR_FORM_SIZE) {
		$_SESSION["errors"][] = "Le fichier envoyé est trop lourd.";
	}
	if($error == UPLOAD_ERR_PARTIAL) {
		$_SESSION["errors"][] = "Le fichier n'a pas été envoyé entièrement.";
	}
	if($error ==  UPLOAD_ERR_CANT_WRITE) {
		$_SESSION["errors"][] = "Une erreur s'est produite lors de l'enregistrement du fichier sur le disque.";
	}
	if(isset($_FILES["image"]) && $_FILES["image"]["error"]==UPLOAD_ERR_OK) {
		
		$dirName = dirname(dirname(__DIR__))."/resources/pictures/".$picture->get_id();
		
		// Création du dossier si il n'existe pas
		if(!file_exists($dirName)) {
			mkdir($dirName, 0777);
		}
		
		// Vidage du dossier
		$dir = opendir($dirName);
		while($file = readdir($dir)) {
			if($file != "." && $file != "..") {
				$toDel = $dirName."/".$file;
				unlink($toDel);
			}
		}
		closedir($dir);
		
		$tmpName = $_FILES["image"]["tmp_name"];
		
		if($_FILES["image"]["type"] == "image/jpeg") {
			$img = imagecreatefromjpeg($tmpName);
			$picture->set_type("JPG");
			
			$infos = getimagesize($_FILES["image"]["tmp_name"]);
			$width = $infos[0];
			$height = $infos[1];

			$small = imagescale($img, floor(128*$width/$height));
			$medium = imagescale($img, floor(512*$width/$height));

			imagejpeg($small, $dirName."/small.jpg", 75);
			imagejpeg($medium, $dirName."/medium.jpg", 80);
			imagejpeg($img, $dirName."/large.jpg", 100);
		}
		elseif($_FILES["image"]["type"] == "image/gif") {
			$img = imagecreatefromgif($tmpName);
			$picture->set_type("GIF");
			
			$infos = getimagesize($_FILES["image"]["tmp_name"]);
			$width = $infos[0];
			$height = $infos[1];

			$small = imagescale($img, floor(128*$width/$height));
			$medium = imagescale($img, floor(512*$width/$height));

			imagegif($small, $dirName."/small.gif");
			imagegif($medium, $dirName."/medium.gif");
			imagegif($img, $dirName."/large.gif");
		}
		elseif($_FILES["image"]["type"] == "image/png") {
			$img = imagecreatefrompng($tmpName);
			$picture->set_type("PNG");
			
			$infos = getimagesize($_FILES["image"]["tmp_name"]);
			$width = $infos[0];
			$height = $infos[1];

			$small = imagescale($img, floor(128*$width/$height));
			$medium = imagescale($img, floor(512*$width/$height));
			
			imagealphablending($img, false);
			imagesavealpha($img, true);
			imagealphablending($small, false);
			imagesavealpha($small, true);
			imagealphablending($medium, false);
			imagesavealpha($medium, true);
			
			imagepng($small, $dirName."/small.png", 7);
			imagepng($medium, $dirName."/medium.png", 8);
			
			imagepng($img, $dirName."/large.png", 9);
		}
		elseif($_FILES["image"]["type"] == "image/svg+xml") {
			// TODO
		}
		else {
			$_SESSION["errors"][] = "Le format de fichier n'est pas pris en charge";
			goto end;
		}
		
		$picture->save();
	}
	
	end:
	header("Location: ".$picture->get_admin_url());
	exit();
}
if(isset($_POST["delete"])) {
	$picture->delete();
	
	header("Location: ".$picture->get_project()->get_url_admin());
}

show_admin_picture($picture);
$_SESSION["last_picture_id"] = $picture->get_id();
