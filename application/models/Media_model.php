<?php 
defined("BASEPATH") or exit("Direct access to script is not allowed");

/**
*
*	=====================================
*	Model Media
*	=====================================
*
*	One of most sensitive part of website
*	Uploading media to media folder..
*
*/
class Media_model extends CI_Model{

/**
*
*	This class is related to folder uploads/
*	So it will control only files from that folder
*
*/
public function get_files(){

	/** Open directory uploads */
	$files = scandir("upload/");

	/** Formated array */
	$file_structured = [];

	foreach( $files as $file ){

		// Create file object 
		$temp_array = [

			// File name
			"file_name"         => $file,
			
			// File size 
			"file_size"    => number_format(filesize( "upload/" . $file  ) / ( 1024 * 1024 ), "2"),

			// File Extension
			"file_ext"     => pathinfo( "upload/" . $file ),

			// File Created
			"file_date"    => date("Y-M-d", filemtime( "upload/" . $file ) ) 

		];

		// Save it to real array
		array_push($file_structured, $temp_array);
		unset($temp_array);

	}

	// Return real array
	return $file_structured;

}

/**
*
*	Rename file using this model
*
*/
public function rename( /** Oldfile */ $oldfile, /** Nwfile */ $newfile ){

	return rename( "upload/" . $oldfile , "upload/" . $newfile);

}

/**
*
*	Delete file from folder
*
*/
public function delete( /** Delete file */ $filename ){

	return unlink( "upload/" . $filename );

}

/**
*
*	List images
*
*/
public function listImages(){

	// images are stored in upload
	// file--
	$images = scandir( "upload/" );

	// This will keep real images form
	// directory
	$dir_img = array();

	// Now images are array
	// where are stored all files
	foreach ($images as $file) {
		
		// Allowed images format
		$allowed_formats = [ "jpg", "jpeg", "img", "bmp", "gif", "png" ];

		// Check is file actually a image
		$file_ext = pathinfo( "upload/" . $file );

		if( in_array($file_ext["extension"], $allowed_formats) ){

			array_push($dir_img, $file);

		}

	}

	return $dir_img;

}

}

