<?php 
defined("BASEPATH") or exit("Direct access to script is not allowed!");

/**
*
*	Controller which will controll all administration
*	operations.	
*	Basic thing..

*	For easier maintaing i will describe wha we have here
*
*	=> index
*	=> dashboard ( redirect to index )
*	=> new_post
*	=> post_saved ( Display is post saved )
*	=> list_posts
*
*/

class Admin extends CI_Controller{

/** Administrator login screen */
public function login(){ echo "login screen..."; }

/** Administrator dashboard*/
public function index(){

	/**
	*
	*	Use this part of view to set up
	*	page. Include, calculaet and do
	*	everything you need before u 
	*	present your page..
	*
	*/
	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	$this->load->model("Post_model");
	$this->load->model("User_model");
	$this->load->model("Cat_model");
	$this->load->model("Message_model");

	$countedPosts = $this->Post_model->countAllPosts();
	$countedUsers = $this->User_model->countAllUsers();
	$countedAdmins = $this->User_model->countAllAdmins();
	$countedCats = $this->Cat_model->countAllCats();
	$mostPopular = $this->Post_model->mostViewedPosts();
	$new_messages = $this->Message_model->list_unread();
	

	/**
	*
	*	Present page
	*
	*/
	$this->load->view( "admin/dashboard", [

		/* Load header */
		"header" => $this->load->view( "admin/header", 

			[
				"top_menu"   => $this->load->view( "admin/dash_top_menu", false, true ),
				"left_menu"  => $this->load->view( "admin/dash_left_menu", 
					["inbox_badge" => sizeof($new_messages)], 
					true )
			]

		, true ),

		/* Calculate how much posts we have */
		"countedPosts" => $countedPosts,
		"countedUsers" => $countedUsers,
		"countedAdmins" => $countedAdmins,
		"countedCats" => $countedCats,
		"mostPopular" => $mostPopular,

		/* Load Footer */
		"footer" => $this->load->view( "admin/footer", false, true ) 

	] );

}

/** Just redirect me to index */
public function dashboard(){ redirect( site_url("admin/"), "location" ); }  

/** Page for new post */
public function new_post(){

	/**
	*
	*	Use this part of view to set up
	*	page. Include, calculaet and do
	*	everything you need before u 
	*	present your page..
	*
	*/

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	$this->load->model("Cat_model");

	/**
	*
	*	Present page
	*
	*/
	$this->load->view( "admin/new_post", [

		/* Load header */
		"header" => $this->load->view( "admin/header", 

			[
				"top_menu"   => $this->load->view( "admin/dash_top_menu", false, true ),
				"left_menu"  => $this->load->view( "admin/dash_left_menu", false, true )
			]

		, true ),

		/* Load Footer */
		"footer" => $this->load->view( "admin/footer", false, true ),

		/* Categories */
		"cats" => $this->Cat_model->listCats() 

	] );

}
/** Page for edit post */
public function edit_post(){

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	/**
	*
	*	Use this part of view to set up
	*	page. Include, calculaet and do
	*	everything you need before u 
	*	present your page..
	*
	*/

	$this->load->model("Cat_model");
	$this->load->model("Post_model");

	if( $this->input->post() ){

		// Get post
		$postDetails = $this->Post_model->getPost( $this->input->post("post_id") );

	} else {

		exit("Nothing to edit!");
		echo "<a href='" . site_url("admin/") . "'>See posts insted</a>";

	}

	/**
	*
	*	Present page
	*
	*/
	$this->load->view( "admin/edit_post", [

		/* Load header */
		"header" => $this->load->view( "admin/header", 

			[
				"top_menu"   => $this->load->view( "admin/dash_top_menu", false, true ),
				"left_menu"  => $this->load->view( "admin/dash_left_menu", false, true )
			]

		, true ),

		/* Load Footer */
		"footer" => $this->load->view( "admin/footer", false, true ),

		/* Categories */
		"cats" => $this->Cat_model->listCats(),

		/* Post */
		"postArr" => $postDetails 

	] );

}

public function post_saved($status){

	/**
	*
	*	Use this part of view to set up
	*	page. Include, calculaet and do
	*	everything you need before u 
	*	present your page..
	*
	*/

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	/**
	*
	*	Present page
	*
	*/
	$this->load->view( "admin/post_saved", [

		/* Load header */
		"header" => $this->load->view( "admin/header", 

			[
				"top_menu"   => $this->load->view( "admin/dash_top_menu", false, true ),
				"left_menu"  => $this->load->view( "admin/dash_left_menu", false, true )
			]

		, true ),

		/* Load Footer */
		"footer" => $this->load->view( "admin/footer", false, true ),

		/* Send status */
		"status" => $status 

	] );

}

/**
*
*	This will be response page
*	for uploading..
*
*/
public function post_uploaded($status){

	/**
	*
	*	Use this part of view to set up
	*	page. Include, calculaet and do
	*	everything you need before u 
	*	present your page..
	*
	*/

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	/**
	*
	*	Present page
	*
	*/
	$this->load->view( "admin/post_uploaded", [

		/* Load header */
		"header" => $this->load->view( "admin/header", 

			[
				"top_menu"   => $this->load->view( "admin/dash_top_menu", false, true ),
				"left_menu"  => $this->load->view( "admin/dash_left_menu", false, true )
			]

		, true ),

		/* Load Footer */
		"footer" => $this->load->view( "admin/footer", false, true ),

		/* Send status */
		"status" => $status 

	] );

}

/**
*
*	List posts
*	Load view with table with posts
*
*/
public function list_posts(){

	/**
	*
	*	Use this part of view to set up
	*	page. Include, calculaet and do
	*	everything you need before u 
	*	present your page..
	*
	*/

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	// Include posts
	$this->load->model("Post_model");

	// Get posts
	$posts = $this->Post_model->listPosts();

	/**
	*
	*	Present page
	*
	*/
	$this->load->view( "admin/list_posts", [

		/* Load header */
		"header" => $this->load->view( "admin/header", 

			[
				"top_menu"   => $this->load->view( "admin/dash_top_menu", false, true ),
				"left_menu"  => $this->load->view( "admin/dash_left_menu", false, true )
			]

		, true ),

		/* Load Footer */
		"footer" => $this->load->view( "admin/footer", false, true ),

		/* All posts */
		"posts" => $posts

	] );

}

/**
*
*	Control media files uploaded
*	to our folder...	
*
*/
public function media_upload(){

	/**
	*
	*	Use this part of view to set up
	*	page. Include, calculaet and do
	*	everything you need before u 
	*	present your page..
	*
	*/

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	// Include Media Model
	$this->load->model("Media_model");

	// get data
	$files = $this->Media_model->get_files();

	// Remove first 3 elements
	// array_splice( $files, 0, 3 );

	/**
	*
	*	Present page
	*
	*/
	$this->load->view( "admin/media_upload", [

		/* Load header */
		"header" => $this->load->view( "admin/header", 

			[
				"top_menu"   => $this->load->view( "admin/dash_top_menu", false, true ),
				"left_menu"  => $this->load->view( "admin/dash_left_menu", false, true )
			]

		, true ),

		/* Load Footer */
		"footer" => $this->load->view( "admin/footer", false, true ),

		/* Display files */
		"files" => $files

	] );

}

/**
*
*	Page for upload file
*
*/
public function upload(){

	/**
	*
	*	Use this part of view to set up
	*	page. Include, calculaet and do
	*	everything you need before u 
	*	present your page..
	*
	*/

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	/**
	*
	*	Present page
	*
	*/
	$this->load->view( "admin/upload", [

		/* Load header */
		"header" => $this->load->view( "admin/header", 

			[
				"top_menu"   => $this->load->view( "admin/dash_top_menu", false, true ),
				"left_menu"  => $this->load->view( "admin/dash_left_menu", false, true )
			]

		, true ),

		/* Load Footer */
		"footer" => $this->load->view( "admin/footer", false, true )

	] );

}

/**
*
*	Create new Category
*	This will open Category page
*
*/
public function createCategory(){

	/**
	*
	*	Use this part of view to set up
	*	page. Include, calculaet and do
	*	everything you need before u 
	*	present your page..
	*
	*/

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	$this->load->model("Cat_model");

	/**
	*
	*	Present page
	*
	*/
	$this->load->view( "admin/new_category", [

		/* Load header */
		"header" => $this->load->view( "admin/header", 

			[
				"top_menu"   => $this->load->view( "admin/dash_top_menu", false, true ),
				"left_menu"  => $this->load->view( "admin/dash_left_menu", false, true )
			]

		, true ),

		/* Load Footer */
		"footer" => $this->load->view( "admin/footer", false, true )

	] );

}

/**
*
*	List all created categories
*
*/
public function category(){

	/**
	*
	*	Use this part of view to set up
	*	page. Include, calculaet and do
	*	everything you need before u 
	*	present your page..
	*
	*/

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	$this->load->model("Cat_model");

	/**
	*
	*	Present page
	*
	*/
	$this->load->view( "admin/category", [

		/* Load header */
		"header" => $this->load->view( "admin/header", 

			[
				"top_menu"   => $this->load->view( "admin/dash_top_menu", false, true ),
				"left_menu"  => $this->load->view( "admin/dash_left_menu", false, true )
			]

		, true ),

		/* Load Footer */
		"footer" => $this->load->view( "admin/footer", false, true ),

		/* Category */
		"cats" => $this->Cat_model->listCats()

	] );

}

/**
*
*	Created Category result response
*	
*
*/
public function cat_created($status){

	/**
	*
	*	Use this part of view to set up
	*	page. Include, calculaet and do
	*	everything you need before u 
	*	present your page..
	*
	*/

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	/**
	*
	*	Present page
	*
	*/
	$this->load->view( "admin/category_create_page", [

		/* Load header */
		"header" => $this->load->view( "admin/header", 

			[
				"top_menu"   => $this->load->view( "admin/dash_top_menu", false, true ),
				"left_menu"  => $this->load->view( "admin/dash_left_menu", false, true )
			]

		, true ),

		/* Load Footer */
		"footer" => $this->load->view( "admin/footer", false, true ),

		/* Send status */
		"status" => $status 

	] );

}

/**
*
*	Post updated result
*
*/
public function post_updated($status){

	/**
	*
	*	Use this part of view to set up
	*	page. Include, calculaet and do
	*	everything you need before u 
	*	present your page..
	*
	*/

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	/**
	*
	*	Present page
	*
	*/
	$this->load->view( "admin/post_updated", [

		/* Load header */
		"header" => $this->load->view( "admin/header", 

			[
				"top_menu"   => $this->load->view( "admin/dash_top_menu", false, true ),
				"left_menu"  => $this->load->view( "admin/dash_left_menu", false, true )
			]

		, true ),

		/* Load Footer */
		"footer" => $this->load->view( "admin/footer", false, true ),

		/* Send status */
		"status" => $status 

	] );

}

/**
*
*	List all users
*
*/
public function users(){

	/**
	*
	*	Use this part of view to set up
	*	page. Include, calculaet and do
	*	everything you need before u 
	*	present your page..
	*
	*/

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	$this->load->model("User_model");

	$users = $this->User_model->users();

	/**
	*
	*	Present page
	*
	*/
	$this->load->view( "admin/list_users", [

		/* Load header */
		"header" => $this->load->view( "admin/header", 

			[
				"top_menu"   => $this->load->view( "admin/dash_top_menu", false, true ),
				"left_menu"  => $this->load->view( "admin/dash_left_menu", false, true )
			]

		, true ),

		/* Load Footer */
		"footer" => $this->load->view( "admin/footer", false, true ),

		/*Users*/
		"users" => $users

	] );

}

/**
*
*	This is inbox
*	
*/
public function inbox(){

	/**
	*
	*	Use this part of view to set up
	*	page. Include, calculaet and do
	*	everything you need before u 
	*	present your page..
	*
	*/

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	$this->load->model("Message_model");

	$messages = $this->Message_model->list_messages();

	/**
	*
	*	Present page
	*
	*/
	$this->load->view( "admin/inbox", [

		/* Load header */
		"header" => $this->load->view( "admin/header", 

			[
				"top_menu"   => $this->load->view( "admin/dash_top_menu", false, true ),
				"left_menu"  => $this->load->view( "admin/dash_left_menu", false, true )
			]

		, true ),

		"messages" => $messages,

		/* Load Footer */
		"footer" => $this->load->view( "admin/footer", false, true )

	] );

}


public function message(){

	/**
	*
	*	Use this part of view to set up
	*	page. Include, calculaet and do
	*	everything you need before u 
	*	present your page..
	*
	*/

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	$this->load->model("Message_model");

	// Update
	$this->Message_model->seen($this->input->get("id"));
	$message = $this->Message_model->get_message($this->input->get("id"));

	/**
	*
	*	Present page
	*
	*/
	$this->load->view( "admin/message", [

		/* Load header */
		"header" => $this->load->view( "admin/header", 

			[
				"top_menu"   => $this->load->view( "admin/dash_top_menu", false, true ),
				"left_menu"  => $this->load->view( "admin/dash_left_menu", false, true )
			]

		, true ),

		"message" => $message,

		/* Load Footer */
		"footer" => $this->load->view( "admin/footer", false, true )

	] );

}

/**
*
*	===================================
*	===================================
*	===================================
*	===================================
	This part is used for services
*	===================================
*	===================================
*	===================================
*	===================================
*
*/


/** This is responding pages we will use later.. */
/** Previous post is page where we will send data */
/** From ŃEW POST FORM */
public function save_post(){

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	/**
	*
	*	If we want everything works fine
	*	we need to be sure we are here via post
	*	method
	*
	*/
	if( $this->input->post() ){

		/**
		*
		*	Set rules
		*
		*/
		$this->form_validation->set_rules([

			// Title
			[
				"field" => "post_title",
				"label" => "Post Title",
				"rules" => "required"
			],

			// Post Content
			[
				"field" => "post_content",
				"label" => "Post Content",
				"rules" => "required"
			]

		]);

		if( $this->form_validation->run() ){

			// Load post model
			$this->load->model("Post_model");

			// Save post
			if( $this->Post_model->savePost($this->input->post()) ){

				redirect( site_url("admin/post_saved/success"), "location" );

			}

		} else {

			redirect( site_url("admin/post_saved/failed"), "location" );

		}

	} else{

		exit("You cann't access to this script at that way!!!");

	}

}

