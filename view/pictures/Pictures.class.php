<?php

include_once(__DIR__.'/../../model/PictureFactory.class.php');
include_once(__DIR__.'/../HTMLView.class.php');


class PicturesView extends HTMLView
{

    // Head
        protected function getTitle ()
        {
            return 'Images';
        }

        protected function sendStyles ()
        {
            echo '<link rel="stylesheet" type="text/css" href="/styles/pictures-styles.css"/>';
        }
    
    // Body
    protected function sendBody ()
    {
        ?>

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
                        'urlLink' => $picture->getUrl()
                    ]);

                    echo "$datas,";
                }
                ?>
            ];
            </script>

            <script src="/static/jquery-3.2.1.min.js"></script>
            <script src="/scripts/pictures-scripts.js"></script>

        </body>

        <?php
    }

}
