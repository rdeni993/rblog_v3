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
				<h1>Pravila o zaštiti privatnosti</h1>
				<p>Ova stranica omogućava korisnicima uvid u način korištenja njihovih podataka koje prikupljamo na web stranici www.rblog.me</p>
				<p>Web stranica www.rblog.me objavljuje besplatan sadržaj informativnog karaktera koji je dostupan svima uz iznimku da pojedini sadržaj je namjenjen isključivo korisnicima koji imaju svoj nalog.</p>
				<p>Sve informacije koje prikupljamo od strane korisnika su sigurni zbrinute i svako narušavanje njihove tajnosti će povlačiti obavještavanje korisnika!</p>
				
				<h1>Koje podatke prikupljamo</h1>
				<p>www.rblog.me prikuplja određene informacije o korisnicima kako bi stranica funkcionisala!</p>
				<p>Informacije koje prikupljamo su sledeće</p>
				<ul>
					<li>Adresa E-pošte (<span class="text-muted">E-mail adresa</span>)</li>
					<li>Korisničko ime ( <span class="text-muted">Poželjno je izbjegavati prava imena i prezimena</span>)</li>
					<li>Lozinka profila (<span class="text-muted">Preporučujemo da se ne koristi lozinka e-pošte</span>)</li>
					<li>Podaci o pregledavanju stranice(<span class="text-muted">Broj posjeta, i istorija posjeta</span>)</li>
					<li>Operativni sistem</li>
					<li>Kolačići(<span class="text-muted">Ispod teksta malo opširnije</span>)</li>
				</ul>

				<p>U slučaju bilo kakave promjene u korištenju podataka svaki korisnik biće obaviješten e-poštom!</p>

				<p>U slučaju bilo kakve nejasnoće ili straha od zloupotrebe podataka obratite se administratorima putem kontakt forme.</p>

				<h1>Kako prikupljamo podatke</h1>
				<p>Podatke prikupljamo na dva načina:</p>
				<ul>
					<li><b>Web forma</b></li>
					<li><b>Automatski</b></li>
				</ul>

				<p>Podaci koje prikupljamo putem web formi su e-mail, korisničko ime i lozinka.</p>
				<p>Podaci koje prikupljamo automatski su podaci o pregledavanju objava, podaci o operativnom sistemu i kolačići.</p>

				<h1>Svrha prikupljanja podataka</h1>
				<p>www.rblog.me korisnicima pruža podatke informacionog karaktera koje su <u>uglavnom</u> dostupne svima.</p>
				<p>Pojedine objave su privatne i dostupne su samo korisnicima koji imaju registrovan nalog na web stranici.</p>
				<p>Korisničko ime i lozinka su podaci koji su važni za identifikaciju naloga. Korisničko ime je podatak koji je vidljiv svim korisnicima kroz komentare i neka druga mjesta gdje korisnik ostavlja trag.</p>
				<p>E-pošta je podatak koji je nevidljiv svim drugim korisnicima koji su na stranici i ni u jednom trenutku neće biti dostupan javnosti.</p>
				<p>E-pošta se koristi za komunikaciju između administratora i korisnika i neće se koristiti za slanje promotivnog materijala ili marketinške poruke!</p>
				<p>Svi ostali podaci se koriste isključivo u informativne svrhe!</p>
				<p><b>Nijedan podatak se neće koristit bez pristanka korisnika niti će u bilo kom trenutku biti prodan trećoj strani bez pristanka.</b></p>

				<h1>Kolačići</h1>
				<p>Kolačići (eng. cookie) su mali paketi podataka nevidljivi korisnicima koji se upotrebljavaju za pohranu i primanje podataka o računarima, telefonima, te ostalim uređajima sa kojih korisnik pristupa stranici.</p>
				<p>Kolačići se koriste u svrhu poboljšanja funkcionalnosti web stranice.</p>
				<p>www.rblog.me koristi kolačiće sesije(session id kolačiće) koji omogućavaju korisnicima da ostanu aktivni na stranici kako ne biste morali da ih ponovo ukucavate svaki put kada napustite stranicu.</p>
				<p>Podaci koje spremamo ne koristi lične podatke korisnika nego samo podatke vezane za nalog na stranici www.rblog.me</p>

				<p>Pojedini kolačići su neophodni za funkcionisanje web stranice i zato je potrebno da ostanu uključeni ali to je lični izbor korisnika!</p>

				<h3>Kolačići treće strane</h3>
				<p>Kolačići treće strane predstavljaju kolačiće koje na vaš računar postavlja neko drugi a ne vlasnik web stranice!</p>
				<p>Aplikacija koju koristi stranica www.rblog.me za statiskiku ( Google Analytics ) može na vaš računar postaviti svoje kolačiće i mi nad tim kolačićima nemamo apsolutno nikakvu kontrolu!</p>

				<h1>Kontakt forma</h1>
				<p>Kontakt forma je mogućnost korisnika da potraži pomoć, postavi pitanja ili čak zatraži promjenu lozinke od administratora!</p>
				<p>Kontakt forma je dostupna isključivo registrovanim korisnicima!</p>
				<p>Prilikom kontakta korisnik administratoru šalje svoje podatke, korisničko ime, sadržaj poruke i vaša adresa e-pošte.</p>
				<p>Administratore </p>

				<h1>Prava korisnika</h1>
				<p>Svaki korisnik koji izradi nalog na stranici www.rblog.me može u bilo kom trenutku obrisati svoj nalog sa svog profila uz nepovratno brisanje svakog traga njegovog postajanja!</p>
				<p>Svaki korisnik prije izrade naloga može da se obrati administratorima za sve dodatne informacije o pravima i zaštiti podataka!</p>
				<p>Svaki korisnik u bilo kom trenutku može da kontaktira administrare i zatraži informacije o korištenju njegovih podataka!</p>

				<h1>Prava administratora</h1>
				<p>Administrator ne odgovara za komentare od strane bilo kog korisnika!</p>
				<p>Administrator zadržava pravo brisanja bilo kog podatka od strane korisnika!</p>
				<p>U slučaju zapostavljanja naloga administrator ima pravo da obriše bilo koji nalog!</p>

				<h1>Kontrola kolačića</h1>
				<p>Prilikom prve posjete web stranici svaki korisnik će biti obaviješten o kolačićima!</p>
				<p>Ako se ne slažete ili ne želite da budu pohranjeni na Vaš računar možete ih obrisati na sljedeći način:</p>
				<ul>
					<li><a href="https://support.mozilla.org/en-US/kb/clear-cookies-and-site-data-firefox">Brisanje kolačića Mozilla Firefox</a></li>
					<li><a href="https://support.google.com/chrome/answer/95647?co=GENIE.Platform%3DDesktop&hl=en">Brisanje kolačića Google Chrome</a></li>
					<li><a href="https://tools.google.com/dlpage/gaoptout">Isključivanje kolačića Google Analytics</a></li>
				</ul>

				<p>Nadamo se da ćete uživati prilikom korištenja web stranice www.rblog.me!</p>
			<br /><br /><br />
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