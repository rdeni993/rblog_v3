<?php

defined("BASEPATH") or die("No direct access to script!");

/**
*	Control messages
*	database
*/

class Message_model extends CI_Model
{
	
	public function list_messages(){
		$this->db->order_by("message_date", "desc");
		return $this->db->get("blog_messages")->result();
	}

	public function get_message($mid){
		return $this->db->get_where("blog_messages", ["message_id" => $mid])->result()[0];
	}

	public function delete_message($mid){
		return $this->db->delete("blog_messages", ["message_id" => $mid]);
	}

	public function list_unread(){
		return $this->db->get_where("blog_messages", ["message_seen" => "unread"])->result();
	}

	public function send_message($mess){

		$user = $this->session->userdata(md5("user_rblog"));

		$add = "<br /><br /><br /><br /><b>Odgovoriti mozete na</b><br /><i>". $user->user_email ."</i>";

		return $this->db->insert("blog_messages", [

			"message_author" => $user->user_nickname,
			"message_title"  => $mess["mess_title"],
			"message_content"=> $mess["mess_body"] . $add ,
			"message_reciever" => "admin",
			"message_seen"   => "unread",
			"message_date"   => time()

		]);
	}

	public function seen($mid){

		$this->db->where(["message_id" => $mid]);
		$this->db->set("message_seen", "seen");

		return $this->db->update("blog_messages");
	}

}