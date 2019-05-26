<?php

defined("BASEPATH") or die("Direct access to script is forbidden!");

/**
*
* Controller class for
* controlling page "register"
*
* www.root.url/register
*
*/

class Register extends CI_Controller{

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
	$this->load->view( "register", [

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

	/**
	*
	*	After form submit user
	*	must be saved into our 
	*	database
	*
	*/
	public function save(){

		// User model for saving users
		$this->load->model("User_model");

		if( $this->input->post() ){

			if( !$this->User_model->username_exists($this->input->post("username")) ){

				// Save model
				if($this->User_model->save($this->input->post())){
					redirect(site_url("login/?error=2"));
				}

			} else {

				exit("Username exists");

			}

		} else{

			// Exit script
			die("You cannot be here!");

		}

	}
	
	/**
	*
	*	Check did user already exists	
	*
	*/
	public function nickname_exists(){

		// Load user model
		$this->load->model("User_model");

		echo $this->User_model->username_exists("rdeni9932");

	}


}
