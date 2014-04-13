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
		$exploreInputs->setResponseFormat("json")->setNear($userLocation)->setLimit("10");

		// Execute Choreo and get results
		$exploreResults = $explore->execute($exploreInputs)->getResults();
		//print_r($exploreResults->getResponse());
		
		// echo '<script>';
		// echo "var a = ";
		// print_r(($exploreResults->getResponse()));
		// echo ";";
		// echo "console.log(a);";
		// echo '</script>';
		
		$results = json_decode($exploreResults->getResponse(),true);
		$results = $results['response']['groups'][0]['items'];


		//print_r($results);
		$nameArray = array();

		for ($i = 0; $i < sizeof($results); $i++){
			 array_push($nameArray, $results[$i]['venue']['name']);
		}

		//$json_a = json_decode($exploreResults->getResponse());

		//print_r(get_class_methods($exploreResults->getResponse()));


	
	} else{
		header('Location: ./options.php');
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta char-set='utf-8'>
	<title>Restaurant Roulette</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
	  #feedback { font-size: 1.4em; }
	  #selectable .ui-selecting { background: #FECA40; }
	  #selectable .ui-selected { background: #F39814; color: white; }
	  #selectable { list-style-type: none; margin: 0 auto; padding: 0; width: 60%; }
	  #selectable li { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }
	</style>

	<script type="text/javascript" src="js/jquery-1.11.0.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript">
		$(function() {
    		$( "#selectable" ).selectable();
  		});	

  		function getRandomInt(min, max) {
		  return Math.floor(Math.random() * (max - min + 1)) + min;
		}

  		function pickPlace(){
			var min = 0;
			var data = document.getElementsByClassName('ui-selected');
			//console.log(data);
			var rand = getRandomInt(min, data.length-1);

			//console.log(rand);
			//console.log(data);

			$('button').after('<div id="result"><scan style="color: green;">You should go to ' + data[rand].innerText + '!</scan></div>');
  		};
	</script>
	

</head>
<body>
<h1>Select at least 2 venues</h1>
<div class="container">
	<div class="selection">
	<p id="feedback"></p>
		<ul id="selectable">
			<?php
			for($i = 0; $i < sizeof($nameArray); $i++){
			  echo "<li class='ui-widget-content'>". $nameArray[$i]." </li>";
			}
			?>
		</ul>

		<button type="button" onclick="pickPlace();"class="btn btn-success">Submit</button>
	</div>
</body>
</html>