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


    // Getters & setters
    public function getDescription ()
    {
        return $this->description;
    }

    


    protected $description;

    protected static $instance;

}