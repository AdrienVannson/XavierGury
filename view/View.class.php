<?php
/*
 * View
 */

class View
{

    /*
     * Displaying functions
     */
    
    public function sendHTML ()
    {
        echo '<!DOCTYPE HTML><html lang="fr">';
        
        $this->sendHead();
        $this->sendBody();

        echo '</html>';
    }

        // Head
        protected function sendHead ()
        {
            ?>

            <head>
                <meta charset="utf-8">

                <title>
                    <?php
                    echo $this->getTitle();

                    if ($this->getTitle() != '') {
                        echo ' - ';
                    }
                    ?>
                    Xavier Gury
                </title>

                <?php
                $this->sendStyles();
                ?>

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