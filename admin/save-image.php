<?php

function save_image($src, $destination, $size) {
	
	$infos = getimagesize($src);
	$width = $infos[0];
	$height = $infos[1];
	
	if($infos["mime"] == "image/jpeg") {
		$img = imagecreatefromjpeg($src);
	}
	elseif($infos["mime"] == "image/gif") {
		$img = imagecreatefromgif($src);
	}
	elseif($infos["mime"] == "image/png") {
		$img = imagecreatefrompng($src);
	}
	else {
		return false;
	}
	
	$quality = 100;
	switch ($size) {
		case "small":
			$img = imagescale($img, floor(128*$width/$height));
			$quality = 75;
			break;
		
		case "medium":
			$img = imagescale($img, floor(512*$width/$height));
			$quality = 80;
			break;
		
		case "large":
			break;
	}
	
	return imagejpeg($img, $destination.$size.".jpg", $quality);
}