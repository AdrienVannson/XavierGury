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

        <link rel="stylesheet" type="text/css" href="/static/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="/static/slick/slick-theme.css"/>

        <link rel="stylesheet" href="/static/jquery-ui.css">

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

        <script src="/static/jquery-3.2.1.min.js"></script>
        <script src="/static/slick/slick.min.js"></script>
        <script src="/static/jquery-ui-1.12.1.min.js"></script>

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
