<?php 

/**
*
*	Load header file
*	This file contain all style or js
*	scripts we have..
*
*/

echo $header;

?>

<div class="container-fluid h-100">
	<div class="col-sm-3 left-side">
		<div class="blog-menu">
			<div class="button-menu">
				<div class="search-box">
					<form method="GET" action="<?php echo site_url('search'); ?>">
						<input type="search" name="q" placeholder="Pretraga" />
						<button><span class="glyphicon glyphicon-search"></span></button>
					</form>
				</div>
			</div>
			<div class="main-menu mobile-select">
				<?php echo $main_menu; ?>
			</div>
			<div class="bottom-menu m-font">
				<h1>rblog.com</h1>
				<p>A journey of a thousand miles begins with a single step</p>
				<h6><small>&copy; All copyrights reserved!</small></h6>
			</div>
		</div>
	</div>
	<div class="col-sm-9 right-side">
		<div class="row">
			<?php echo $login_bar; ?>
			<div class="col-sm-12 blog-posts">

				<?php if(!empty($posts)): ?>
					<?php foreach($posts as $post): ?>
						<article class="b-font">
							<?php if(@$post->post_featured_img_path): ?>
							<img class="feat-post-img" src="<?php echo base_url() . "upload/" . $post->post_featured_img_path; ?>" alt="feat-cover" />
							<?php endif; ?>
							<ul>
								<li class="blog-cat-label text-uppercase"><?php echo $post->post_category; ?></li>
							</ul>
							<a class="" href="<?php echo site_url('post/' . $post->post_slug ); ?>"><h1><?php echo $post->post_title; ?></h1></a>
							<div class="post-preview">
								<?php echo substr($post->post_content, 0, 200); ?>
								<?php if( strlen($post->post_content) > 200 ): ?>
									...
								<?php endif; ?>
							</div>
							<br />
							<ul>
								<li>Posted by <i><?php echo $post->post_author; ?></i></li>
								<li>|</li>
								<li>Posted on <i><?php echo date( "D, M d, Y", $post->post_date_of_change ); ?></i></li>
							</ul>
						</article>
					<?php endforeach; ?>
				<?php else: ?>
					<h4>Nema trazenih objava!</h4>
				<?php endif; ?>

			</div>
			<div class="col-sm-12 text-center">
				<?php if($allPosts > 5): ?>
					<?php (int)$tabs = $allPosts / 5; ?>
					<ul class="pagination">
					<?php for( $i = 1; $i < ($tabs+1); $i++ ): ?>
						<?php if( $i == $current_page ): ?>
							<li class="active"><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
						<?php else: ?>
							<li><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
						<?php endif; ?>
					<?php endfor; ?>
					</ul>
				<?php endif; ?>
				<br /> 
				<span class="small text-muted">Pronadjeno <?php echo $allPosts; ?> rezultata</span>
			</div>
		</div>
	</div>
</div>

<?php 

/**
*
*	End page with footer script
*	this will execute on every end
*
*/

echo $footer;

?>