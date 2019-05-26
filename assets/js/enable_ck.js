/**
*	This script is used to enable CK Editor inside
*	new post screen.
*	
*	This will be only used if user open
*	admin/new_post page..
*/
$(document).ready(function(){


	CKEDITOR.replace("cke");

/*
var editor = ClassicEditor.create( document.querySelector( '#cke' ),{

	image : toolbar['imageTextAlternative']

} ).then( editor => {


var editor = ClassicEditor.create( document.querySelector( '#cke' ) ).then( editor => {

	editor.ui.view.editable.editableElement.style.height = '300px';	
    console.log( editor );
} ).catch( error => {
        console.error( error );
} );

*/


});