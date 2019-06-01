<ul class="b-font main-menu-mobile">
	<li><a href="<?php echo strtolower(base_url()); ?>">Početna stranica</a></li>
	<?php if( !empty($cats) ): ?>
		<?php foreach( $cats as $cat ): ?>
			<li><a href="<?php echo strtolower(site_url('category/index/' . $cat->cat_title )); ?>"><?php echo $cat->cat_title; ?></a></li>
		<?php endforeach; ?>
	<?php endif; ?>

	<!-- v3 -->
	<?php if(@!$_SESSION[md5("user_rblog")]): ?>
		<li><a href="<?php echo strtolower(site_url('login')); ?>">Prijavi se</a></li>
	<li><a href="<?php echo strtolower(site_url('register')); ?>">Izradi nalog</a></li>
    <?php else: ?>
		<li><a href="<?php echo strtolower(site_url('me')); ?>">Moj Profil</a></li>
		<li><a href="<?php echo strtolower(site_url('login/logout')); ?>">Odjava</a></li>
    <?php endif; ?>
	<li><a href="<?php echo strtolower(site_url('policy')); ?>">izjava o privatnosti</a></li>

</ul>