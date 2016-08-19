<?php
/* 
 * Picture Factory
 */

include_once('Picture.class.php');


class PictureFactory
{
	
	public function __construct () {
		$this->pictures = [];
	}
	
	public function __clone () {}
	
	public static function getInstance ()
	{
		if (!isset(self::$instance)) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function getPicture ($id)
	{
		if (!isset($pictures[$id])) {
			$pictures[$id] = new Picture($id);
		}
		return $pictures[$id];
	}
	
	
	private static $instance;
	
	private $pictures;
	
}
