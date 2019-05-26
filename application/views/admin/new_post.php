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

			<!-- Script for creating new posts -->
			<form method="post" action="<?php echo site_url('admin/save_post'); ?>">

				<!-- Silent -->
				<input type="hidden" name="post_author" value="rdeni993" />

				<div class="row">
					<div class="col-sm-12">
						<input name="post_title" type="text" class="form-control input-lg" placeholder="Title..." />
						<br />
					</div>
					<!-- This is texteditor creadted by -->
					<!-- CK. -->
					<div class="col-sm-12">
						<textarea name="post_content" id="cke"></textarea>
					</div>
					<div class="col-sm-4">
						<br />
						<div class="form-group">
							<label for="sel1">Choose Category</label>
							<select name="post_category" class="form-control" id="sel1">
								<?php if(!empty($cats)): ?>
									<?php foreach($cats as $cat): ?>
										<option value="<?php echo $cat->cat_title; ?>"><?php echo $cat->cat_title; ?></option>
									<?php endforeach; ?>
								<?php endif; ?>
							</select>
						</div> 
					</div>
					<div class="col-sm-4">
						<br />
						<div class="form-group">
							<label for="sel1">Post privacy</label>
							<select name="post_privacy" class="form-control" id="sel1">
								<option value="draft">Don't publish</option>
								<option value="public">Public</option>
								<option value="private">For registered users</option>
							</select>
						</div> 
					</div>
					<div class="col-sm-4">
						<br />
						<div class="form-group">
							<label for="sel1">Set Featured image</label>
							<br />
							<button id="set-feat-img"><span class="glyphicon glyphicon-picture"></span> Choose</button>
							<input type="hidden" name="post_featured" />
						</div> 
					</div>
					<div class="col-sm-4">
						<label>Tags</label>
						<br />
						<textarea name="post_tags" class="form-control"></textarea>
						<br />
						<button class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Finish</button>
					</div>
					<div class="col-sm-8"></div>
				</div>
			</form>

		</div>

		<div class="col-sm-12">
			Footer
		</div>

	</div>

</div>

<!-- This modal will be open after user click
     to select featured image.. -->
<div id="modalControlFeatured" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title controledFile">Select Featured image</h4>
        <p>If your image is not listed maybe you should think about to <a href="<?php echo site_url("admin/upload"); ?>">Upload image!</a></p>
      </div>
      <div class="modal-body modal-lg">

      	<div class="listImagesHere">
      		
      	</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-check"></span> Finish</button>
      </div>
    </div>

  </div>
</div>

<?php 

// Load Footer
echo $footer;
?>
