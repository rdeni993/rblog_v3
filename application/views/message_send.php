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
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<h1 class="text-left">Ostavite poruku administratorima!</h1>
				<p class="text-muted">Poruka moze biti kritika, predlozak za temu ili bilo sta drugo gdje vam administratori mogu pomoci! Odgovori ce stici najkasnije u roku 24h.</p>
				<form method="POST" action="<?php echo site_url('message/send_message'); ?>">
					<input type="text" name="mess_title" placeholder="Title" class="form-control">
					<br />
					<textarea name="mess_body" placeholder="Message" class="form-control"></textarea>
					<br />
					<button class="btn btn-primary">Posalji</button>
				</form>
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