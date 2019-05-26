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

			<h4><strong>Uploaded Files</strong></h4>
			<p>Content of folder uploads/</p>
			<table class="table table-striped file-preview">
				<tr>
					<th><span class="glyphicon glyphicon-cog"></span></th>
					<th>Media Name</th>
					<th>Media Type</th>
					<th>Media Size</th>
					<th>Upload date</th>
				</tr>
				<?php if( !empty($files) ): ?>
					<?php foreach( $files as $file ): ?>
						<tr>
							<td><button class="mediaControlButton" data-path="<?php echo $file['file_name']; ?>"><span class="glyphicon glyphicon-cog"></span></button></td>
							<td><span><?php echo $file["file_name"]; ?></span></td>
							<td><span><?php echo $file["file_ext"]["extension"]; ?></span></td>
							<td><span><?php echo $file["file_size"] . " MB"; ?></span></td>
							<td><span><?php echo $file["file_date"]; ?></span></td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<p>No files uploaded!</p>
				<?php endif; ?>
			</table>

		</div>

		<div class="col-sm-12">
			Footer
		</div>

	</div>

</div>

<!-- This modal will help to control -->
<!-- Media files.. -->
<!-- Trigger the modal with a button -->
<!-- Modal -->
<div id="modalControlMedia" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title controledFile">Modal Header</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-sm-12">
        		<h4>Choose the option</h4>
        	</div>
        	<div class="col-sm-6">
        		<button class="btn btn-primary renameMedia">Rename</button>
        		<button class="btn btn-danger removeMedia" data-toggle="confirmation">Delete</button>
        	</div>
        	<br />
        	<div class="col-sm-12 rename-file-form">
        		<br />
        		<label>Enter new name:</label><br />
        		<input type="text" class="mediaNewName" name="mediaNewName" />
        		<button class="btn btn-warning rename-file-btn">Rename</button>
        	</div>
        	<div class="col-sm-12">
        		<div class="alert alert-success file-rename-status">
			  		<strong><span class="glyphicon glyphicon-ok"></span> Success!</strong> Your file is now renamed! You need to refresh page!
				</div>
        		<div class="alert alert-danger file-rename-f-status">
			  		<strong><span class="glyphicon glyphicon-ok"></span> Success!</strong> Your file is not renamed!
				</div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?php 

// Load Footer
echo $footer;
?>
