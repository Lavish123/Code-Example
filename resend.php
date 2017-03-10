<?php
session_start();
ob_start( );
	include('dbConn.php');
	
$email = $_GET['email'];

function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$query2 = "SELECT * FROM users WHERE email='$email'";
	$result2 = mysql_query($query2);

	$row = mysql_fetch_assoc($result2);
	$name = $row['name'];
	$actCode = generateRandomString();
	$sql = "UPDATE users SET activationCode='$actCode' WHERE email='$email'";
	$result = mysql_query($sql);
	
$to = $email;
$subject = "SupercarVibe | Email Validation";

$message = '
<div role="document">  <div class="_rp_L4 _rp_M4 ms-font-weight-regular ms-font-color-neutralDark" style="display: none;"></div>  <div autoid="_rp_w" class="_rp_L4" style="display: none;"></div>  <div autoid="_rp_x" class="_rp_L4" id="Item.MessagePartBody"> <div style="display: none;"></div> <div class="_rp_M4 ms-font-weight-regular ms-font-color-neutralDark rpHighlightAllClass rpHighlightBodyClass" id="Item.MessageUniqueBody" tabindex="0"><div class="rps_818">
<div>
<div>
<table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" dir="ltr" style="font-size:16px; background-color:rgb(239,239,239)">
<tbody>
<tr>
<td align="center" width="100%" valign="top" style="margin:0; padding:0">
<table align="center" border="0" cellspacing="0" cellpadding="0" width="600" class="x_wrapper" style="width:600px">
<tbody>
<tr>
<td align="center" style="margin:0px; padding:0">
<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
<tbody>
<tr>
<td align="left" valign="middle" width="41%" style="margin:0; padding:0">
<table align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td valign="top" align="left" style="margin:0px; padding:21px 0px 16px 20px; font-family:Helvetica,sans-serif; color:#464646; font-size:26px; font-weight:normal">
<div style="border:0px none transparent; width:150px; height:43px; display:block; overflow:hidden">
<img src="http://supercarvibe.com/images/Logo.png" width="150" height="43" style="top: 0px; left: 0px; display: none !important;"></div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td bgcolor="#ffffff" style="margin:0; padding:38px 0 34px 44px; border-top-left-radius:5px; border-top-right-radius:5px; border-bottom-right-radius:0px; border-bottom-left-radius:0px">
<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
<tr>
<td align="left" style="margin:0; padding:0">
<table border="0" cellpadding="0" cellspacing="0" align="left">
<tbody>
<tr>
<td valign="top" align="left" style="margin:0px; padding:0px 20px 0px 0px; font-family:Helvetica,sans-serif; font-weight:bold; font-size:28px; color:#464646; background-color:rgb(255,255,255)">
Hey '.$name.', You&#39;re almost done:</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="left" style="margin:0; padding:0">
<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
<tbody>
<tr>
<td valign="top" align="left" style="margin:0px; padding:0px 49px 15px; font-family:Helvetica,sans-serif; color:#464646; line-height:140%; background-color:rgb(255,255,255)">
<div style=""><span style="font-family:Helvetica,sans-serif; color:#464646; font-size:16px; line-height:100%">Click the button to complete your application:</span></div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td bgcolor="#ffffff" valign="top" align="center" style="padding:0 0 22px 0; margin:0">
<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="margin:0px; padding:0px">
<tbody>
<tr>
<td valign="middle" align="center" bgcolor="#ffffff" style="color:#ffffff; font-family:Helvetica,sans-serif; font-size:26px; font-weight:bold">
<div style="width:100%; margin-top:0px; margin-bottom:0px">
<table border="0" cellpadding="0" cellspacing="0" align="center" style="margin-top:0px; margin-bottom:0px">
<tbody>
<tr>
<td>
<p align="center"><a href="http://supercarvibe.com/activate.php?code='.$actCode.'" target="_blank" style="font:bold 25px/1 sans-serif!important; letter-spacing:-1px!important; color:#fff!important; text-decoration:none!important; background:#5CBB5C!important; display:inline-block!important; padding:18px 25px 14px!important; border-top:1px solid #80FF81!important; border-bottom:1px solid #428842!important; border-radius:5px!important; -moz-border-radius:5px!important; -webkit-border-radius:5px!important">Activate My Account</a></p>
</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="left" style="margin:0; padding:0">
<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
<tbody>
<tr>
<td valign="top" align="left" style="margin:0px; padding:5px 49px 15px; font-family:Helvetica,sans-serif; color:#464646; line-height:130%; background-color:rgb(255,255,255)">
<span style="font-family:Helvetica,Arial,sans-serif; color:#464646; font-weight:normal; font-size:16px; line-height:130%">Lets Start,<br>
SupercarVibe&trade;</span></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td bgcolor="#ffffff" valign="top" align="center" style="padding:0 0 22px 0; margin:0; border-top-left-radius:0px; border-top-right-radius:0px; border-bottom-right-radius:5px; border-bottom-left-radius:5px">
<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="margin:0px; padding:0px">
<tbody>
<tr>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
<tbody>
<tr>
<td align="left" valign="top" style="padding:10px; font-family:Arial,Helvetica,sans-serif; color:#464646">
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>

</div>
</div></div> <div style="display: none;"></div> </div>  <span class="PersonaPaneLauncher"><div ariatabindex="-1" class="_pe_d _pe_12" aria-expanded="false" tabindex="-1" aria-haspopup="false">  <div style="display: none;"></div> </div></span> </div>
';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <noreply@supercarvibe.com>' . "\r\n";

mail($to,$subject,$message,$headers);

		echo "<script type='text/javascript'>window.top.location='login.php';</script>"; exit;
		?>