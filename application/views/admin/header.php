<!DOCTYPE html>
<html>
<head>
	<title>rblog.me</title>

	<title></title>


	<!-- Load bootstrap CSS Files -->
	<link rel="stylesheet" type="text/css" href="<?php echo ER::load('node_modules/bootstrap/dist/css/bootstrap.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo ER::load('node_modules/bootstrap/dist/css/bootstrap-grid.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo ER::load('node_modules/bootstrap/dist/css/bootstrap-reboot.css'); ?>" />
	<?php echo ER::LoadCss("style") . "\n"; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo base_url() . 'assets/img/logo.png' ?>" />



	<!-- Load Javascript -->
	<?php echo ER::LoadJs("jquery") . "\n"; ?>
	<?php echo ER::LoadJs("config") . "\n"; ?>
	<?php echo ER::LoadJs("script"); ?>

	<!-- Bootstrap Javascript files -->
	<script type="text/javascript" src="<?php echo ER::load("node_modules/bootstrap/dist/js/bootstrap.js"); ?>"></script>

	<!-- Load CKEditor -->
	<script type="text/javascript" src="<?php echo ER::load('node_modules/ckeditor/ckeditor.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo ER::load('node_modules/ckeditor/ckeditor5-build-classic/build/ckeditor.js'); ?>"></script>
	<?php echo ER::LoadJs("enable_ck"); ?>

	<!-- Load confirmation -->
	<script type="text/javascript" src="<?php echo ER::load('node_modules/bootstrap-confirmation2/bootstrap-confirmation.min.js'); ?>"></script>

</head>
<body class="disable-overflow">