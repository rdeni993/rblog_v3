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

			<strong>All created posts</strong>
			<br />
			<br />
			<!-- Posts -->
			<?php if( !empty($posts) ): ?>
				<table class="table table-striped post-preview">
					<tr>
						<th>POST_ID</th>
						<th>POST_TTILE</th>
						<th>POST_SLUG</th>
						<th>POST_DATE</th>
						<th>POST_CONTROL</th>
					</tr>

					<?php foreach( $posts as $post ): ?>
						<tr>
							<td><span><?php echo $post->post_id; ?></span></td>
							<td><span><?php  
								if( strlen($post->post_title) < 30 ){
									echo $post->post_title;
								} else{
									echo substr( $post->post_title, 0 , 30 );
								}
							?></span></td>
							<td><span><?php echo $post->post_slug; ?></span></td>
							<td><span><?php echo date("Y-M-d", $post->post_date_of_create); ?></span></td>
							<td>
								<button data-post-id="<?php echo $post->post_id; ?>" class="btn-post-preview btn btn-primary">
									<span class="glyphicon glyphicon-eye-open"></span>
								</button>
								<button data-post-id="<?php echo $post->post_id; ?>" class="btn-post-control btn btn-primary">
									<span class="glyphicon glyphicon-cog"></span>
								</button>
							</td>
						</tr>
					<?php endforeach; ?>

				</table>
			<?php else: ?>
				<p>Currently no posts! :(</p>
			<?php endif; ?>

		</div>

		<div class="col-sm-12">
			Footer
		</div>

	</div>

</div>

<!-- Create empty post modal... -->
<!-- We will use it for post preview -->

<!-- Modal -->
<div id="post-preview-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      	<div class="row">
        	<div class="col-sm-12 featured-image">
        	</div>
        </div>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
        <p class="modal-tags"></p>
      </div>
      <div class="modal-body">
        <div class="modal-post-content"></div>
        <div class="model-post-details row">
        	<div class="col-sm-4">
        		<label>Date</label>
        		<p class="modal-date">2011-Mar-03</p>
        	</div>
        	<div class="col-sm-4">
        		<label>Category</label>
        		<p class="modal-category">Developing</p>
        	</div>
        	<div class="col-sm-4">
        		<label>Author</label>
        		<p clasS="modal-author">rdeni993</p>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--  -->
<div id="post-option-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Post Options</h4>
        <p class="modal-tags"></p>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-sm-12">
      			 <div class="btn-group">
      			 <form id="edit-post-form" method="post" action="<?php echo site_url('admin/edit_post'); ?>">
      			 	<input type="hidden" name="post_id" class="activated-post">
      			 </form>
				  <button type="button" class="btn btn-primary edit-post-button"><span class="glyphicon glyphicon-cog"></span> Edit</button>
				  <button type="button" id="delete-post" class="btn btn-primary"><span class="glyphicon glyphicon-erase"></span> Erase</button>
				  <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span> Open post</button>
				</div> 
      		</div>
      		<div class="col-sm-12">
      			<br />
      			<div class="deletePostStatusSuccess">
			  		<strong><span class="glyphicon glyphicon-ok"></span> Success!</strong> Your post is successfully deleted
				</div>
        		<div class="deletePostStatusFailed">
			  		<strong><span class="glyphicon glyphicon-ok"></span> Success!</strong> Your post is not deleted!
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
