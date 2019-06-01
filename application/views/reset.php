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
		<form method="POST" action="<?php echo site_url('login/user_reset'); ?>">
			<div class="col-sm-12 user-login-page">
				<div class="row login-box  v3-login-box">
					<div class="col-sm-12"><h1>Zatraži novu lozinku</h1></div>
					<div class="col-sm-12 start-div">
						<input type="text" placeholder="Korisnicko ime" name="username">
					</div>
					<div class="col-sm-12">
						<label></label>
						<button class="btn btn-primary">Zatrazi novu lozinku</button><br />
					</div>
					<div class="col-sm-12">
						<br /><p>Ukoliko zatrazite novu lozinku administratori ce pregledati zahtjev i na e-mail adresu poslati novu lozinku koju cete koristiti!</p>
						<p>Zahtjev moze potrajati i do 24sata</p>
					</div>
				</div>
			</div>
		</form>
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