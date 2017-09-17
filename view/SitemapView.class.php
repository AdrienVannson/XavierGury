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

        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">

            <url>
                <loc><?= $domain ?>/</loc>
                <changefreq>monthly</changefreq>
                <priority>1.0</priority>
            </url>

            <?php
            $projects = ProjectFactory::getAllProjects();

            foreach ($projects as $project) {

                if ($project->getUrl() != '/') {
                    echo "<url>";
                    echo "<loc>".$domain.$project->getUrl()."</loc>\n";

                    $pictures = $project->getPictures();

                    foreach ($pictures as $picture) {
                        echo "<image:image>";
                        echo "<image:loc>" . $domain.$picture->getUrlResource('m') . "</image:loc>";

                        if ($picture->getName() != '') {
                            echo "<image:title>" . $picture->getName() . "</image:title>";
                        }

                        echo "</image:image>\n";
                    }
                    echo "</url>\n";
                }

            }
            ?>

        </urlset>

        <?php
    }

}
