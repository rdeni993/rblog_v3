<?php
defined("BASEPATH") or exit("Direct access to script is forbidden");

/**
*
*	Its time for new Model
*	This model will take care about
*	Connect table categories with
*	APP
*
*/

class Cat_model extends CI_Model{
	
/**
*
*	This method we will take for
*   creating category in database
*
*/
public function listCats(){
	return $this->db->get("blog_category")->result();
}

/**
*
*	Create new category
*
*/
public function newCategory( /** Cat Object */ $catObject ){
	return $this->db->insert("blog_category", array( 

		"cat_title"   => $catObject['cat_title'],
		"cat_created" => time()

	));
}

/**
*
*	Delete Category
*
*/
public function deleteCat( /** cat ID */ $catID ){
	return $this->db->delete("blog_category", array(

		"cat_id" => $catID

	));
}



/* Count cats */
public function countAllCats(){
	return $this->db->get("blog_category")->num_rows();
}


}