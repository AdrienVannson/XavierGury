<?php
/*
 * ProjectCarouselView (singleton)
 */

include_once('ProjectView.class.php');

class ProjectCarouselView extends ProjectView
{

    protected function usePicturesRefresh ()
    {
        return false;
    }

    protected function sendStyles ()
    {
        ProjectView::sendStyles();
        ?>

        <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
        <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <?php
    }

    protected function sendPictures ()
    {
        ProjectView::sendPictures();

        // Noscript, because of the lazy-loading
        ?>

        <noscript>
            <?php
            $pictures = $this->project->getPictures();

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

        <?php
    }

        protected function useLazyLoading ()
        {
            return true;
        }

    protected function sendScripts ()
    {
        ?>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
        </script>

        <script>
        var isCarousel = true;
        </script>

        <?php
        ProjectView::sendScripts();
    }

}
