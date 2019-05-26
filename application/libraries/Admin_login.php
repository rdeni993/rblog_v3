<?php

defined("BASEPATH") or exit("No direct access to script is allowed!!!");

/**
*	========================================
*	Admin_login class
*	is simple static class which can
*	provide mechanism to detect is use admin
*	or not...
*	========================================
*/

class Admin_Login{

private static $session_name;
	
/**
*	Detect is user administrator
*
*/
public static function amIAdmin(){

	self::$session_name = md5("user_rblog");

	if( empty( $_SESSION[self::$session_name] ) ){
		return false;
	} else{
		if( $_SESSION[self::$session_name]->user_role != "admin" ){
			return false;
		}else{
			return true;
		}
	}

}

}

?>