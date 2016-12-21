<?php
/* 
 * ProjectView
 */

include_once(__DIR__.'/../../model/Project.class.php');
include_once(__DIR__.'/../../model/Picture.class.php');
include_once(__DIR__.'/../head.php');
include_once(__DIR__.'/../left-menu.php');


class ProjectView
{

	protected function __construct (Project $project)
	{
		$this->project = $project;
	}

	private function __clone () {}


	public static function getInstance (Project $project)
	{
		$id = $project->getId();

        if (!isset(self::$instances[$id])) {
			self::$instances[$id] = new static($project);
		}

		return self::$instances[$id];
	}


    /*
     * Displaying functions
     */
    
    public function sendHTML ()
    {
        echo '<!DOCTYPE HTML><html lang="fr">';
        
        $this->sendHead();
        $this->sendBody();

        echo '</html>';
    }

        // Head
        protected function sendHead ()
        {
            ?>

            <head>
                <meta charset="utf-8">

                <title><?php echo $this->project->getName();?> - Xavier Gury</title>

                <?php
                $this->sendStyles();
                ?>

                <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

                <?php
                if ($this->project->getDescription() != '') {
                    echo '<meta name="description" content="' . strip_tags($this->project->getDescription()) . '">';
                }
                ?>
            </head>

            <?php
        }

            protected function sendStyles ()
            {
                echo '<link rel="stylesheet" type="text/css" href="/styles/project.css"/>';
            }


        // Body
        protected function sendBody ()
        {
            echo '<body>';

            $this->sendLeftMenu();
            $this->sendContents();
            $this->sendPicturePreview();
            $this->sendScripts();

            echo '</body>';
        }

            protected function sendLeftMenu ()
            {
                show_left_menu($this->project);
            }

            protected function sendContents ()
            {
                ?>

                <div id="contents">

                    <h1><?php echo $this->project->getName();?></h1>

                    <?php $this->sendChidren(); ?>
                    <?php $this->sendPictures(); ?>
                    <?php $this->sendDescription(); ?>

                </div>

                <?php
            }

                protected function sendChidren ()
                {
                    $children = $this->project->getChildren();

                    if (sizeof($children)) {
                        foreach ($children as $child) {
                            ?>

                                <div class="under-project">
                                    <h2><a href="<?php echo $child->getUrl();?>"><?php echo $child->getName();?></a></h2>
                                    <div><?php echo $child->getDescription();?></div>
                                </div>

                            <?php
                        }
                    }
                }

                protected function sendPictures ()
                {
                    ?>

                    <div <?php if ($this->project->getPicturesDisplayMode() == 'CAROUSEL') { ?>id="carousel"<?php }
                    else { ?>id="pictures"<?php } ?> >

                        <?php
                        $isLeft = true;

                        foreach ($this->project->getPictures() as $index=>$picture) {

                            if ($picture->getType() == 'youtube') {
                                echo $picture->getHtml();
                            }
                            else {
                            ?>
                                <div>
                                    <img
                                        <?php if ($this->project->getPicturesDisplayMode() == 'CAROUSEL') { ?>data-lazy<?php }
                                        else { ?>src<?php } ?>="<?php echo $picture->getUrlResource('medium');?>"
                                        class="
                                            project-picture

                                            <?php
                                            if ($picture->getHeight() / $picture->getWidth() >= 2) {
                                                echo 'small';

                                                if ($isLeft) {
                                                    echo ' small-left';
                                                }
                                                $isLeft = !$isLeft;
                                            }
                                            else {
                                                $isLeft = true;
                                            }
                                            ?>
                                        "
                                        id="picture-<?php echo $index;?>"
                                        title="<?php echo $picture->getName();?>"
                                        alt="<?php echo $picture->getName();?>"
                                        <?php if ($this->project->getPicturesDisplayMode() == 'CAROUSEL') { ?>ondblclick<?php }
                                        else { ?>onclick<?php } ?>="showPicture(parseInt(this.id.split('-')[1]))"

                                        <?php if ($this->project->getPicturesDisplayMode() == 'GRID') { ?>
                                            onload="toRefresh[this.id.split('-')[1]]=-1"
                                        <?php } ?>
                                    />
                                </div>
                            <?php
                            }
                        }
                        ?>

                    </div>

                    <?php
                    // Noscript, because of the lazy-loading
                    if ($this->project->getPicturesDisplayMode() == 'CAROUSEL') {
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
                }

                protected function sendDescription ()
                {
                    $description = $this->project->getDescription();
                    if ($description != '') {
                        echo "<div class=\"description\">$description</div>";
                    }
                }

            protected function sendPicturePreview ()
            {
                ?>

                <div id="picture-preview">
                    <svg id="close" viewBox="0 0 24 24" fill="#FFF" onclick="closePreview();">
                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                        <path d="M0 0h24v24H0z" fill="none"/>
                    </svg>

                    <div id="frame">
                        <div id="picture-container">

                            <!-- Previous picture -->
                            <svg fill="#FFFFFF" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="arrow" onclick="previousPicture()">
                                <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>

                            <!-- Next picture -->
                            <svg fill="#FFFFFF" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="arrow" id="arrow-right" onclick="nextPicture()">
                                <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>

                        </div>
                        <div id="informations">
                            <h1 id="title"></h1>
                            <p id="description"></p>
                        </div>
                    </div>
                </div>

                <?php
            }

            protected function sendScripts ()
            {
                ?>

                <script>
                var usePicturesRefresh = <?php echo intval($this->usePicturesRefresh()); ?>;

                var nbPictures = <?php echo sizeof($this->project->getPictures())?>;

                var infosPictures = [
                <?php
                foreach ($this->project->getPictures() as $key=>$picture) {
                    $datas = json_encode([
                        'name' => $picture->getName(),
                        'description' => $picture->getDescription(),
                        'urlLarge' => $picture->getUrlResource('l')
                    ]);
                    echo "$datas,";
                }
                ?>
                ];

                var toRefresh = [];
                toRefresh.length = nbPictures;
                toRefresh.fill(0, 0, nbPictures);

                </script>

                <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
                <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
                <script type="text/javascript" src="/scripts/project.js"></script>

                <?php
            }


    /*
     * Config
     */

    protected function usePicturesRefresh ()
    {
        return true;
    }


	protected $project;

	protected static $instances;
}
