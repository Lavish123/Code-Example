<?php

session_start();
ob_start( );
?>

<?php

	session_unset(); 

	// destroy the session 
	session_destroy();
	
	ob_end_clean( );
		header( 'Location:login.php' );

?>