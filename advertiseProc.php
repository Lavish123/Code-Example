
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	

	<!--iOS -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="css/normalizeLoader.css">
	<link rel="stylesheet" href="css/mainLoader.css">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>
	<style type="text/css">
	.back-link a {
		color: #4ca340;
		text-decoration: none; 
		border-bottom: 1px #4ca340 solid;
	}
	.back-link a:hover,
	.back-link a:focus {
		color: #408536; 
		text-decoration: none;
		border-bottom: 1px #408536 solid;
	}
	h1 {
		height: 100%;
		/* The html and body elements cannot have any padding or margin. */
		margin: 0;
		font-size: 14px;
		font-family: 'Open Sans', sans-serif;
		font-size: 32px;
		margin-bottom: 3px;
	}
	.entry-header {
		text-align: left;
		margin: 0 auto 50px auto;
		width: 80%;
        max-width: 978px;
		position: relative;
		z-index: 10001;
	}
	#demo-content {
		padding-top: 100px;
	}
	</style>
</head>
<body class="demo" style="background-color: #171b23;">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

	<!-- Demo content -->			
	<div id="demo-content">

		

		<div id="loader-wrapper">
			<div id="loader"></div>
		</div>

	</div>
	<!-- /Demo content -->

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="js/mainLoader.js"></script>

</body>
</html>
<?php
date_default_timezone_set("Australia/Brisbane");
session_start();
ob_start( );
	include('dbConn.php');
$meetID = $_POST['carMeet'];
$weight = $_POST['weight'];
$promoDays = $_POST['days'];
$promoImage = $_POST['image'];
$promoName = $_POST['adName'];
$promoURL = $_POST['url'];
$email = $_SESSION["email"];


$coinCost = (int)$weight*(int)$promoDays;
$query3 = "SELECT * FROM users WHERE email='$email'";
	$result3 = mysql_query($query3);
	$row3 = mysql_fetch_assoc($result3);
	$userCoins = (int)$row3['coins'] - (int)$coinCost;
	if($row3['coins'] >=$coinCost){
		
$endDate = date('Ymdhis', strtotime($Date. ' + '.$promoDays.' days'));

$sql = "INSERT INTO ads (weight, endDate, adType,adURL,imageURL,adName)
VALUES ('$weight', '$endDate', 'external','$promoURL','$promoImage','$promoName')";


	$result = mysql_query($sql);
 
	

		$sql4 = "UPDATE users SET coins=$userCoins WHERE email='$email'";
	$result4 = mysql_query($sql4);
	echo "<script type='text/javascript'>window.top.location='advertise.php';</script>"; exit;
	}else{
		
	echo "<script type='text/javascript'>window.top.location='advertise.php?error=coins';</script>"; exit;

		
	}
	

?>