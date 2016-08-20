<?php
/* 
 * Picture Factory
 */

include_once('Picture.class.php');


class PictureFactory
{
	
	public static function getPicture ($id)
	{
		return Picture::getPicture($id);
	}
	
}
