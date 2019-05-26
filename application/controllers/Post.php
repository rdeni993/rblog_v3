<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	/**
	 * 
	 *	This is first page user will see
	 *	after visit blog url..
	 *
	 */
	public function index( /* By default this will brake page */ $post_slug = null ){

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
	

	if( !$post_slug ){

		$post = false;

	} else {

		$post = $this->Post_model->listPost($post_slug);

	}

	if( @!$this->session->userdata(md5("user_rblog")) ){
		
		if( @$post->post_privacy == "private" ){

			$post = "private";

		}

	} 

	/* We have slug increase view */
	$this->Post_model->viewPost($post_slug);

	/**
	*
	*	Load view
	*	After we preapre all data for
	*	website display it here...
	*
	*/
	$this->load->view( "post", [

		// Load file header
		"header" => $this->load->view("header", false, true),

		// Load footer
		"footer" => $this->load->view("footer", false, true),

		// Load login Bar

		"login_bar" => $this->load->view("login-bar", false, true),

		// Load main menu
		"main_menu" => $this->load->view("main_menu", array( "cats" => $cats ), true),

		"post" => $post

	] );
	
	}


}
