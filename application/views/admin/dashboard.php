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

			<div class="alert alert-info">
				<strong>Welcome to rblog portal CMS!</strong> 
			</div>

			<div class="well well-lg">
				<span class="text-uppercase">Current statistic</span>
				<table class="table table-responsive table-clear">
					<tr>
						<td><span class="glyphicon glyphicon-pencil"></span> <a href="#" class="btn btn-link">Posts <span class="badge"><?php echo $countedPosts; ?></span></a></td>
					</tr>
					<tr>
						<td><span class="glyphicon glyphicon-comment"></span> <a href="#" class="btn btn-link">Comments <span class="badge badge-danger">disabled</span></a></td>
					</tr>
					<tr>
						<td><span class="glyphicon glyphicon-user"></span> <a href="#" class="btn btn-link">Users <span class="badge"><?php echo $countedUsers; ?></span></a></td>
					</tr>
					<tr>
						<td><span class="glyphicon glyphicon-lock"></span> <a href="#" class="btn btn-link">Admins <span class="badge"><?php echo $countedAdmins; ?></span></a></td>
					</tr>
					<tr>
						<td><span class="glyphicon glyphicon-folder-open"></span> <a href="#" class="btn btn-link">Categories <span class="badge"><?php echo $countedCats; ?></span></a></td>
					</tr>
				</table>
			</div>

			<div class="well well-lg">
				<span class="text-uppercase">Most popular posts</span>
				<table class="table table-responsive table-clear">
					<?php if(!empty($mostPopular)): ?>
						<?php foreach($mostPopular as $post): ?>
					<tr>
						<td><span class="glyphicon glyphicon-pencil"></span> <a href="<?php echo site_url('post/' . $post->post_slug ); ?>" class="btn btn-link"><?php echo $post->post_title; ?> <span class="badge"><?php echo $post->post_views; ?></span></a></td>
						<td><span class="glyphicon glyphicon-calendar"></span> <?php echo date("Y-d-m", $post->post_date_of_change); ?></td>
					</tr>
						<?php endforeach; ?>
					<?php endif; ?>

				</table>
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
