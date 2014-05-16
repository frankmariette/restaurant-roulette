<?php

  require_once 'php-sdk/src/temboo.php';
  session_start();
  session_destroy();
  session_start();
  $temboo = new Temboo_Session('karrde00', 'phpApp', '11059e32e2c5434c909982c68ba7afcf');
  $_SESSION['temboo'] = $temboo;
  

  // Instantiate the Choreo, using a previously instantiated Temboo_Session object, eg:
  // $session = new Temboo_Session('karrde00', 'APP_NAME', 'APP_KEY');
  $initializeOAuth = new Foursquare_OAuth_InitializeOAuth($temboo);

  // Get an input object for the Choreo
  $initializeOAuthInputs = $initializeOAuth->newInputs();

  // Set inputs
  $initializeOAuthInputs->setForwardingURL("http://local.myroulette.com/authorize.php")->setClientID("MI1TFEE1DDT3FKE32X3L5ZLVAG24W4DKY3IHDSHROKDSJTAT");

  // Execute Choreo and get results
  $initializeOAuthResults = $initializeOAuth->execute($initializeOAuthInputs)->getResults();

?>


<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <script type="text/javascript" src="js/jquery-1.11.0.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript">

  </script>
</head>
<body>
<div class="container-full">
<!-- top navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       <div class="container">
      <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".sidebar-nav">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="index.php">Next Meal</a>
      </div>
       </div>
    </div> 

      <div class="row">
       
        <div class="col-lg-12 text-center v-center">
          
          <h1>Nextmeal.me</h1>
          <p class="lead">Use Foursquare for automation or simply use manual inputs</p>
          
          <br><br><br>
          
          <form class="col-lg-12">
            <div class="input-group" style="width:340px;text-align:center;margin:0 auto;">  
              <button class="btn btn-lg btn-primary pull-left" type="button" onclick="window.location.href='options.php'">Foursquare</button>
              <button class="btn btn-lg btn-primary pull-right" type="button" onclick="window.location.href='manual.php'">Guest Access</button>
            </div>
          </form>
        </div>
        
      </div> <!-- /row -->
</div> <!-- /container full -->
</body>
</html>