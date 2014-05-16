<?php
  require_once 'php-sdk/src/temboo.php';
  session_start();
  session_destroy();
  session_start();
  $temboo = new Temboo_Session('karrde00', 'phpApp', '11059e32e2c5434c909982c68ba7afcf');
  $_SESSION['temboo'] = $temboo;
  
  // Instantiate the Choreo, using a previously instantiated Temboo_Session object, eg:
  // $session = new Temboo_Session('karrde00', 'APP_NAME', 'APP_KEY');
  $finalizeOAuth = new Foursquare_OAuth_FinalizeOAuth($temboo);

  print_r($finalizeOAuth);

  // Get an input object for the Choreo
  $finalizeOAuthInputs = $finalizeOAuth->newInputs();

  // Set inputs
  $finalizeOAuthInputs->setCallbackID($initializeOAuthResults->getCallbackID())->setClientSecret("FSNUTZ32UTBG1WPJ45OCCNL1QGOPOJGNVWYTWRHE2XHUUO0D")->setClientID("MI1TFEE1DDT3FKE32X3L5ZLVAG24W4DKY3IHDSHROKDSJTAT");

  // Execute Choreo and get results
  $finalizeOAuthResults = $finalizeOAuth->execute($finalizeOAuthInputs)->getResults();

  $_SESSION['OAuthResults'] = $finalizeOAuthResults;

  header('Location: index.php');

?>