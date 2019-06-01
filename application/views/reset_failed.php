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
		</div>

		<!-- Page Content -->
		<div class="row v3-blog-post">
			<div class="col-sm-12 text-center v3-blog-post">
				<h4><span class="glyphicon glyphicon-ok"></span></h4>
				<div class="alert alert-success" role="alert">
					<p>Automatski sistem za provjeru je ustanovio da nemate pravo koristiti ovaj racun!</p>
				</div>
			</div>
		</div>
		<!-- Page Content EOF -->

	</div>
</div>

<?php 

/**
*
*	End page with footer script
*	this will execute on every end
*	We loading file
*
*	@ /views/footer.php
*
*/

echo $footer;

?>