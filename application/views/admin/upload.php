<?php

/**
*
*	Hello!!
*	This is a dashboard of my own
*	CI CMS...
*
*	This is basic place where every admin
*	will start..... In this file script expect
*	two var to be available,
*
*		# header
*		# footer
*
*	@author Denis Ristic
*	@version 1.0
*
*/

// Load Header file
echo $header;

?>

<div class="container-fluid disable-space">

	<div class="row">

		<div class="col-sm-12">
			<?php echo $top_menu; ?>
		</div>

		<div class="col-sm-4">
			<?php echo $left_menu; ?>
		</div>

		<div class="col-sm-8 dashboard">

		<h4><strong>Upload new file</strong></h4>
		<p>Upload new file </p>
		<br />
		<br />
		<br />

		<form id="uploadFileForm" method="POST" action="<?php echo site_url('admin/upload_file'); ?>" enctype="multipart/form-data">
			<input type="file" id="upFile" class="hidenUploadButton" name="blog_file" />
			<input type="hidden" name="uploadsubmit" value="true" />
		</form>		

		<div class="row">
			<div class="col-sm-12">
				<a class="myUploadButton">
					<span class="glyphicon glyphicon-picture"></span>
					<span class="uploadFilePath">Click to upload</span>
				</a>
				<br />
				<br />
				<p class="uploadFileSize"></p>
				<hr />
				<button class="uploadButton btn btn-success"><span class="glyphicon glyphicon-open"></span> Upload</button>
			</div>
		</div>

		</div>

		<div class="col-sm-12">
			Footer
		</div>

	</div>

</div>

<?php 

// Load Footer
echo $footer;
?>
