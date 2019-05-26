<?php 

defined("BASEPATH") or die("Direct access to script is not allowed!!");

/**
*
*	This is specific model
*	and must take
*	lot of attention....
*
*/

class User_model extends CI_Model{

/**
*
*	After submit form on page <ROOT>/register
*	data are redirect here... Request must be
*	sent using POST method. Data must be encrypted....
*
*/
public function save( /* POST object */$post_object ){

return $this->db->insert( "blog_users",array(

	"user_nickname"        => $post_object['username'],
	"user_password"        => password_hash($post_object['password'], PASSWORD_DEFAULT),
	"user_email"		   => $post_object['email'],
	"user_image" 		   => $post_object['avatar'],
	"user_role"			   => "user",
	"user_doc"			   => time(),
	"user_status"		   => "active"

));

}

/**
*
*	Before submiting user to database
*	we must check did user already 
*	exists
*
*/
public function username_exists( $username ){

return $this->db->get_where( "blog_users", array(

	"user_nickname" => $username

) )->num_rows();

}

/**
*
*	Return all users
*	from database.. 
*
*/
public function users(){
return $this->db->get("blog_users")->result();
}

/**
*
*	Remove user from database
*	using nickname
*
*/
public function delete_user( $user_id ){
	return $this->db->delete( "blog_users", array(
		"user_nickname" => $user_id
	) );
}

/**
*
*	Change user status from active
*	to blocked
*
*/
public function block_user( $user_id ){

	$this->db->where( "user_nickname", $user_id );
	$data = array(
		"user_status" => "blocked"
	);
	return $this->db->update( "blog_users", $data );

}

public function unblock_user( $user_id ){

	$this->db->where( "user_nickname", $user_id );
	$data = array(
		"user_status" => "active"
	);
	return $this->db->update( "blog_users", $data );

}

/**
*
*	Become Admininstrator on request
*
*/
public function update_admin_role( $user_id ){
	$this->db->where("user_nickname", $user_id);
	$data = array(
		"user_role" => "admin"
	);
	return $this->db->update("blog_users", $data);
} 


public function update_email( $user_id, $new_email ){
	$this->db->where("user_nickname", $user_id);
	$data = array(
		"user_email" => $new_email
	);
	return $this->db->update("blog_users", $data);
}

public function update_user_role( $user_id ){
	$this->db->where("user_nickname", $user_id);
	$data = array(
		"user_role" => "user"
	);
	return $this->db->update("blog_users", $data);
} 

/**
*
*	Login method!
*	This method will login user
*	and determinate is user have
*	admin privilegies
*
*	FORM DATA
*	*username
*	*password
*
*/
public function login($form_data){
	if( !empty($form_data) ){

		// Get data from matchin username
		$user_temp = $this->db->get_where(
			"blog_users", 
			[
				"user_nickname" => $form_data["username"]
			]
		)->result()[0];

		if( $user_temp->user_id ){

			if( password_verify( $form_data["password"], $user_temp->user_password ) ){

				if( $user_temp->user_status == "active" ){

					$this->session->set_userdata(md5("user_rblog"), $user_temp);

					return true;

				} else {
					return false;
				}

			}

		} else{

			return false;
		
		}

	}else{
		return false;
	}
}

/* Count all registerred users */
public function countAllUsers(){
	return $this->db->get("blog_users")->num_rows();
}

public function countAllAdmins(){
	return $this->db->get_where("blog_users", [ "user_role" => "admin" ])->num_rows();
}

/** Send meesage for reseting */
public function reset_password($user_nickname){
	return $this->db->insert("blog_messages", array(

		"message_author" => $user_nickname,

		"message_content" => "I have lost password! Please reset my password!",

		"message_date"   => time(),

		"message_reciever" => "admin",

		"message_seen"  => "unread",

		"message_title" => "I have lost password"

	));
}

}