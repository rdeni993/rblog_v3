<!-- Login Bar -->
<div class="col-sm-12 text-right login-bar-menu">
	<?php if(@!$_SESSION[md5("user_rblog")]): ?>
	<div class="btn-group">
		<a href="<?php echo site_url(); ?>" class="btn btn-empty"><span class="glyphicon glyphicon-home"></span></a>
		<button class="btn">|</button>
		<a href="<?php echo site_url("register"); ?>" class="btn btn-empty">Sign Up</a>
		<button class="btn">or</button>
		<a href="<?php echo site_url("login"); ?>" class="btn btn-empty">Login</a>
	</div>
	<?php else: ?>
	<div class="btn-group">	
		<a class="btn btn-empty"><?php echo $_SESSION[md5("user_rblog")]->user_nickname; ?></a>
		<button class="btn">|</button>
		<a title="Ostavite poruku administratorima!" class="btn btn-empty" href="<?php echo site_url('message'); ?>"><span class="glyphicon glyphicon-envelope"></span></a>
		<button class="btn">|</button>
		<?php if( Admin_login::amIAdmin() ): ?>
		<a title="Otvorite CMS sistem" href="<?php echo site_url("admin"); ?>" class="btn btn-empty"><span class="glyphicon glyphicon-dashboard"></span></a>
		<button class="btn">|</button>
		<?php endif; ?>
		<a href="<?php echo site_url(); ?>" class="btn btn-empty"><span class="glyphicon glyphicon-home"></span></a>
		<button class="btn">or</button>
		<a href="<?php echo site_url("login/logout"); ?>" class="btn btn-empty">Logout</a>
	</div>
	<?php endif; ?>
</div>