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
	<title>Next Meal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-1.11.0.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/navbar.js"></script>
</head>
<body> 
<div class="page-container">
	<!-- top navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       <div class="container">
    	<div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".sidebar-nav">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="#">Next Meal</a>
    	</div>
       </div>
    </div>
      
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-left">
        
        <!-- sidebar -->
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            <ul class="nav">
              <li class="active"><a href="/index.php">Home</a></li>
              <li><a href="/options.php">Automated</a></li>
              <li><a href="/manual.php">Manual</a></li>              
            </ul>
        </div>
	<div class="title">
		<h1>NextMeal</h1>
		<h4>Choose your experience</h4>
	</div>
	<div>
		<button type="button" class="btn btn-primary" onclick="window.location.href='manual.php'">Manual</button>
		<button type="button" class="btn btn-primary" onclick="top.location.href='auto.php'">Automated</button>
	</div>
</div>

</body>
</html>