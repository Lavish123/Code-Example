<?php
session_start();
ob_start( );
	include('dbConn.php');
?>
<?php


$email = $_POST['email'];
$password = $_POST['password'];
$password = hash('ripemd160',$password);

	$result = mysql_query("SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1");
	

	
    if(mysql_fetch_array($result) !== false){
		$query2 = "SELECT * FROM users WHERE email='$email'";
		$result2 = mysql_query($query2);
		$row = mysql_fetch_assoc($result2);
		if($row[activated] == "no"){
			
			ob_end_clean( );
			header( 'Location:login.php?error=notActivated' );
			
		}else{
			$_SESSION["logged"] = "true";
		// Set session variables
		
		$_SESSION["email"] = $email;
		
		
		$_SESSION["password"] = $password;
		
		ob_end_clean( );
		header( 'Location:userHome.php' );
			
		}
		
		
	}
	else{
	
		

		
			ob_end_clean( );
			header( 'Location:login.php?error=userInvalid' );
		
		
	}
		
	
		
	
	
?>