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

		<h4>All users</h4>

		<div class="row">
			<?php if(!empty($users)): ?>
				<?php foreach($users as $user): ?>
					<div class="col-sm-4 admin-list-user">
						<img src="<?php echo ER::ImgSrc('avatars/' . $user->user_image ); ?>" alt="profile_avatar" />
						<ul>
							<li><span class="glyphicon glyphicon-user"></span> <?php echo $user->user_nickname; ?></li>
							<li><span class="glyphicon glyphicon-calendar"></span> <?php echo $user->user_doc; ?></li>
							<li><span class="glyphicon glyphicon-envelope"></span> <?php echo $user->user_email; ?></li>
							<li><span class="glyphicon glyphicon-flag"></span> <?php echo $user->user_role; ?></li>
						</ul>	
						<br />					
						<div class="btn-group">
							<?php if( $user->user_status == "active" ): ?>
								<button data-id="<?php echo $user->user_nickname; ?>" type="button" class="btn btn-danger block-user-ad"><span class="glyphicon glyphicon-ban-circle"></span></button>
							<?php else: ?>
								<button data-id="<?php echo $user->user_nickname; ?>" type="button" class="btn btn-default unblock-user-ad"><span class="glyphicon glyphicon-repeat"></span></button>
							<?php endif; ?>
								<button data-id="<?php echo $user->user_nickname; ?>" type="button" class="btn btn-warning remove-user-ad"><span class="glyphicon glyphicon-erase"></span></button>
							<?php if( $user->user_role == "user" ): ?>
								<button data-id="<?php echo $user->user_nickname; ?>" type="button" class="btn btn-primary become-admin"><span class="glyphicon glyphicon-flag"></span></button>
							<?php else: ?>
								<button data-id="<?php echo $user->user_nickname; ?>" type="button" class="btn btn-primary remove-admin"><span class="glyphicon glyphicon-remove"></span></button>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
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
