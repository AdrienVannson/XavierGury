<?php
/*
 * ProjectCarouselView (singleton)
 */

include_once('ProjectView.class.php');

class ProjectCarouselView extends ProjectView
{

    protected function sendStyles ()
    {
        ProjectView::sendStyles();
        ?>

        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

        <link rel="stylesheet" href="/static/jquery-ui.css">

        <?php
    }

    protected function sendPictures ()
    {
        $pictures = $this->project->getPictures();
        ?>

        <span id="date" style="font-style: italic;">Chargement...</span>

        <?php ProjectView::sendPictures(); ?>

        <noscript> <!--  Noscript, because of the lazy-loading -->
            <?php
            foreach ($pictures as $picture) {
                ?>
                    <img
                        src="<?php echo $picture->getUrlResource('m');?>"
                        class="project-picture"
                        title="<?php echo $picture->getName();?>"
                        alt="<?php echo $picture->getName();?>"
                    />
                <?php
            }
            ?>
        </noscript>

        <div id="slider"></div>

        <div id="years" style="text-align: center; margin-top: 10px;">
            <?php
            $lastYear = '';

            foreach ($pictures as $indice => $picture) {
                $year = explode('-', $picture->getCreationDate())[0];

                if ($year != $lastYear) {

                    if ($lastYear != '') {
                        echo ' - ';
                    }
                    echo "<a href=\"#\" onclick=\"changeActivePicture($indice);\">$year</a>";

                    $lastYear = $year;
                }
            }
            ?>
        </div>

        <?php
    }

        protected function useLazyLoading ()
        {
            return true;
        }

    protected function sendScripts ()
    {
        ?>

        <script src="/static/jquery-3.2.1.min.js"></script>
        <script src="/static/jquery-ui-1.12.1.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <script>
        $( function() {
            $( "#slider" ).slider({
                min: 0,
                max: <?php echo count($this->project->getPictures())-1; ?>
            });

            $('#slider').on('slide', function(event, ui) {
                changeActivePicture(ui.value);
            } );

        } );

        var isCarousel = true;
        </script>

        <?php
        ProjectView::sendScripts();
    }

}
