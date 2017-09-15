<?php
/*
 * HomepageView
 */

include_once(__DIR__.'/../model/ProjectFactory.class.php');
include_once('View.class.php');


class HomepageView extends View
{

    public function sendContents ()
    {
        header('Content-Type: text/xml');
        echo '<?xml version="1.0" encoding="utf-8"?>';

        $domain = 'https://www.xaviergury.fr';
        ?>

        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

            <url>
                <loc><?= $domain ?>/</loc>
                <changefreq>monthly</changefreq>
                <priority>1.0</priority>
            </url>

            <?php
            $projects = ProjectFactory::getAllProjects();

            foreach ($projects as $project) {
                if ($project->getUrl() != '/') {
                    echo "<url><loc>".$domain.$project->getUrl()."</loc></url>\n";
                }
            }
            ?>

        </urlset>

        <?php
    }

}
