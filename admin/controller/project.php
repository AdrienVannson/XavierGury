<?php
/* Controller */
include_once(__DIR__.'/../../model/ProjectFactory.class.php');
include_once(__DIR__.'/../view/project.php');


$project = ProjectFactory::getProject($_GET['id_project']);

if ($_GET['id_project'] == -1) {
	$project->setIdParent($_GET['id_parent']);
}


/* Traitement du formulaire */
if (isset($_POST['save'])) {
	$project->setIdParent($_POST['id_parent']);
	$project->setName($_POST['name']);
	$project->setDescription($_POST['description']);
	$project->setColor($_POST['color']);
	
	$project->save();
	
	header('Location: /admin/projects/'.$project->getId());
}

if (isset($_POST['delete'])) {
	$project->delete();	
	header('Location: /admin/projects/');
}

show_admin_project($project);
