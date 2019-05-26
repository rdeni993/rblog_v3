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

		<h4><strong>Create New Category</strong></h4>
		<p>Create new Category</p>
		<br />

		<div>
			<form method="post" action="<?php echo site_url('admin/create_cat'); ?>">
				<label>New post</label><br />
				<input type="text" name="cat_title" class="input"><br /><br />
				<button class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Finish</button>
			</form>
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