	/**
	*
	*	Display post using post id.
	*	This will help us to get data for
	*	post preview
	*
	*/
	public function get_post(){

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

		// We need post model
		$this->load->model("Post_model");

		// Request to this page will be only trough post
		// method.
		if( $this->input->post() ){

			// post id
			$post_id = $this->input->post( "post_id" );

			// Echo
			echo json_encode($this->Post_model->getPost($post_id));

		} else{
			exit("Direct access to this is not allowed.");
		}

	}

	/**
	*
	*	Accept form with
	*	enctype="multipart/form-data"
	*
	*/
	public function upload_file(){

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

		// Request to this page will be only trough post
		// method.
		if( $this->input->post() ){


			print_r($_FILES);


			// Upload file
			if( move_uploaded_file( $_FILES["blog_file"]["tmp_name"], "upload/" . $_FILES["blog_file"]["name"] ) ){

				redirect( site_url("admin/post_uploaded/success"), "location" );

			} else {

				redirect( site_url("admin/post_uploaded/failed"), "location" );

			}

		} else{

			exit("Direct access to this is not allowed.");

		}

	}

	/**
	*
	*	Rename file
	*
	*/
	public function renameFile(){

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

		$this->load->model("Media_model");

		if( $this->input->post() ){

			// Using post form we get two new
			// params
			// -> oldname
			// -> newname
			$oldname = $this->input->post("oldname");
			$newname = $this->input->post("newname");

			if( $this->Media_model->rename($oldname, $newname) ){

				echo json_encode(array( "status" => 200 ));

			} else {

				echo json_encode(array( "status" => 404 ));

			}

		} else {

			echo "Something went wrong!";

		}

	}

