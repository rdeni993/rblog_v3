<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	/**
	 * 
	 *	This is first page user will see
	 *	after visit blog url..
	 *
	 */
	public function index( $category ){


	// For more than one word
	$category = str_replace("%20", ' ', $category);

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

	if( empty($this->input->get("page")) ){
		$page_offset = 1;
	} else {
		$page_offset = $this->input->get("page");
	}

	if( $category ){

		//$posts = $this->Post_model->openCategory($category);
		  $posts = $this->Post_model->countPosts($category, (($page_offset-1)*5));
		  $allPosts = $this->Post_model->countPostsResult($category);

	} else {

		redirect(site_url());

	}

	/**
	*
	*	Load view
	*	After we preapre all data for
	*	website display it here...
	*
	*/
	$this->load->view( "welcome2", [

		// Load file header
		"header" => $this->load->view("header", false, true),

		// Load footer
		"footer" => $this->load->view("footer", false, true),

		// Load login Bar

		"login_bar" => $this->load->view("login-bar", false, true),

		// Load main menu
		"main_menu" => $this->load->view("main_menu", array( "cats" => $cats ), true),

		"posts"     => $posts,
		"allPosts"  => $allPosts,
		"current_page" => ($page_offset)

	] );
	
	}
}
