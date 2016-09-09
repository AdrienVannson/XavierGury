<?php
// Controller
include_once(__DIR__.'/../../model/SettingsFactory.class.php');


$SETTINGS =  SettingsFactory::getSettings();

if (isset($__POST['save'])) {
    $SETTINGS->setDescription($__POST['description']);
    $SETTINGS->save();
}

include(__DIR__.'/../view/settings.php');
