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

        <?php
    }

        protected function useLazyLoading ()
        {
            return true;
        }

    protected function sendScripts ()
    {
        ProjectView::sendScripts();
        ?>
            <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
            <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
            <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

            <script>
            $(document).ready(function(){
                document.getElementById('pictures').className = 'carousel';

                var carousel = $('#pictures').slick({
                    centerMode:        true,
                    focusOnSelect:     true,
                    infinite:          false,
                    lazyLoad:          'ondemand',
                    slidesToShow:      8, // Used by the lazy-loading
                    slidesToScroll:    1,
                    speed:             500,
                    swipeToSlide:      false,
                    variableWidth:     true,
                    waitForAnimate:    false
                }).slick('slickGoTo', 0, false);

                onActivePictureChange.push(function (id) {
                    carousel.slick('slickGoTo', id, false);
                });
            });


            var pictures = document.getElementsByClassName('project-picture');

            for (var iPicture=0; iPicture<pictures.length; iPicture++) {
                pictures[iPicture].addEventListener('dblclick', function(event) {
                    showPicture(parseInt(event.currentTarget.id.split('-')[1]));
                });
            }

            </script>
        
        <?php
    }

}
