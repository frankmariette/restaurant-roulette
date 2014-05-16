<?php
	session_start();
	if(isset($_POST['submit'])){
		$_SESSION['city'] = $_POST['city'];
		$_SESSION['state'] = $_POST['state'];
		
		if(isset($_POST['latitude'])){
			$_SESSION['latitude'] = $_POST['latitude'];
			$_SESSION['longitude'] = $_POST['longitude'];
		}

		header('Location: ./auto.php');
	}

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
	<link rel="stylesheet" type="text/css" href="css/options.css">

	<script type="text/javascript" src="js/jquery-1.11.0.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/navbar.js"></script>
	<script type="text/javascript">s
		function getLocation(){
		  if (navigator.geolocation){
		    navigator.geolocation.getCurrentPosition(showPosition);
		  }
		}

		function showPosition(position){
		  longitude = position.coords.longitude;
		  latitude = position.coords.latitude;

		  console.log(longitude + ',' +  latitude)
		  $('form').append("<input type='hidden' name='latitude' value="+latitude+"><input type='hidden' name='longitude' value="+longitude+">");
		}
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
   		<h1>Enter a location</h1>
		<form class="form-group" method="post" action="<?=$_SERVER['PHP_SELF'] ?>">
			<div class="">
				<div>
					<input type="text" class="options form-control" name="city" placeholder="City" >
				</div>
				<div>
					<input type="text" class="options form-control" name="state" placeholder="State" >
				</div>

				<div>
					<button type="submit" class="btn btn-success" name="submit">Submit!</button>
				</div>
			</div>
		</form>
	</div>



</body>
</html>