<?php
/*
 * ProjectBookView (singleton)
 */

include_once('ProjectView.class.php');

class ProjectBookView extends ProjectView
{

    protected function sendPictures ()
    {
        ?>

        <!-- http://www.turnjs.com -->
        <div id="pictures" class="book">

            <?php
            foreach ($this->project->getPictures() as $index=>$picture) {

                if ($picture->getType() == 'youtube') {
                    continue;
                }
                ?>

                <div>
                    <div class="picture-container-book">
                        <img
                            src="<?php echo $picture->getUrlResource('large');?>"
                            id="picture-<?php echo $index;?>"
                            title="<?php echo $picture->getName();?>"
                            alt="<?php echo $picture->getName();?>"
                        />
                    </div>
                </div>

                <?php
            }
            ?>

        </div>


        <?php
    }

    protected function sendScripts ()
    {
        ?>

        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="/static/turnjs/turn.min.js"></script>

        <script type="text/javascript">
            $("#pictures").turn({
                width: 960,
                height: 480
            });
        </script>

        <?php
        ProjectView::sendScripts();
    }

    protected function usePicturesRefresh ()
    {
        return false;
    }

}
