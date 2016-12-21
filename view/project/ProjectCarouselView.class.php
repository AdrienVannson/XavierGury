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

    protected function sendScripts ()
    {
        ProjectView::sendScripts();
        ?>

            <script>
            $(document).ready(function(){
                document.getElementById('pictures').className = 'carousel';

                $('#pictures').slick({
                    centerMode:        true,
                    focusOnSelect:     true,
                    infinite:          false,
                    lazyLoad:          'ondemand',
                    slidesToScroll:    1,
                    speed:             500,
                    swipeToSlide:      false,
                    variableWidth:     true,
                    waitForAnimate:    false
                }).slick('slickGoTo', 0, false);
            });
            </script>
        
        <?php
    }

}
