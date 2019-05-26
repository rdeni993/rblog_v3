<?php
defined("BASEPATH") or exit("Direct script access is forbidden");

/**
*
*	This is model i will use
*	for connect all important operations with posts.
*
*	This will be link between post and database
*
*/

class Post_model extends CI_Model{

	/**
	*
	*	== Save post to database ==
	*	
	*	This will be easiest way to store post in database.	
	*	From external script we will take post parameters.
	*
	*	@return BOOLEAN	
	*
	*/
	public function savePost( /** Input object */$inputObject ){

		//$post_slug = strtolower( str_replace(" ", "-", $inputObject["post_title"] . time()) );
		$post_slug = $inputObject['post_title'];
		$post_slug = str_replace(
			array("š", "đ", "č", "ć", "ž", "dž", ",", "-", "=", "?"), 
			array("s", "d", "c", "c", "z", "dz", "-", "-", "-", "-"), 
		$post_slug);
		$post_slug = rawurlencode($post_slug);


		return $this->db->insert( 
			"blog_posts",
			[
				"post_title"    => $inputObject["post_title"],
				"post_content"  => $inputObject["post_content"],

				"post_slug"     => $post_slug,

				//"post_slug"     => strtolower( str_replace(" ", "-", $inputObject["post_title"] . time()) ),

				"post_date_of_create" => time(),
				"post_date_of_change" => time(),
				"post_author" => $inputObject["post_author"],
				"post_category" => $inputObject["post_category"],
				"post_privacy" => $inputObject["post_privacy"],
				"post_featured_img_path" => $inputObject["post_featured"],
				"post_tags" => strtolower($inputObject["post_tags"])
			]
		);
	}

	/**
	*
	*	== Update post ==
	*
	*/
	public function update_post( /** post id*/ $postId, /** post object */ $postObject ){



		$post_slug = strtolower( str_replace(" ", "-", $postObject["post_title"] . time()) );
		$post_slug = str_replace(array("š", "đ", "č", "ć", "ž", "dž", "," , "=", "?"), "", $post_slug);


		// Select post
		$this->db->where( "post_id", $postId );

		// Set post
		$updateClause = [

			"post_title"     =>  $postObject['post_title'],
			"post_content"   =>  $postObject['post_content'],
			"post_date_of_change" => time(),
			"post_category"  => $postObject['post_category'],
			"post_privacy"   => $postObject['post_privacy'],
			"post_featured_img_path" => $postObject['post_featured'],
			"post_tags"      => strtolower($postObject['post_tags'])

		];

		$this->db->set($updateClause);

		return $this->db->update("blog_posts");

	}

	/**
	*
	*	== List all posts from database ==
	*
	*	This will return all posts we have 
	*	Stored in database.
	*
	*/
	public function listPosts(){
		return $this->db->get("blog_posts")->result();
	}

	public function listPublicPosts(){
		$this->db->order_by("post_id", "desc");
		$q = $this->db->get_where("blog_posts", array(

			"post_privacy" => "public"

		), 13);

		return $q->result();
	}

	public function listAllPosts(){
		$this->db->order_by("post_id", "desc");
		$q = $this->db->get_where("blog_posts", array(

			"post_privacy !=" => "draft"

		), 13);

		return $q->result();
	}

	public function openCategory($category){
		$this->db->order_by("post_id", "desc");
		$q = $this->db->get_where("blog_posts", array(

			"post_category"    => $category,
			"post_privacy !="  => "draft"

		));

		return $q->result();
	}

	/**
	*
	*	== Get post using post id ==
	*
	*	This will return only post we requested trough
	*	post id..
	*
	*/
	public function getPost(/** Post ID */$postId){
		return $this->db->get_where("blog_posts", array("post_id" => $postId))->result();
	}

	public function listPost(/** Post ID */$postSlug){
		return @$this->db->get_where("blog_posts", 
			array(
				"post_slug" => $postSlug,
				"post_privacy !=" => "draft"
			)
		)->result()[0];
	}

	/**
	*
	*	== Delete post using post id ==
	*	
	*	Remove post from database
	*
	*/
	public function deletePost( /** Post ID */ $postId ){
		return $this->db->delete( "blog_posts", array( "post_id" => $postId ) );
	}

	/**
	*
	*	== Remove post using category ==
	*
	*	Remoev post
	*
	*/
	public function deletePostCategory( /** Post Category */ $postCat ){
		return $this->db->delete( "blog_posts", array( "post_category" => $postCat ) );
	}

	/**
	*
	*	=== Search ===
	*
	*
	*/
	public function searchPosts($query_array){

		$result_posts = array();

		if( is_array($query_array) ){

			$posts = $this->db->get("blog_posts")->result();

			foreach( $query_array as $q ){

				foreach( $posts as $post ){

					if( $post->post_privacy == "draft" ){
						continue;
					}

					// Take every tag from 
					// every string
					$tags = explode(",", $post->post_tags);

					$tag_list = array_map('trim', $tags);

					if( in_array($q, $tag_list) ){
						
						if( !in_array( $post, $result_posts ) ){

							array_push($result_posts, $post);

						}

					}

				}

			}

		} else {
			return false;
		}

		return $result_posts;

	}

	/**
	*
	*	Count all posts we can
	*	reach..
	*
	*/
	public function countPosts($category, $offset, $limit = 5){
		$this->db->order_by("post_id", "desc");
		return $this->db->get_where("blog_posts", array(
			"post_category" => $category,
			"post_privacy !="   => "draft"
		), $limit, $offset)->result();
	}

	public function countPostsResult($category){
		return $this->db->get_where("blog_posts", array(
			"post_category" => $category,
			"post_privacy !="   => "draft"
		))->num_rows();
	}

	public function countAllPosts(){
		return $this->db->get("blog_posts")->num_rows();
	}

	/**
	*	Increase post view by 1
	*	
	*/
	public function viewPost($post_slug){

		// Set post slug
		$this->db->where("post_slug", $post_slug);

		// Set
		$this->db->set("post_views", "post_views+1", false);

		return $this->db->update("blog_posts");

	}

	/*
	*	Sort posts by most popular
	*	to lower..
	*/
	public function mostViewedPosts(){

		// Set orders
		$this->db->order_by("post_views", "desc");

		return $this->db->get("blog_posts", 10)->result();
	}

}