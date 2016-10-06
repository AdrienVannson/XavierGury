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

	public static function getRandomPictures ($nbPictures)
	{
		$db = get_db();
		$results = $db->prepare('SELECT id FROM pictures WHERE type != "YOUTUBE" ORDER BY rand() LIMIT :nbPictures');
		$results->bindParam(':nbPictures', $nbPictures, PDO::PARAM_INT);

		$results->execute();
		
		$pictures = [];
		while($datas = $results->fetch()) {
			$pictures[] = PictureFactory::getPicture($datas['id']);
		}

		return $pictures;
	}
	
}
