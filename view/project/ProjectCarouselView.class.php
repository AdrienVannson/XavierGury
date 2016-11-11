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

}
