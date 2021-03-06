
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

session_start();
ob_start( );
include('dbConn.php');

		
$meetID = $_GET['meetID'];

	$sql50 = "INSERT INTO `carMeets` 
    (`meetID`)
SELECT 
    '$meetID' 
FROM dual
WHERE NOT EXISTS (SELECT *
                    FROM `carMeets`
                    WHERE `meetID`='$meetID' )";
	$result50 = mysql_query($sql50);
	
	

$attendance = $_GET['attendance'];
$userEmail = $_SESSION["email"];
$query = "SELECT * FROM carMeets WHERE meetID='$meetID'";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	
	$query2 = "SELECT * FROM users WHERE email='$userEmail'";
	$result2 = mysql_query($query2);
	$row2 = mysql_fetch_assoc($result2);
	
$userID = $row2['id'];


$usersGoing = $row['usersGoing'];

$numPeople = $row['numPeople'];

if($attendance =="going"){
	$numPeople = $numPeople + 1;
	$temp = $userID .",";
	$usersGoing = $usersGoing.$temp;
	
	$sql4 = "UPDATE markers SET numPeople =$numPeople WHERE id='$meetID'";
	$resultUp4 = mysql_query($sql4);	
	
	$sql = "UPDATE carMeets SET usersGoing = '$usersGoing',numPeople =$numPeople WHERE meetID='$meetID'";
	$resultUp = mysql_query($sql);
}else if($attendance =="notGoing"){
	
	echo$usersGoing = str_replace(','.$userID.',', ',', $usersGoing);
	$numPeople = $numPeople- 1;

	
	$sql3 = "UPDATE markers SET numPeople =$numPeople WHERE id='$meetID'";
	$resultUp3 = mysql_query($sql3);	
	
	$sql2 = "UPDATE carMeets SET usersGoing = '$usersGoing', numPeople =$numPeople WHERE meetID='$meetID'";
	$resultUp2 = mysql_query($sql2);
	
	
}
if($_GET['reference'] == "map"){
			echo "<script type='text/javascript'>window.top.location='map.php';</script>"; exit;

	
}else{
		echo "<script type='text/javascript'>window.top.location='meetPage.php?meetID=".$meetID."';</script>"; exit;

	
}


?>