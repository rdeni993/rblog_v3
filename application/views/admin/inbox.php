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

		<h4><strong>Inbox</strong></h4>

			<?php if( !empty($messages) ): ?>
				<br /><br />
				<table class="table table-stripped">
					<tr>
						<th>Message Author</th>
						<th>Message Title</th>
						<th>Message Date</th>
						<th>Message Status</th>
					</tr>

				<?php foreach($messages as $post): ?>
					<tr>
						<td><a href="<?php echo site_url('admin/message?id=' . $post->message_id ); ?>"><?php echo $post->message_author; ?></a></td>
						<td>
							<?php if($post->message_seen == "unread"): ?>

								<strong><?php echo $post->message_title; ?></strong>
							<?php else: ?>

								<?php echo $post->message_title; ?>

							<?php endif; ?>
								
						</td>
						<td><?php echo date("Y-M-d, h:i"); ?></td>
						<td><?php echo $post->message_seen; ?></td>
					</tr>
				<?php endforeach; ?>
				</table>
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
