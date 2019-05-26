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
		<div class="row main-profile">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-12">
						<br />
						<h4>Podaci o korisniku <span class="text-muted"><?php echo $me->user_nickname; ?></span></h4>
						<hr />
					</div>
					<div class="col-sm-3">
						<img src="<?php echo ER::ImgSrc( "avatars/" . $me->user_image); ?>" alt="profile_picture" class="img main_profile_picture" />
					</div>
					<div class="col-sm-9 text-left main_user_details">
						<p class="text-muted">nickname</p>
						<p><strong><?php echo $me->user_nickname; ?></strong></p>
						<p class="text-muted">email</p>
						<p><strong><?php echo $me->user_email; ?></strong></p>
						<p class="text-muted">user role</p>
						<p><strong><?php echo $me->user_role; ?></strong></p>
						<br />
						<a href="#"><span class="glyphicon glyphicon-erase"></span> Obrisi moj profil</a>
						<br /><br />
						<a href="<?php echo site_url('message'); ?>"><span class="glyphicon glyphicon-envelope"></span> Kontakt sa administratorom</a>
						<br />
						<br />
						<form method="post" action="<?php echo site_url('me/service_change_email'); ?>">
							<label>New email address</label><br />
							<input type="email" name="new_email" placeholder="email@some.thing" /><br /><br />
							<button class="btn btn-primary">Promijeni</button>
						</form>
					</div>
					<div class="col-sm-12 text-justify">
						<br /><hr />
						<h4><span class="glyphicon glyphicon-warning-sign"></span> Zasto vam je potreban profil</h4>
						<p class="text-justify">Smatram da svaki korisnik treba i mora biti upoznat sa nacinom koristenja njegovih podataka. RBLOG od korisnika zahtjeva da izradi nalog koji ce omoguciti korisniku da pristupi privatnim objavama bloga. Od korisnika se ocekuje da izradi nalog koristeci email adresu i jedinstveno korisnicko ime koje ce ga uciniti jedinstvenim.</p>
						<p class="text-justify">Buduci da koristite e-mail nalog RBLOG se obavezuje da ce izuzetno pazljivo postupati sa vasim podacima i nece ih zloupotrebaljvati.</p>
						<p class="text-justify">RBLOG koristi vas email iskljucivo za komunikaciju sa vama(prilikom odgovaranja na postavljena pitanja) i nece biti prikazan nikome osim administratorima Web stranice i vas.</p>
						<p class="text-justify">RBLOG se obavezuje da nece <strong>koristiti vas email u svrhe marketinga</strong> niti ce biti prikazan ostalim korisnicima na blogu!</p>
						<p>Vase korisnicke ime ce biti vas jedini identifikator na blogu i <strong>bice prikazan na svakoj vasoj aktivnosti koju poduzmete blogu (komentarisanje, otvaranje objava, slanja poruka ili pristupa chatu, itd!)</strong></p>
						<p><strong>Vase podatke u svakom trenutku mozete da obrisete u potpunosti sto ce povuci sa sobom brisanje svakog traga koji ste ostavili na blogu!</strong></p>
						<p>Ako imate bilo kakvih nejasnoca ili problema sa razumijevanjem koristenja vasih podatak obratite nam se u porukom!</p>
					</div>
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