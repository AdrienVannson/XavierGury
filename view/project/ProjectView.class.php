<?php
/* 
 * ProjectView
 */

include_once(__DIR__.'/../../model/Project.class.php');
include_once(__DIR__.'/../../model/Picture.class.php');
include_once(__DIR__.'/../HTMLView.class.php');


class ProjectView extends HTMLView
{

	public function __construct (Project $project)
	{
		$this->project = $project;
	}


    /*
     * Displaying functions
     */

    // Head
    protected function getTitle ()
    {
        return $this->project->getName();;
    }

    protected function getHeadDescription ()
    {
        return strip_tags($this->project->getDescription());
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
        $this->sendProjectContents();
        $this->sendPicturePreview();
        $this->sendScripts();

        echo '</body>';
    }

        protected function sendLeftMenu ()
        {
            $first_level_projects = getFirstLevelProjects();
            ?>

            <div id="menu">
                <ul>
                    <?php
                    if ($this->project->getIdParent() == -1) {
                        $projects = $this->project->getBrothers();
                        ?>

                        <li style="border-bottom: 1px solid #FFF;">
                            <a href="/">ACCUEIL</a>
                        </li>

                        <?php
                    }
                    else {
                        if ($this->project->getIdParent() == 0) {
                            $projects = $this->project->getChildren();
                            $parent = $this->project;
                        }
                        else {
                            $projects = $this->project->getBrothers();
                            $parent = $this->project->getParent();
                        }
                        ?>

                        <li style="border-bottom: 1px solid #FFF;">

                            <a
                                href="<?php echo $parent->getUrl();?>"
                                <?php if($parent->getId() == $this->project->getId()){?>class="active"<?php }?>
                            >
                                <?php echo mb_strtoupper($parent->getName(), 'UTF-8'); ?>
                            </a>
                        </li>

                        <?php
                    }

                    foreach($projects as $currentProject) {
                        ?>

                        <li>
                            <a
                                href="<?php echo $currentProject->getUrl();?>"
                                <?php if($currentProject->getId()==$this->project->getId()){?>class="active"<?php }?>
                            >
                                <?php echo mb_strtoupper($currentProject->getName(), 'UTF-8');?>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>

                <div id="colored-menu">

                    <?php
                    foreach(getFirstLevelProjects() as $currentProject) {
                        if ($currentProject->getId() == 10) {
                            continue;
                        }
                        ?>
                        <a
                            <?php
                            if ($this->project->getFirstLevelParent()->getId() == $currentProject->getId()) { ?>
                                id="colored-item-activated"
                            <?php }?>
                            class="colored-item"
                            style="background-color: #<?php echo $currentProject->getColor();?>;"
                            href="<?php echo $currentProject->getUrl();?>"
                        >
                            <span><?php echo $currentProject->getName(); ?></span>
                        </a>
                        <?php
                    }
                    ?>

                    <a href="/" id="white-item-mobiles"></a>

                </div>
            </div>

            <div class="line" id="line-menu"></div>
            <div class="line" id="line-bottom"></div>
            <div class="line" id="line-white-item-1"></div>
            <div class="line" id="line-white-item-2"></div>

            <a id="white-item" href="/"></a>

            <div id="separator-bottom"></div>

            <div id="menu-btn" onclick="
                if(document.body.id=='') {
                    document.body.id = 'unfloded';
                }
                else {
                    document.body.id = '';
                }
            ">
                <svg style="width:48px;height:48px" viewBox="0 0 24 24" class="unselectable">
                    <path fill="#FFF" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
                </svg>
            </div>

            <?php
        }

        protected function sendProjectContents ()
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

                echo '<div class="childen-column">';

                if (sizeof($children)) {
                    foreach ($children as $index=>$child) {

                        if ($index == ceil(count($children)/2)) {
                            echo '</div><div class="childen-column">';
                        }

                        ?>

                            <div class="under-project">
                                <h2><a href="<?php echo $child->getUrl();?>"><?php echo $child->getName();?></a></h2>
                                <div><?php echo $child->getDescription();?></div>
                            </div>

                        <?php
                    }
                }

                echo '</div>';
            }

            protected function sendPictures ()
            {
                ?>

                <div id="pictures">

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
                                    <?php if ($this->useLazyLoading()) { ?>data-lazy<?php }
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
                                />
                            </div>
                        <?php
                        }
                    }
                    ?>

                </div>

                <?php
            }

                protected function useLazyLoading ()
                {
                    return false;
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
                <svg viewBox="0 0 24 24" fill="#FFF" onclick="closePreview();" id="close" class="unselectable">
                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                    <path d="M0 0h24v24H0z" fill="none"/>
                </svg>

                <div id="frame">
                    <div id="picture-container" class="unselectable">

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

            <script type="text/javascript" src="/scripts/project.js"></script>

            <?php
        }


	protected $project;

	protected static $instances;
}
