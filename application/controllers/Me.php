<?php

defined("BASEPATH") or exit("No direct access to script allowed!!");

class Me extends CI_Controller{
	
/**
*	Display user profile
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

	$this->load->model("User_model");

	$this->load->model("Cat_model");

	// Load cats
	$cats = $this->Cat_model->listCats();

	// Detect am i logged in
	$me = $this->session->userdata(md5("user_rblog"));

	$me->user_password = null;

	if( !$me ){

		redirect(site_url("login/"));

	} 
	
	/**
	*
	*	Load view
	*	After we preapre all data for
	*	website display it here...
	*
	*/
	$this->load->view( "profile", [

		// Load file header
		"header" => $this->load->view("header", false, true),

		// Load footer
		"footer" => $this->load->view("footer", false, true),

		// Load login Bar

		"login_bar" => $this->load->view("login-bar", false, true),

		// Load main menu
		"main_menu" => $this->load->view("main_menu", array( "cats" => $cats ), true),

		"me" => $me

	] );


}

/**
*	Change email address
*/
public function change_email(){


	/**
	*
	*	Load all settings for website
	*	This is place where we can include
	*	all data we want to show to user before
	*	we can go to create a view!!!!
	*
	*/

	$this->load->model("User_model");

	$this->load->model("Cat_model");

	// Load cats
	$cats = $this->Cat_model->listCats();

	// Detect am i logged in
	$me = $this->session->userdata(md5("user_rblog"));

	$me->user_password = null;

	if( !$me ){

		redirect(site_url("login/"));

	} 
	
	/**
	*
	*	Load view
	*	After we preapre all data for
	*	website display it here...
	*
	*/
	$this->load->view( "change_email", [

		// Load file header
		"header" => $this->load->view("header", false, true),

		// Load footer
		"footer" => $this->load->view("footer", false, true),

		// Load login Bar

		"login_bar" => $this->load->view("login-bar", false, true),

		// Load main menu
		"main_menu" => $this->load->view("main_menu", array( "cats" => $cats ), true),

		"me" => $me

	] );

}

/**
*
*	SERVICES
*
*/
public function service_change_email(){

	// Load
	$this->load->model("User_model");

	$me = $this->session->userdata(md5("user_rblog"));

	if( $this->session->userdata(md5("user_rblog")) ){

		$new_email = $this->input->post("new_email");

		if( $this->User_model->update_email($me->user_nickname, $new_email) ){

			$this->session->userdata(md5("user_rblog"))->user_email = $new_email;

			redirect(site_url("me"));

		} else {
			exit("Error occured! Try later");
		}

	} else {

		redirect(site_url("login"));

	}

}

public function service_delete_me(){

	$this->load->model("User_model");

	//
	$me = $this->session->userdata(md5("user_rblog"));

	//
	$this->session->userdata = null;

	if($this->User_model->delete_user($me->user_nickname)){

		redirect(site_url("login/logout"));

	} else{
		exit("Error occured!");
	}

}

}