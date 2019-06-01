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
			<div class="col-sm-12 blog-posts v3-blog-posts">
				
				<!-- v3 -->
				<article class="v3-most-visited-posts row">
					<div class="col-sm-12 text-left">
						<h3>Najpopularnije</h3>
						<br />
					</div>
					<?php if(!empty($top_viewed_posts)): ?>
					<div class="col-sm-4">
						<article>
							<img class="feat-post-img" src="<?php echo base_url() . "upload/" . $top_viewed_posts[0]->post_featured_img_path; ?>" alt="feat-cover" />
							<h5><?php echo $top_viewed_posts[0]->post_category; ?></h5>
							<a href="<?php echo site_url('post/' . $top_viewed_posts[0]->post_slug ); ?>"><h4><?php echo $top_viewed_posts[0]->post_title; ?></h4></a>
							<p>
								<?php echo substr(strip_tags($top_viewed_posts[0]->post_content), 0, 100); ?>
								<?php if( strlen($top_viewed_posts[0]->post_content) > 100 ): ?>
									...
								<?php endif; ?>
							</p>
						</article>
					</div>
					<div class="col-sm-4">
						<article>
							<img class="feat-post-img" src="<?php echo base_url() . "upload/" . $top_viewed_posts[1]->post_featured_img_path; ?>" alt="feat-cover" />
							<h5><?php echo $top_viewed_posts[1]->post_category; ?></h5>
							<a href="<?php echo site_url('post/' . $top_viewed_posts[1]->post_slug ); ?>"><h4><?php echo $top_viewed_posts[1]->post_title; ?></h4></a>
							<p>
								<?php echo substr(strip_tags($top_viewed_posts[1]->post_content), 0, 100); ?>
								<?php if( strlen($top_viewed_posts[1]->post_content) > 100 ): ?>
									...
								<?php endif; ?>
							</p>
						</article>
					</div>
					<div class="col-sm-4">
						<article>
							<img class="feat-post-img" src="<?php echo base_url() . "upload/" . $top_viewed_posts[2]->post_featured_img_path; ?>" alt="feat-cover" />
							<h5><?php echo $top_viewed_posts[2]->post_category; ?></h5>
							<a href="<?php echo site_url('post/' . $top_viewed_posts[2]->post_slug ); ?>"><h4><?php echo $top_viewed_posts[2]->post_title; ?></h4></a>
							<p>
								<?php echo substr(strip_tags($top_viewed_posts[2]->post_content), 0, 100); ?>
								<?php if( strlen($top_viewed_posts[2]->post_content) > 100 ): ?>
									...
								<?php endif; ?>
							</p>
						</article>
					</div>
					<?php endif; ?>
				</article>
				<!-- v3 -->

				<?php if(!empty($posts)): ?>
					<?php foreach($posts as $post): ?>
						<article class="b-font">
							<?php if(@$post->post_featured_img_path): ?>
							<!--<img class="feat-post-img" src="<?php echo base_url() . "upload/" . $post->post_featured_img_path; ?>" alt="feat-cover" /> -->
							<?php endif; ?>
							<ul>
								<!-- v3 removed <li class="blog-cat-label text-uppercase"><?php echo $post->post_category; ?></li> -->
								<li class="text-uppercase"><?php echo $post->post_category; ?></li>
							</ul>
							<a class="" href="<?php echo site_url('post/' . $post->post_slug ); ?>"><h1><?php echo $post->post_title; ?></h1></a>
							<div class="post-preview">
								<?php echo substr($post->post_content, 0, 400); ?>
								<?php if( strlen($post->post_content) > 400 ): ?>
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