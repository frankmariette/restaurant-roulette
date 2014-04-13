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
	<title>R-Picker Options</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-1.11.0.js"></script>
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
<h1 onclick="top.location.href='index.php'">Restaurant Roulette</h1>
<form class="form-group" method="post" action="<?=$_SERVER['PHP_SELF'] ?>">
	<div>
		<input type="text" class="options form-control" name="city" placeholder="City" >
	</div>
	<div>
		<input type="text" class="options form-control" name="state" placeholder="State" >
	</div>

	<div>
		<button type="submit" class="btn btn-success" name="submit">Submit!</button>
	</div>
</form>

</body>
</html>