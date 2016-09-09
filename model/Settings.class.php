<?php
// Model
include_once(__DIR__.'/connect.php');


class Settings
{

    protected function __construct ()
    {
        $db = get_db();

        $result = $db->query('SELECT * FROM settings WHERE id=1');
        $datas = $result->fetch();

        $this->description = $datas['description'];
    }

    private function __clone () {}

    public static function getSettings ()
    {
        if (!isset(self::$instance)) {
			self::$instance = new self();
		}
		
		return self::$instance;
    }


    public function save()
    {
		$db = get_db();

        $results = $db->prepare('UPDATE settings SET description=? WHERE id=1;');
        $results->execute(array(
                $this->description
        ));
	}


    // Getters & setters

    public function getDescription ()
    {
        return $this->description;
    }

    public function setDescription ($description)
    {
        $this->description = $description;
    }



    protected $description;

    protected static $instance;

}