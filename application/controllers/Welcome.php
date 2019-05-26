<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * 
	 *	This is first page user will see
	 *	after visit blog url..
	 *
	 */
	public function index( ){

	/**
	*
	*	Load all settings for website
	*	This is place where we can include
	*	all data we want to show to user before
	*	we can go to create a view!!!!
	*
	*/
	$this->load->model("Cat_model");
	$this->load->model("Post_model");

	$cats = $this->Cat_model->listCats();
	$posts= $this->Post_model->listPublicPosts();

	if( $this->session->userdata(md5("user_rblog")) ){
		$posts = $this->Post_model->listAllPosts();
	} else{
		$posts = $this->Post_model->listPublicPosts();
	}

	/**
	*
	*	Load view
	*	After we preapre all data for
	*	website display it here...
	*
	*/
	$this->load->view( "welcome", [

		// Load file header
		"header" => $this->load->view("header", false, true),

		// Load footer
		"footer" => $this->load->view("footer", false, true),

		// Load login Bar

		"login_bar" => $this->load->view("login-bar", false, true),

		// Load main menu
		"main_menu" => $this->load->view("main_menu", array( "cats" => $cats ), true),

		"posts" => $posts

	] );
	
	}


}
