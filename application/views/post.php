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
		<div class="row post-present v3-blog-post">
			<?php echo $login_bar; ?>

			<div class="col-sm-12 blog-posts post-view">
			<div class="col-sm-12 blog-posts post-view c-font">

			<?php if( !$post ): ?>
				<div class="locked-post text-center">
					<span class="glyphicon glyphicon-remove text-center"></span>
					<p>Objava ne postoji!</p>
				</div>
			<?php elseif( $post == "private" ):  ?>
				<div class="locked-post text-center">
					<span class="glyphicon glyphicon-lock text-center"></span>
					<p>Objava je zasticena!</p>
				</div>
			<?php else: ?>
			<article>
				<!-- Category -->
				<div class="text-center b-font">
					<a href="<?php echo strtolower(site_url('category/index/' . $post->post_category )); ?>"><span class="text-uppercase b-font"><?php echo $post->post_category; ?></span></a>
				</div>
				<!-- Title -->
				<h1 class="text-center b-font"><?php echo $post->post_title; ?></h1>

				<!-- About -->
				<ul class="text-center b-font">
					<li>Posted by <i><?php echo $post->post_author; ?></i></li>
					<li>|</li>
					<li>Posted on <i><?php echo date( "D, M d, Y", $post->post_date_of_change ); ?></i></li>
				</ul>

				<!-- Featured -->
				<?php if($post->post_featured_img_path): ?>
					<br />
					<br />
				<img class="feat-post-img" src="<?php echo base_url() . "upload/" . $post->post_featured_img_path; ?>" alt="feat-cover" />
				<br />
				<?php endif; ?>

				<br />
				<!-- Content -->
				<div class="post-content m-font-groove">
					<?php print($post->post_content); ?>
				</div>
			</article>	
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