<!DOCTYPE html>
<html>
<head>
	<title>rblog.me</title>

	<!-- Load Font -->
	<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Aleo|Baloo+Thambi|Noto+Sans" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo base_url() . 'assets/img/logo.png' ?>" />

	<title></title>

	<!-- Load Font -->
	<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Aleo|Baloo+Thambi|Noto+Sans" rel="stylesheet"> 


	<!-- Load bootstrap CSS Files -->
	<link rel="stylesheet" type="text/css" href="<?php echo ER::load('node_modules/bootstrap/dist/css/bootstrap.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo ER::load('node_modules/bootstrap/dist/css/bootstrap-grid.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo ER::load('node_modules/bootstrap/dist/css/bootstrap-reboot.css'); ?>" />
	<?php echo ER::LoadCss("basic_style") . "\n"; ?>
	<?php echo ER::LoadCss("m_style") . "\n"; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8" />


	<!-- Load Javascript -->
	<?php echo ER::LoadJs("jquery") . "\n"; ?>
	<?php echo ER::LoadJs("config") . "\n"; ?>
	<?php echo ER::LoadJs("script") . "\n"; ?>

	<!-- Bootstrap Javascript files -->
	<script type="text/javascript" src="<?php echo ER::load("node_modules/bootstrap/dist/js/bootstrap.js"); ?>"></script>

	<!-- Load confirmation -->
	<script type="text/javascript" src="<?php echo ER::load('node_modules/bootstrap-confirmation2/bootstrap-confirmation.min.js'); ?>"></script>

	<!-- Load JS Validator -->
	<script type="text/javascript" src="<?php echo ER::load('node_modules/jquery-validation/dist/jquery.validate.min.js'); ?>"></script>

</head>
<body class="disable-overflow">

<?php if( !isset($_COOKIE[md5("rblog_first_visit")]) ): ?>
	<div class="cookie-info">
		<p>Blog www.rblog.me koristi kolačiće kako bi poboljšao iskustvo korištenja bloga. Sve podatke o zaštiti podataka, korištenju kolačića i metodi kako ih isključiti možete pronaći na <a href="<?php echo site_url('policy'); ?>">stranici o zaštiti podataka korisnika</a></p>
		<br />
		<a href="<?php echo site_url('policy/set_cookie'); ?>" class="cookie-button">Slažem se sa korištenjem kolačića</a>
	</div>
<?php endif; ?>
<!-- Google Analytics -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135040288-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-135040288-1');
</script>

