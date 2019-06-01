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
		<div class="row main-profile v3-blog-post v3-profile">
			<div class="col-sm-12 text-center">
				<div class="text-center"><h1 class="v3-first-letter"><?php echo $me->user_nickname[0]; ?></h1></div>
				<h3><span class="text-muted">Podaci o korisniku</span> <?php echo $me->user_nickname; ?></h3>
				<br />
				<hr />
				<br />
				<div class="row text-left">
					<div class="col-sm-4 v3-data-list">
						<h4>Osnovni podaci</h4>
						<ul>
							<li><b>Nadimak:</b> <?php echo $me->user_nickname; ?></li>
							<li><b>E-mail:</b> <?php echo $me->user_email; ?></li>
							<li><b>Vrsta naloga:</b> <?php echo $me->user_role; ?></li>
							<li><b>Datum prijave:</b> <?php echo date("d/m/Y h:i", $me->user_doc); ?></li>
						</ul>
					</div>
					<div class="col-sm-4">
						<h4>Promjena podataka</h4>						
						<form method="post" action="<?php echo site_url('me/service_change_email'); ?>">
							<label>New email address</label><br />
							<input type="email" name="new_email" placeholder="email@some.thing" /><br /><br />
							<button class="btn btn-primary">Promijeni</button>
						</form>
					</div>
					<div class="col-sm-4">
						<h4>Aktivnost korisnika</h4>
						<b>U pripremi</b>
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