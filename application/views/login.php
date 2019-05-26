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
		<form method="POST" action="<?php echo site_url('login/user_login'); ?>">
			<div class="col-sm-12 user-login-page">
				<div class="row login-box">
					<div class="col-sm-3 login-title"><h1>Login</h1></div>
					<div class="col-sm-9 empty-cell">f</div>
					<div class="col-sm-12 start-div">
						<span class="glyphicon glyphicon-user"></span>
						<input type="text" placeholder="Korisnicko ime" name="username">
					</div>
					<div class="col-sm-12">
						<span class="glyphicon glyphicon-lock"></span>
						<input type="password" placeholder="Lozinka" name="password">
					</div>
					<div class="col-sm-2">
						<label></label>
						<button class="btn btn-primary">Prijavi se</button>
					</div>
					<div class="col-sm-10">
						<label></label>
						<a href="<?php echo site_url('login/reset'); ?>" class="btn btn-link">Izgubila/o sam lozinku!</a>
						<a href="<?php echo site_url('register'); ?>" class="btn btn-link">Izradi novi nalog!</a>
					</div>
					<?php if( @$_GET["error"] == 1 ): ?>
					<div class="col-sm-13">
						<div class="alert" role="alert">
							<span class="glyphicon glyphicon-remove"></span> Korisnik sa ovim podacima ne postoji u nasoj bazi podataka!
						</div>
					</div>
					<?php elseif( @$_GET["error"] == 2 ): ?>
					<div class="col-sm-13">
						<div class="alert" role="alert">
							<span class="glyphicon glyphicon-ok"></span> Uspjesno ste registrovani u nasu bazu podataka! Sada se mozete prijaviti na nas blog!
						</div>
					</div>
					<?php elseif( @$_GET["error"] == 3 ): ?>
					<div class="col-sm-13">
						<div class="alert" role="alert">
							<span class="glyphicon glyphicon-ok"></span> Vi niste administrator!
						</div>
					</div>
					<?php endif; ?>
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