<?php
/* Controller */
include_once(__DIR__."/../../model/Picture.class.php");
include_once(__DIR__."/../view/picture.php");

function save_image($src, $destination, $size) {

	$infos = getimagesize($src);
	$width = $infos[0];
	$height = $infos[1];

	if($infos["mime"] == "image/jpeg") {
		$img = imagecreatefromjpeg($src);
	}
	elseif($infos["mime"] == "image/gif") {
		$img = imagecreatefromgif($src);
	}
	elseif($infos["mime"] == "image/png") {
		$img = imagecreatefrompng($src);
	}
	else {
		return false;
	}

	$quality = 100;
	switch ($size) {
		case "small":
			$img = imagescale($img, floor(128*$width/$height));
			$quality = 75;
			break;

		case "medium":
			$img = imagescale($img, floor(512*$width/$height));
			$quality = 80;
			break;

		case "large":
			break;
	}

	return imagejpeg($img, $destination.$size.".jpg", $quality);
}

session_start();


$picture = new Picture($_GET["id_picture"]);

if($_GET["id_picture"] == -1 && isset($_SESSION["last_project_id"])) {
	$picture->set_id_project( $_SESSION["last_project_id"] );
}


/* Traitement du formulaire */
if(isset($_POST["save"])) {
	$picture->set_id_project( $_POST["id_project"] );
	$picture->set_name( $_POST["name"] );
	$picture->set_description( $_POST["description"] );
	
	$picture->save();
	
	/* Envoi de l'image */
	if(isset( $_FILES["image"] )) {
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
		
		save_image($_FILES["image"]["tmp_name"], $dirName."/", "small");
		save_image($_FILES["image"]["tmp_name"], $dirName."/", "medium");
		save_image($_FILES["image"]["tmp_name"], $dirName."/", "large");
		
	}
	
	//header("Location: /admin/images/".$picture->get_id());
}
if(isset($_POST["delete"])) {
	$picture->delete();
	
	header("Location: /admin/projets/".$picture->get_id_project());
}

show_admin_picture($picture);
$_SESSION["last_picture_id"] = $picture->get_id();
