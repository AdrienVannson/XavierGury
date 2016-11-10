<?php
/* 
 * ProjectView (singleton) 
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
			self::$instances[$id] = new self($project);
		}
	
		return self::$instances[$id];
	}


    /*
     * Displaying functions
     */
    
    protected function showHead ()
    {
        ?>
        <!DOCTYPE HTML>
        <html lang="fr">
        <?php

        $styles = ['/styles/project.css'];

        if ($this->project->getPicturesDisplayMode() == 'CAROUSEL') {
            $styles[] = 'http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css';
            $styles[] = 'http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css';
        }

        $head = '<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">';

        if ($this->project->getDescription() != '') {
            $head .= '<meta name="description" content="' . strip_tags($this->project->getDescription()) . '">';
        }

        $pictures = $this->project->getPictures();

        show_head($this->project->getName(), $styles, array(), $head);
    }



    public function sendHTML ()
    {
        $this->showHead();

        echo "<body>Bonjour</body>";
    }


	protected $project;

	protected static $instances;
}
