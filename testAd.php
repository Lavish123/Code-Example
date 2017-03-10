<?php

	session_start();
	ob_start( );
	include('dbConn.php');
	
	$query = "SELECT * FROM ads";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$adID = array();
	while($row = mysql_fetch_assoc($result)){
		$weight = $row['weight'];
		$i = 0;
		while ($i<$weight){
			array_push($adID,$row['id']);
			$i++;
		}
		
		
	}
	$random = array();
	$arrayLen =count($adID);
	$j = 1;
	while ($j <=$arrayLen){
		array_push($random,$j);
			$j++;
		
		
	}


$randomAdNum = $random[array_rand($random)];
$key = array_search($randomAdNum, $random); 
echo$adID = $adID[$key];
?>