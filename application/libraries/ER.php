<?php 

defined("BASEPATH") or exit("Direct access to script is not allowed!");

/**
*===================================
*
*	ER stands for EasyRouting and its created
*	in purpose to hel developers to load all
*	assets files like css, js, img ...
*
*===================================
*/

class ER {

	/**
	*
	*	All images are stored inside
	*
	*	**base_url() . "assets/img/"
	*
	*	You can load your image just by typing name of
	*	image

	*
	*	ER::ImgSrc( "example.jpg" )
	*
	*/
	public static function ImgSrc( /*Img name*/ $imagePath ){

		/* Get path to directory */
		return base_url() . "assets/img/" . $imagePath;

	}

	/**
	*
	*	Load Css Files
	*	This is specific function which will
	*	create a style element at the same time--
	*
	*/
	public static function LoadCss( /* Css Script name */ $scriptName ){

		/* Return Style element */
		$styleElement = "<link type='text/css' rel='stylesheet' href='" . base_url() . "assets/css/" . $scriptName . ".css" . "' />";

		return $styleElement;

	}

	/**
	*
	*	Create Script element witch src path
	*	This will create element with included path
	*
	*
	*/
	public static function LoadJs( /* JS Name */ $scriptName ){

		/* Return Script */
		$createScript = "<script type='text/javascript' src='" . base_url() . "assets/js/" . $scriptName . ".js" . "'></script>";

		return $createScript;

	}

	/**
	*
	*	Load Anything eĺse inside assets
	*
	*/
	public static function  Load( /* Load Stuff */ $objectPath ){

		return base_url() . "assets/" .$objectPath ;

	}

}