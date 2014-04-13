<?php
	require_once 'php-sdk/src/temboo.php';
	session_start();
	session_destroy();
	session_start();
	$temboo = new Temboo_Session('karrde00', 'phpApp', '11059e32e2c5434c909982c68ba7afcf');
	$_SESSION['temboo'] = $temboo;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Roulette</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-1.11.0.js"></script>
	<style type="text/css">
		a{
			text-decoration: none;
			color: white;
		}
		a:hover{
			text-decoration: none;
			color: white;
		}
	</style>
</head>
<body>
<div class="container">
<div class="wrapper">
	<div class="title">
		<h1>Restaurant Roulette</h1>
		<h4>Choose a selection experience</h4>
	</div>
	<div>
		<button type="button" class="btn btn-primary" onclick="window.location.href='manual.php'">Manual</button>
		<button type="button" class="btn btn-primary" onclick="top.location.href='auto.php'">Automated</button>
	</div>

</div>

</body>
</html>