	/**
	*
	*	Delete file form folder
	*
	*/
	public function deleteFile(){

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

		// Load Media Model
		$this->load->model("Media_model");

		// Data will be send
		// trough post method
		if( $this->input->post() ){

			//
			$filename = $this->input->post("filename");

			// Delete file
			if( $this->Media_model->delete( $filename ) ){

				echo json_encode(array("status"=>200));

			} else {

				echo json_encode(array("status" => 404));

			}

		} else{

			exit("Something went worng!");

		}

	}

/**
*
*	List all images from
*	upload directory
*
*/
public function listImages(){

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	// Include model
	$this->load->model("Media_model");

	// get everything
	// from upload directory
	echo json_encode($this->Media_model->listImages());

}

/**
*
*	Take control overs posts
*	We will give you option
*	delete, edit post.
*
*/
public function delete_post(){

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	// Load post
	$this->load->model("Post_model");

	if( $this->input->post() ){

		// Post ID get by AJAX
		$markedPost = $this->input->post("post_id");

		if( $this->Post_model->deletePost( $markedPost ) ) {
		
			echo json_encode(array("status" => 200));

		} else {

			echo json_encode(array("status" => 404 ));

		}

	}

}


/**
*
* Create Cat Service
*
*/
public function create_cat(){

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	// Load Model
	$this->load->model("Cat_model");

	if( $this->input->post() ){

		if( $this->Cat_model->newCategory( $this->input->post() ) ){

			redirect( site_url("admin/cat_created/success"), "location" );

		} else {
		
			redirect( site_url("admin/cat_created/failed"), "location" );

		}

	}

}

/**
*
* Delete Category
*
*/
public function delete_cat(){

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	$this->load->model("Cat_model");
	$this->load->model("Post_model");

	// 
	if( $this->input->post("cat_id") ){

		if($this->Cat_model->deleteCat( $this->input->post("cat_id") )){

			$this->Post_model->deletePostCategory($this->input->post("cat_title"));

			echo json_encode(array("status" => 200));

		}else {

			echo json_encode(array("status" => 404));

		}

	}

}

/**
*
*	Update post service
*
*/
public function update(){

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	$this->load->model("Post_model");

	if( $this->input->post() ){

		$postId = $this->input->post("post_id");
		$postOb = $this->input->post();

		if( $this->Post_model->update_post( $postId, $postOb ) ){

			redirect( site_url("admin/post_updated/success"), "location" );

		} else{

			redirect( site_url("admin/post_updated/failed"), "location" );

		}

	} else{

		exit("You are wrong turn!");

	}

}

/**
*
*	Remove user on request
*
**/
public function delete_user(){

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	if( $this->input->post() ){
		
		// Get Usermodel
		$this->load->model("User_model");

		// Select user
		$user_nickname = $this->input->post("user_nickname");

		if( $this->User_model->delete_user($user_nickname) ){

			echo json_encode(array("status" => 200));

		} else {

			echo json_encode(array("status" => 404));

		}

	} else{
		exit("You cannot be here!");
	}

}

/**
*
*	Block user / Unblock
*
*/
public function block_user(){

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	if( $this->input->post() ){
		
		// Get Usermodel
		$this->load->model("User_model");

		// Select user
		$user_nickname = $this->input->post("user_nickname");

		if( $this->User_model->block_user($user_nickname) ){

			echo json_encode(array("status" => 200));

		} else {

			echo json_encode(array("status" => 404));

		}

	} else{
		exit("You cannot be here!");
	}

}


public function unblock_user(){

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	if( $this->input->post() ){
		
		// Get Usermodel
		$this->load->model("User_model");

		// Select user
		$user_nickname = $this->input->post("user_nickname");

		if( $this->User_model->unblock_user($user_nickname) ){

			echo json_encode(array("status" => 200));

		} else {

			echo json_encode(array("status" => 404));

		}

	} else{
		exit("You cannot be here!");
	}

}

public function become_admin(){

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	if( $this->input->post() ){
		
		// Get Usermodel
		$this->load->model("User_model");

		// Select user
		$user_nickname = $this->input->post("user_nickname");

		if( $this->User_model->update_admin_role($user_nickname) ){

			echo json_encode(array("status" => 200));

		} else {

			echo json_encode(array("status" => 404));

		}

	} else{
		exit("You cannot be here!");
	}

}

public function remove_admin(){
	
	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	if( $this->input->post() ){
		
		// Get Usermodel
		$this->load->model("User_model");

		// Select user
		$user_nickname = $this->input->post("user_nickname");

		if( $this->User_model->update_user_role($user_nickname) ){

			echo json_encode(array("status" => 200));

		} else {

			echo json_encode(array("status" => 404));

		}

	} else{
		exit("You cannot be here!");
	}

}

public function delete_message(){	

	if( !Admin_login::amIAdmin() ){
		redirect("login/?error=3");
	}

	$this->load->model("Message_model");

	$message_id = $this->input->get("id", true);

	if( $this->Message_model->delete_message($message_id) ){

		redirect(site_url("admin/inbox"));

	}

}

/*****************/

public function sendmail(){
	if(mail("rdeni@localhost", "Hello", "Poruka za tebe", "From:korisnik@localhost.com")){
		echo "send";
	} else {
		echo "notsend";
	}
}

}