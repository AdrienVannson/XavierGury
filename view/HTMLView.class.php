<?php
/*
 * HTMLView
 */

include_once('View.class.php');


class HTMLView extends View
{

    /*
     * Displaying functions
     */
    
    public function sendContents ()
    {
        echo '<!DOCTYPE HTML><html lang="fr">';
        
        $this->sendHead();
        $this->sendBody();

        echo '</html>';
    }

        // Head
        protected function sendHead ()
        {
            $title = $this->getTitle();

            if ($title != '') {
                $title .= ' - ';
            }

            $title .= 'Xavier Gury';
            ?>

            <head>
                <meta charset="utf-8">
                <title><?= $title ?></title>

                <?php
                $this->sendStyles();
                ?>

                <link rel="icon" type="image/png" href="/favicon.png"/>
                <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

                <?php
                if ($this->getHeadDescription() != '') {
                    echo '<meta name="description" content="' . $this->getHeadDescription() . '">';
                }
                ?>
            </head>

            <?php
        }

            protected function getTitle ()
            {
                return '';
            }

            protected function getHeadDescription ()
            {
                return '';
            }

            protected function sendStyles ()
            {
            }
        

        // Body
        protected function sendBody ()
        {
        }


}