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
		<form method="POST" action="<?php echo site_url('register/save'); ?>" id="user-register-form">
		<div class="col-sm-12 user-login-page">
			<div class="row login-box">
				<div class="col-sm-3 login-title"><h1>Register</h1></div>
				<div class="col-sm-9 empty-cell">f</div>
				<div class="col-sm-12 start-div">
					<span class="glyphicon glyphicon-user"></span>
					<input type="text" placeholder="Korisnicko ime" name="username">
<<<<<<< HEAD
					<div class="user-exists">Username already exists</div>
=======
>>>>>>> 1833af15b69c183c571db5cb8023f379e6e7b86f
				</div>
				<div class="col-sm-12">
					<span class="glyphicon glyphicon-envelope"></span>
					<input type="text" placeholder="Email" name="email">
				</div>
				<div class="col-sm-12">
					<span class="glyphicon glyphicon-lock"></span>
					<input type="password" placeholder="Lozinka" name="password">
				</div>
				<div class="col-sm-12">
					<span class="glyphicon glyphicon-repeat"></span>
					<input type="password" placeholder="Ponovi Lozinku" name="password_repeat">
				</div>
				<div class="col-sm-12 select-avatars">
					<label for="avataras">Izaberi avatara</label>
					<input type="hidden" name="avatar" />
					<?php for ( $i = 1; $i <= 16; $i++): ?>
						<button type="button" class="avatar-button" data-avatar="<?php echo $i; ?>">
							<img src="<?php echo ER::ImgSrc('avatars/avatar' . $i . '.png'); ?>" class="img img-rounded img-avatar" />
						</button>
					<?php endfor; ?>
				</div>
<<<<<<< HEAD

				<div class="col-sm-12 text-left form-terms">
					<div class="check text-left">
						<input type="checkbox" name="gdpr-agreed" value="agreed" />
						<span>Slažem se da se moji podaci koriste u svrhu komunikacije između administratora i mene!</span>
					</div>

					<div class="check text-left">
						<input type="checkbox" name="gdpr-username-agreed" value="agreed" />
						<span>Slažem se da se moje korisničko ime prikazuje prilikom komentarisanja objava!</span>
					</div>
					<div class="check text-left">
						<input type="checkbox" name="gdpr-terms" value="agreed" />
						<span>Pročitao sam <a href="<?php echo site_url('policy'); ?>">pravila</a> korištenja web stranice i prihvatam sve uslove koji su tamo navedeni!</span>
					</div><br />
					<div class="accept-warnings"><br />Ako zelite izraditi nalog potrebno je da se slozite sa svim uslovima. U protivnom ne mozemo da obezbjedimo pravilno funkcionisanje stranice!</div>
				</div>

=======
>>>>>>> 1833af15b69c183c571db5cb8023f379e6e7b86f
				<div class="col-sm-3">
					<label></label>
					<button class="btn btn-primary" id="finish-registration">Registriraj se</button>
				</div>
				<div class="col-sm-9">
					<label></label>
					<a href="<?php echo site_url("login"); ?>" class="btn btn-link">Imam nalog</a>
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