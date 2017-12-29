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
                            src="<?php echo $picture->getUrlResource('medium');?>"
                            id="picture-<?php echo $index;?>"
                            class="project-picture"
                            title="<?php echo $picture->getName();?>"
                            alt="<?php echo $picture->getName();?>"
                            ondblclick="showPicture(<?php echo $index;?>);"
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
        $height = 480;
        $width = 960;

        $pictures = $this->project->getPictures();

        if (sizeof($pictures)) {
            $height = $pictures[0]->getHeight();
            $width = $pictures[0]->getWidth();

            // Resize if the picture is too large
            $ratio = 1;

            $ratio = max($ratio, $height / 360); // Divide by the max height
            $ratio = max($ratio, $width / 480);

            $height /= $ratio;
            $width /= $ratio;
        }

        $width *= 2; // 2 pictures shown in the same time
        ?>

        <script src="/static/jquery-3.2.1.min.js"></script>
        <script src="/static/turnjs/turn.min.js"></script>

        <script>
            var isBook = true;

            $("#pictures").turn({
                width: <?php echo $width; ?>,
                height: <?php echo $height; ?>
            });
        </script>

        <?php
        ProjectView::sendScripts();
    }

}
