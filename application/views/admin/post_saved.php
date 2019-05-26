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

			<?php if( $status == "success" ): ?>
			<div class="alert alert-success">
			  	<strong><span class="glyphicon glyphicon-ok"></span> Success!</strong> Your post is now saved to database!
			</div>
			<?php else: ?>
			<div class="alert alert-danger">
			  	<strong><span class="glyphicon glyphicon-warning-sign"></span> Failed!</strong> Your post is not saved to database!
			</div>
		<?php endif; ?>

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
