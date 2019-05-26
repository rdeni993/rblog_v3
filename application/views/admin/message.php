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

			<?php if( !empty($message) ): ?>
				
				<h4 class="text-muted">From: <?php echo $message->message_author; ?></h4>
				<h4 class="text-muted">Date: <?php echo date("Y-M-D h:i", $message->message_date); ?></h4>
				<h3><?php echo $message->message_title; ?></h3>

				<blockquote><?php echo $message->message_content; ?></blockquote>

				<hr />
				<a href="<?php echo site_url('admin/delete_message?id=' . $message->message_id ); ?>">Delete this message!</a>

			<?php else: ?>
				<br />
				<h4>Empty for now!</h4>
				<br />
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
