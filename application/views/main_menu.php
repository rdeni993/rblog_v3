<ul class="b-font main-menu-mobile">
	<?php if( !empty($cats) ): ?>
		<?php foreach( $cats as $cat ): ?>
			<li><a href="<?php echo strtolower(site_url('category/index/' . $cat->cat_title )); ?>"><?php echo $cat->cat_title; ?></a></li>
		<?php endforeach; ?>
	<?php endif; ?>
	<li><a href="<?php echo strtolower(site_url('policy')); ?>">izjava o privatnosti</a></li>

</ul>