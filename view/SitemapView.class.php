<?php
/*
 * HomepageView
 */

/*include_once(__DIR__.'/../model/SettingsFactory.class.php');
include_once(__DIR__.'/../model/ProjectFactory.class.php');*/
include_once('View.class.php');


class HomepageView extends View
{

    public function sendContents ()
    {
        header('Content-Type: text/xml');

        // TODO: générer et envoyer le fichier sitemap.xml
    }

}
