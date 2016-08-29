<?php
/* Controller */
include_once(__DIR__.'/../../model/PictureFactory.class.php');
include_once(__DIR__.'/../view/picture.php');


$picture = PictureFactory::getPicture($_GET['id_picture']);

if ($_GET['id_picture'] == -1 && isset($_GET['id_parent'])) {
	$picture->setIdProject( $_GET['id_parent'] );
}

if (isset($_GET['type']) && $_GET['type'] == 'youtube') {
	$picture->setType('youtube');
	$picture->setInfos('\n3\n4');
}

/* Traitement du formulaire */
if (isset($_POST['save'])) {
	$picture->setIdProject($_POST['id_project']);
	$picture->setName($_POST['name'] );
	$picture->setDescription($_POST['description']);
	$picture->setCreationDate( $_POST['creation-date']=='' ? '' : $_POST['creation-date'] );
	$picture->setType($_POST['type']);
	
	if ($picture->getType() == 'youtube') {
		$picture->setInfos( $_POST['url'] . '\n' . $_POST['height'] . '\n' . $_POST['width'] );
		$picture->save();
	}
    else {
		// Save the picture's file
		$picture->save();

		$error = $_FILES['image']['error'];
		
		if ($error == UPLOAD_ERR_INI_SIZE || $error == UPLOAD_ERR_FORM_SIZE) {
			$_SESSION['errors'][] = 'Le fichier envoyé est trop lourd';
		}
		
		if ($error == UPLOAD_ERR_PARTIAL) {
			$_SESSION['errors'][] = 'Le fichier n\'a pas été envoyé entièrement';
		}
		
		if ($error ==  UPLOAD_ERR_CANT_WRITE) {
			$_SESSION['errors'][] = 'Une erreur s\'est produite lors de l\'enregistrement du fichier sur le disque';
		}
		
		if (isset($_FILES['image']) && $_FILES['image']['error']==UPLOAD_ERR_OK) {

			$dirName = dirname(dirname(__DIR__)).'/resources/pictures/'.$picture->getId();

			// Création du dossier si il n'existe pas
			if (!file_exists($dirName)) {
				mkdir($dirName, 0777);
			}
			
			if ($_FILES['image']['type'] != 'image/gif' &&
			    $_FILES['image']['type'] != 'image/png' &&
			    $_FILES['image']['type'] != 'image/jpeg') {
				
				$_SESSION['errors'][] = 'Le format de fichier n\'est pas pris en charge';
				goto end;
			}
			
			move_uploaded_file($_FILES['image']['tmp_name'], $dirName.'/r.'.$picture->getType());
			$picture->generateFiles();
		}
	}

	$picture->save();

	end:
	header('Location: '.$picture->getAdminUrl());
	exit();
}
if (isset($_POST['delete'])) {
	$picture->delete();
	
	header('Location: '.$picture->getProject()->getUrlAdmin());
}

show_admin_picture($picture);
