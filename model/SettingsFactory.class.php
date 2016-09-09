<?php
/* 
 * Settings Factory
 */

include_once('Settings.class.php');


class SettingsFactory
{
	
	public static function getSettings ()
	{
		return Settings::getSettings();
	}
	
}
