
<?php
session_start();
ob_start( );
include('dbConn.php');

$coins = $_POST['coins'];
	if($coins == "1"){
		$cost = 1.00;
	}
	if($coins == "5"){
		$cost = 4.50;
	}
	if($coins == "10"){
		
		$cost = 7.50;
	}
	if($coins == "25"){
		
		$cost = 13.00;
		
	}
	if($coins == "50"){
		$cost = 24.00;
		
	}
	if($coins == "1000"){
		$cost = 125.00;
		
	}
	
	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$randCode = generateRandomString();
$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email='$email'";
	$result2 = mysql_query($query);
	$row = mysql_fetch_assoc($result2);
$userID = $row['id'];
	$sql = "INSERT INTO `orders` 
    (`orderCode`,`userID`,`amount`)
SELECT 
    '$randCode','$userID','$coins' 
FROM dual
WHERE NOT EXISTS (SELECT *
                    FROM `orders`
                    WHERE `orderCode`='$randCode' )";
	$result = mysql_query($sql);

	echo'
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<INPUT TYPE="hidden" name="cmd" value="_xclick">
<INPUT TYPE="hidden" NAME="currency_code" value="USD">
<input type="hidden" name="amount" value="'.$cost.'">
  <input type="hidden" name="item_name" value="SupercarVibe Coins">
  <INPUT TYPE="hidden" NAME="return" value="http://supercarvibe.com/thankyou.php?id='.$randCode.'">

  <input type="hidden" name="business" value="lachlan.kruger@outlook.com">

 <input type="image" name="submit"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">
  <img alt="" width="1" height="1"
    src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
</form>';

	echo'<form action="thankyou.php?id='.$randCode.'">
	   			<button type="submit" class="findMeets" title="">Find Meets</button>
				</form>';
?>
