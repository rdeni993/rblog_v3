<!-- This is reserverd for -->
<!-- mobile design -->
<div class="mobile-menu desktop-hidden">
	<ul>
		<li><a href="<?php echo site_url(); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
		<li><a href="#" id="open-menu" ><span class="glyphicon glyphicon-menu-hamburger"></span></a></li>
		<?php if(@!$_SESSION[md5("user_rblog")]): ?>
		<li><a href="<?php echo site_url('login'); ?>"><span class="glyphicon glyphicon-user"></span></a></li>
		<?php else: ?>
		<li><a href="<?php echo site_url('me'); ?>"><span class="glyphicon glyphicon-user"></span></a></li>
		<?php endif; ?>
		<li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
	</ul>
</div>

</body>
</html>