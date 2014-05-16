<!DOCTYPE html>
<html>
<head>
	<title>Next Meal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/manual.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-1.11.0.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery-ui-10.4.custom.js"></script>
	<script type="text/javascript" src="js/navbar.js"></script>
	<style type="text/css">
		div.container{
			text-align: center;
		}
		input.restaurant{
			margin-top: 10px;
		}

	</style>

	<script type="text/javascript">


		// Used to keep track of number of restaurant input fields.
		var restaurantCounter = 0;
		

		// Creates an array of places currently in que and selects a choice randomly from the array.
		function pickPlace(){
			var min = 0;
			var data = $('.restaurant').toArray();
			var rand = getRandomInt(min, data.length-1);
			$('#result').remove();

			console.log(rand);

			$('.clearfix').after('<div id="result"><scan style="color: white;">You should go to ' + data[rand].value + '!</div>');
			
		};
		function getRandomInt(min, max) {
		  return Math.floor(Math.random() * (max - min + 1)) + min;
		}

		function addPlace(){
			$('#buttons').before('<div><input type="text" placeholder="Restaurant" class="form-control restaurant ' + restaurantCounter + '" required></div>');

			restaurantCounter++;
		};

	</script>
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
           <a class="navbar-brand" href="index.php">Next Meal</a>
    	</div>
       </div>
    </div> 
	<div class="container">
		<h1>Next Meal</h1>
		<div>
			<form action="pickPlace();" method="" class="form-group" >
				<div>
					<input type="text" placeholder="Restaurant" class="form-control restaurant" required>
				</div>
				<div>
					<input type="text" placeholder="Restaurant" class="form-control restaurant" required>
				</div>
				<div id="buttons">
					<button type="button" class="btn btn-primary pull-left" id="add" onclick="addPlace();"><span class="glypicon glyphicon-plus"> Add Restaurant</span></button>
					<button type="button" class="btn btn-success pull-right" id="submit" onclick="pickPlace();">Pick a place!</button>
				</div>
			</form>
			<div class="clearfix"></div>
		</div>
		</div>
	</div>
</body>
</html>