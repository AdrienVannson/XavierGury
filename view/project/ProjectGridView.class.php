<?php
/*
 * ProjectGridView (singleton)
 */

include_once('ProjectView.class.php');

class ProjectGridView extends ProjectView
{

    protected function sendScripts ()
    {
        ?>
            <script>
            var pictures = document.getElementsByClassName('project-picture');

            for (var iPicture=0; iPicture<pictures.length; iPicture++) {
                pictures[iPicture].addEventListener('click', function(event) {
                    showPicture(parseInt(event.currentTarget.id.split('-')[1]));
                });
            }
            </script>
        
        <?php
        ProjectView::sendScripts();
    }

}
