/**
*
*
*
*
*/

var accept_agreement = 0;

function activateMe(){
	alert("Buhaaaa");
}

$(document).ready(function(){

// Set Featured image
$("#set-feat-img").click(function(e){

	// Prevent from submiting form
	e.preventDefault();

});

// Create Simple post preview using
// Bootstrap 3.3 Modal 
$(".btn-post-preview").click(function(e){
	/** Using post method via AJAX */
	/** Then sort data, setup preview */
	/** and isplay in modal */
	$.post(

		/* Load URL */
		basePath.base_url + "admin/get_post",

		/* Send PARAMS */
		{ "post_id" : $(this).attr("data-post-id") },

		/* Callback */
		function( data ){

			if( data ){

				// Parse JSON
				var blogPost = JSON.parse(data)[0];

				// Format Data for module
				// Set Up blog for preview
				$(".modal-title").text(blogPost.post_title);
				$(".modal-post-content").html(blogPost.post_content);
				$(".modal-tags").html( "<i>" + blogPost.post_tags + "</i>" );
				$(".modal-category").text(blogPost.post_category);
				$(".modal-author").text(blogPost.post_author);
				$(".modal-date").html(Unix_timestamp_date(blogPost.post_date_of_change));
				$(".featured-image").html("<img src='" + basePath.base_url + "upload/" + blogPost.post_featured_img_path + "' alt='featured-img' class='featured-image-preview'/>")

				// Create Modal
				$("#post-preview-modal").modal();

			} else {

				alert("Error Module!");

			}

		}

	);

});

/**
*
*	Create Script for upload file
*	We will replacing classic upload
*	button with custom upload button.
*
*/
$(".myUploadButton").click(function(){
	$(".hidenUploadButton").click();
});

$(".uploadButton").click(function(){
	$("#uploadFileForm").submit();
});

$("#uploadFileForm input[type='file']").change(function(){
	
	// Take thr value
	var file = document.getElementById("upFile").files[0];

	// Print this
	$(".uploadFilePath").text(file.name);
	$(".uploadFileSize").text( "Filesize: " + ( file.size / 1024 / 1024).toFixed(2) + " MB" );

});

/**
*
*	Control Media File
*	This will open window for controlling
*	file. 
*
*/
$(".mediaControlButton").click(function(){

	// Prepare modal
	$(".controledFile").text($(this).attr("data-path"));

	//Open Modal
	$("#modalControlMedia").modal();

});

// Rename media
$(".renameMedia").click(function(){

	$(".rename-file-form").slideDown();

});

$(".rename-file-btn").click(function(){

	// Sendpost request
	$.post(

		// Path
		basePath.base_url + "admin/renameFile",

		{

			// Oldname taken from head
			"oldname" : $(".controledFile").text(),

			// New name taken from form
			"newname" : $(".mediaNewName").val()

		}, function( data ){

			// Data
			var status = JSON.parse(data);

			if( status.status == 200 ){

				// Show result
				$(".file-rename-status").slideDown();

			} else {

				// Show result
				$(".file-rename-f-status").slideDown();
			}

		}

	);

});

/**
*
*	Inside media modal we need to confirm
*	deleting file. So we need to enable bootstrap 3 
*	confirmation....
*
*/
$('[data-toggle=confirmation]').confirmation({
  rootSelector: '[data-toggle=confirmation]',
  // other options
  onConfirm : function(){

  	// If user confirm just
  	// send request to service for media
  	// deleting ( PHP of course )
  	$.post(

  		// URL
  		basePath.base_url + "admin/deleteFile",
  		// Send only one param
  		{ "filename" : $(".controledFile").text() },
  		// Callback
  		function(data){

  			// Parse 
  			var status = JSON.parse( data );

  			if( status.status == 200 ){

  				alert("File is deleted!");

  			} else {

  				alert("File is not deleted");

  			}

  		}

  	);

  }
});

/**
*
*	Set Featured iamge
*
*/
$("#set-feat-img").click(function(e){

	// Prevent form submit
	e.preventDefault();

	// Load images
	$.get(
	
		//
		basePath.base_url + "admin/listImages",

		// callback
		function(data){

			// files
			var files = JSON.parse(data);

			// images
			var images = "";

			// List
			files.forEach(function(file){

				images += "<article class='img-preview'>";
				images += "<a href='#' data-img='" + file + "' class='activeFeatured'>";
				images += "<img data-bind='" + file + "' src='" + basePath.base_url + "upload/" + file + "' alt='featuredImg' />";
				images += "</a>";
				images += "</article>";

			});

			// print
			$(".listImagesHere").html(images);

		}

	);

	// Open modal
	$("#modalControlFeatured").modal();

});

$(document).on( "click", ".activeFeatured", function(data){

	data.preventDefault();

	$("input[name='post_featured']").val( $(this).attr("data-img") );

	$("img[alt='featuredImg']").css("border", "2px solid #eee");

	$("img[data-bind='" + $(this).attr("data-img") + "']").css("border", "2px solid #2a4c84");

	console.log($(this).attr("data-img"))
	
});

/**
*
*	Open Post option
*
*/
$(".btn-post-control").click(function(){

	// 
	$(".activated-post").val( $(this).attr("data-post-id") );

	// Open Modal
	$("#post-option-modal").modal();


});

// Delete post
$("#delete-post").confirmation({

	rootSelector : "#delete-post",

	onConfirm : function(){

		// Send request
		$.post(

			// URL
			basePath.base_url + "admin/delete_post",

			// Params
			{

				"post_id" : $(".activated-post").val()

			}, function(data){

				// 
				var reportStatus = JSON.parse(data);

				if( reportStatus.status == 200 ){

					$(".deletePostStatusSuccess").slideDown();

					location.reload();

				} else {

					$(".deletePostStatusFailed").slideDown()

				}

			}

		);

	}

});

/**
*
*	Delete Category
*
*/
$(".delete-cat").confirmation({

	title : "Are you sure you want delete this Category. This will erase all post in this category",

	rootSelector : ".delete-cat",

	onConfirm : function(){

	//
	var catId = $(this).attr("data-cat-id");
	var catTitle = $(this).attr("data-cat-title");

	//
	$.post(

		basePath.base_url + "admin/delete_cat",

		{
			"cat_id" : catId,
			"cat_title" : catTitle

		}, function(data){
			var status = JSON.parse(data);

			if( status.status == 200 ){
				location.reload();
			}

		}

	);
}

});

/**
*
*	Edit post is button
*	which will just redirect
*	to controller
*
*/
$(".edit-post-button").click(function(){
	console.log("Submited");
	$("#edit-post-form").submit();
});

/**
*	Create avatar from menu we have
*/
$(".avatar-button").click(function(formData){

	// Prevent Form submit
	formData.preventDefault();

	// Change image border
	$(".avatar-button").css("border-color", "#888");
	$(this).css("border", "3px solid #4286f4");
	console.log("Image is choosen: avatar" + $(this).attr("data-avatar") );

	// Change input form
	$("input[name='avatar']").val( "avatar" + $(this).attr("data-avatar") + ".png" );

});

/**
*
*	Prepare form for user register
*
*/
$("#finish-registration").click(function(formData){

// Disable Form submiting
//formData.preventDefault();
console.log("Proccess is started!");

// Select default avatar
if( !$("input[name='avatar']").val() ){
	$("input[name='avatar']").val("avatar1.png");
}

// Start validation
// For validation we use
// jquery script...
$("#user-register-form").validate({

	rules: {

		// set rules for username
		'username' : {
			required : true,
		},

		// set rules for email
		'email' : {
			required : true,
			email : true
		},

		// Set rules for password
		'password' : {
			required : true,
			minlength : 8

		},
		'password_repeat' : {
			equalTo : "input[name='password']"
		},

		// GDPR rules
		'gdpr-agreed' : {
			required : true
		},
		'gdpr-terms'  : {
			required : true
		},
		'gdpr-username-agreed' : {
			required : true

		}

	},

	// If something goes wrong
	invalidHandler : function(){
		console.log("Greska");
	},

	// On success
	submitHandler : function(form){
		form.submit();
	}

});
//Validation end here
});

/**
*
*
*/

$("#delete-me-button").confirmation({

	title : "Are you sure you want delete yourself.! This cannot be undone!",

	rootSelector : "#delete-me-button",

	onConfirm : function(){

		location.href( basePath.base_url + "me/service_delete_me" );

	}

});

/**
*
*	Remove user
*	on user request
*/
$(".remove-user-ad").confirmation({

	title : "Are you sure you want delete this user.! This cannot be undone!",

	rootSelector : ".remove-user-ad",

	onConfirm : function(){

		$.post(  

			basePath.base_url + "admin/delete_user",

			{ "user_nickname" : $(this).attr("data-id") },

			function(result){

				var status = JSON.parse(result);

				if( status.status == 200 ){

					console.log( "Korisnik je obrisan" );
					window.location.reload();

				}

			}

		);

	}

});

/**
*	Block user on
*	admin request
*/

$(".block-user-ad").confirmation({

	title : "Are you sure you want block this user.!",

	rootSelector : ".remove-user-ad",

	onConfirm : function(){

		$.post(  

			basePath.base_url + "admin/block_user",

			{ "user_nickname" : $(this).attr("data-id") },

			function(result){

				var status = JSON.parse(result);

				if( status.status == 200 ){

					console.log( "Korisnik je blokiran" );
					window.location.reload();

				}

			}

		);

	}

});


$(".unblock-user-ad").confirmation({

	title : "Are you sure you want unblock this user.!",

	rootSelector : ".remove-user-ad",

	onConfirm : function(){

		$.post(  

			basePath.base_url + "admin/unblock_user",

			{ "user_nickname" : $(this).attr("data-id") },

			function(result){

				var status = JSON.parse(result);

				if( status.status == 200 ){

					console.log( "Korisnik je deblokiran" );
					window.location.reload();

				}

			}

		);

	}

});

/**
*
*	Become administrator or
*	set up user
*
*/
$(".become-admin").confirmation({

	title : "Are you sure you want set this user as admin.!",

	rootSelector : ".remove-user-ad",

	onConfirm : function(){

		$.post(  

			basePath.base_url + "admin/become_admin",

			{ "user_nickname" : $(this).attr("data-id") },

			function(result){

				var status = JSON.parse(result);

				if( status.status == 200 ){

					console.log( "Korisnik je deblokiran" );
					window.location.reload();

				}

			}

		);

	}

});

$(".remove-admin").confirmation({

	title : "Are you sure you want remove this user privilegies.!",

	rootSelector : ".remove-user-ad",

	onConfirm : function(){

		$.post(  

			basePath.base_url + "admin/remove_admin",

			{ "user_nickname" : $(this).attr("data-id") },

			function(result){

				var status = JSON.parse(result);

				if( status.status == 200 ){

					console.log( "Korisnik je deblokiran" );
					window.location.reload();

				}

			}

		);

	}

});

/**
*
*	Open sliding menu
*
*/
$("#open-menu").click(function(e){
	e.preventDefault();

	if($("body").css("overflow") != "hidden"){

		$("body").css("overflow", "hidden");

	}else{
		$("body").css("overflow-y", "scroll");
	}

	$(".mobile-select").slideToggle();
});

/**
*
*	Check di user already exists
*	in database..
*
*/
$("input[name='username']").blur(function(){
	$.post(

		basePath.base_url + 'login/user_exists',

		{ "username" : $(this).val() },

		function(result){
			var answer = JSON.parse(result);

			if( answer.status == 404 ){
				// User exists
				// alert
				$(".user-exists").show();
				// Disable form
				$("#finish-registration").attr("disabled", "disabled");
			} else {

				// Enable button
				$("#finish-registration").removeAttr("disabled");

			}

		}

	);
});

/**
*
*
*
*/

/**
*
*	END SCRIPT
*
**/

});