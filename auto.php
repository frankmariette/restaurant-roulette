<?php
	require_once 'php-sdk/src/temboo.php';

	session_start();

	if(isset($_SESSION['city'])){
		// Instantiate the Choreo, using a previously instantiated Temboo_Session object, eg:
		//$session = new Temboo_Session('karrde00', 'APP_NAME', 'APP_KEY');
		$explore = new Foursquare_Venues_Explore($_SESSION['temboo']);


		$userLocation = $_SESSION['city'] . ', ' . $_SESSION['state'];

		// Get an input object for the Choreo
		$exploreInputs = $explore->newInputs();

		// Set credential to use for execution
		$exploreInputs->setCredential('PHP');

		// Set inputs
		$exploreInputs->setResponseFormat("json")->setNear($userLocation)->setLimit("50");

		// Execute Choreo and get results
		$exploreResults = $explore->execute($exploreInputs)->getResults();
		
		
		$results = json_decode($exploreResults->getResponse(),true);
		$results = $results['response']['groups'][0]['items'];


		
		$venueArray = array();

		for ($i = 0; $i < sizeof($results); $i++){
			 array_push($venueArray, $results[$i]['venue']);
		}
		shuffle($venueArray);

		$selectedVenue = $venueArray[0];
		$formattedPhone = "";
		$twitter = "";
		$website = "";

		$formattedPhone = ($selectedVenue['contact']['formattedPhone'] === null) ? " " : $selectedVenue['contact']['formattedPhone'];
		$twitter = ($selectedVenue['contact']['twitter'] === null) ? " " : $selectedVenue['contact']['twitter'];
		$website = ($selectedVenue['url'] === null) ? " " : $selectedVenue['url'];

		// Instantiate the Choreo, using a previously instantiated Temboo_Session object, eg:
		// $session = new Temboo_Session('karrde00', 'APP_NAME', 'APP_KEY');
		$venueDetail = new Foursquare_Venues_VenueDetail($_SESSION['temboo']);

		// Get an input object for the Choreo
		$venueDetailInputs = $venueDetail->newInputs();

		// Set credential to use for execution
		$venueDetailInputs->setCredential('PHP');

		// Set inputs
		$venueDetailInputs->setVenueID($selectedVenue['id']);

		// Execute Choreo and get results
		$venueDetailResults = $venueDetail->execute($venueDetailInputs)->getResults();
		//$json_a = json_decode($exploreResults->getResponse());

		//print_r(get_class_methods($exploreResults->getResponse()));

		$venueDetails = $venueDetailResults->getResponse();


	
	} else{
		header('Location: ./options.php');
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta char-set='utf-8'>
	<title>NextMeal.me</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		a{
			color: blue;
		}
	</style>
	<script type="text/javascript" src="js/jquery-1.11.0.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/navbar.js"></script>
	<script type="text/javascript">
  		function getRandomInt(min, max) {
		  return Math.floor(Math.random() * (max - min + 1)) + min;
		}

  		function pickPlace(){
			var min = 0;
			var data = document.getElementsByClassName('ui-selected');
			//console.log(data);
			var rand = getRandomInt(min, data.length-1);
			//$('#result').remove();

			//console.log(rand);
			//console.log(data);

			// $('button').after('<div id="result"><scan style="color: green;">You should go to ' + data[rand].innerText + '!</scan></div>');
  		};
	</script>
	

</head>
<body>
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

<div class="page-container">
<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Eat Here
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?= $selectedVenue['name']?></h4>
      </div>
      <div class="modal-body">
      	<h5>Contact Info</h5>
    	Phone:<?= $formattedPhone ?><br>
    	Twitter:<a href="http://twitter.com/<?=$twitter?>" target="_blank"><?= $twitter ?></a><br>
    	Website: <a href="<?=$website?>" target="_blank"><?= $website ?></a><br>
        <address>
		  <?= $selectedVenue['location']['address'] ?><br>
		  <?= $selectedVenue['location']['city']?>, <?= $selectedVenue['location']['state'] ?><?= $selectedVenue['location']['postalCode']?><br>
		</address>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>