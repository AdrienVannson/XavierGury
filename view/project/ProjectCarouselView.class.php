<?php
/*
 * ProjectCarouselView (singleton)
 */

include_once('ProjectView.class.php');

class ProjectCarouselView extends ProjectView
{

    /*
     * Config
     */

    protected function usePicturesRefresh ()
    {
        return false;
    }

    protected function sendScripts ()
    {
        ProjectView::sendScripts();

        ?>

            <script>
            $(document).ready(function(){
                $('#carousel').slick({
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
