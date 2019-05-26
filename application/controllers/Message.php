<?php

defined("BASEPATH") or exit("No direct access to script allowed!");

/**
*
*	Use this for sendind messages
*
*/

class Message extends CI_Controller{
	
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

	if( !$this->session->userdata(md5("user_rblog")) ){
		redirect(site_url("login?error=3"));
	}

	/**
	*
	*	Load view
	*	After we preapre all data for
	*	website display it here...
	*
	*/
	$this->load->view( "message_send", [

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


	public function successfull(){

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
	$this->load->view( "message_successfull", [

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
	*	Service to save
	*	message
	*/
	public function send_message(){

		$this->load->model("Message_model");

		if( $this->input->post() ){
			if ($this->Message_model->send_message($this->input->post())) {
				redirect(site_url("message/successfull"));
			}
		}else{
			exit("You cannot be here!");
		}

	}

}
