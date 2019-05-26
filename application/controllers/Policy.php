<?php

defined("BASEPATH") or die("Direct access to script is forbidden!");

/**
*
* Controller class for
* controlling page "login"
*
*/

class Policy extends CI_Controller{

	/**
	*
	*	This is page we open after 
	*	click on login!!
	*
	*/
	public function index(){

	/**
	*
	*	Load all settings for website
	*	This is place where we can include
	*	all data we want to show to user before
	*	we can go to create a view!!!!
	*
	*/

	$this->load->model("Cat_model");

	$cats = $this->Cat_model->listCats();

	/**
	*
	*	Load view
	*	After we preapre all data for
	*	website display it here...
	*
	*/
	$this->load->view( "policy", [

		// Load file header
		"header" => $this->load->view("header", false, true),

		// Load footer
		"footer" => $this->load->view("footer", false, true),

		// Load login Bar

		"login_bar" => $this->load->view("login-bar", false, true),

		// Load main menu
		"main_menu" => $this->load->view("main_menu", array( "cats" => $cats ), true)

	] );

	}

	public function set_cookie(){

	if ( setcookie(md5("rblog_first_visit"), "You have been here", ( time() + ( 3600 * 24 * 30 * 90 ) ), "/" ) ){

		redirect(site_url());

	}

	}

}
