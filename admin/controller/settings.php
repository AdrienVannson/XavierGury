<?php
// Controller
include_once(__DIR__.'/../../model/SettingsFactory.class.php');


$SETTINGS =  SettingsFactory::getSettings();

if (isset($_POST['save'])) {
    $SETTINGS->setDescription($_POST['description']);
    $SETTINGS->save();
}

include(__DIR__.'/../view/settings.php');
