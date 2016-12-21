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

        <div id="pictures">

            <?php
            foreach ($this->project->getPictures() as $index=>$picture) {

                if ($picture->getType() == 'youtube') {
                    continue;
                }
                ?>

                <div>
                    <img
                        src="<?php echo $picture->getUrlResource('medium');?>"
                        class="project-picture"
                        id="picture-<?php echo $index;?>"
                        title="<?php echo $picture->getName();?>"
                        alt="<?php echo $picture->getName();?>"
                    />
                </div>

                <?php
            }
            ?>

        </div>

        <?php
    }

        protected function usePicturesRefresh ()
        {
            return false;
        }

}
