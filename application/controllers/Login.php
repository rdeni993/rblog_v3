<?php

defined("BASEPATH") or die("Direct access to script is forbidden!");

/**
*
* Controller class for
* controlling page "login"
*
*/

class Login extends CI_Controller{

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
	$this->load->view( "login", [

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
	*	This is successfull
	*	page
	*
	**/
	public function successfull_login(){	

		redirect(site_url("me"));

		// V3 Skip to homepage

		$this->load->model("Cat_model");

		$cats = $this->Cat_model->listCats();

		$this->load->view( "login_success", [

			// Load file header
			"header" => $this->load->view("header", false, true),

			// Load footer
			"footer" => $this->load->view("footer", false, true),

			// Load login Bar

			"login_bar" => $this->load->view("login-bar", false, true),

			// user
			"user" => $this->session->userdata(md5("user_rblog")),

			// Load main menu
			"main_menu" => $this->load->view("main_menu", array( "cats" => $cats ), true)

		] );

	}

	/**
	*
	*	Login service
	*
	*/
	public function user_login(){

		// Load resources
		$this->load->model("User_model");

		if( !empty($this->input->post()) ){

			// Check for login
			if( $this->User_model->login($this->input->post()) ){
				// user is logged in
				redirect( site_url("login/successfull_login") );

			} else{
				//user not logged in
				redirect( site_url("login/?error=1") );
			}

		} else{
			exit("You cannot be here!!!");
		}
	}

	/**
	*
	*	Logout
	*
	*/
	public function logout(){
		$this->session->set_userdata(md5("user_rblog"), null);
		$this->session->sess_destroy();
		redirect(site_url());	
	}

	/**
	*
	*	reset password!
	*
	*/
	public function reset(){

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
	$this->load->view( "reset", [

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


	public function reset_successfull(){

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
	$this->load->view( "reset_successfull", [

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

	public function user_reset(){

		// Load user model
		$this->load->model("User_model");

		if( $this->input->post() ){

			// get nickname
			$user_nickname = $this->input->post("username");

			if( $this->User_model->reset_password($user_nickname) ){

				redirect(site_url("login/reset_successfull"));

			} else {

				redirect(site_url("login/reset_failed"));

			}

		}

	}

	/**
	*
	*	Check did user exists
	*	Script will access to this using
	*	javascript...
	*
	*/
	public function user_exists(){

		// Load User model
		$this->load->model("User_model");

		if( $this->input->post("username") ){

			if( $this->User_model->username_exists( $this->input->post("username") ) ){

				echo json_encode(array("status"=> 404));

			} else {

				// This mean we are ready
				echo json_encode(array("status"=> 200));

			}

		} else {

			echo json_encode(array("status" => 403));

		}

	}

}
