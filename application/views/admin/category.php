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

		<h4><strong>Categories</strong></h4>
		<p>Below are listed all categories we are created so far..</p>

		<br />
		<table class="table file-preview">
			<tr>
				<th><span class="glyphicon glyphicon-cog"></span></th>
				<th>Category title</th>
				<th>Date of creation</th>
			</tr>
			<?php if( !empty($cats) ): ?>
				<?php foreach( $cats as $cat ): ?>
					<tr>
						<td><button class="delete-cat" data-cat-title="<?php echo $cat->cat_title; ?>" data-cat-id="<?php echo $cat->cat_id; ?>"><span class="glyphicon glyphicon-erase"></span></button></td>
						<td><?php echo $cat->cat_title; ?></td>
						<td><?php echo date("Y-M-d", $cat->cat_created); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<p>Currently no Categorys Created!</p>
			<?php endif; ?>
		</table>

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
