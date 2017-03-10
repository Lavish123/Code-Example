<?php

session_start();
ob_start( );
include('dbConn.php');
$videoURL="https://www.youtube.com/embed/".$_POST['VidUrl'];

$sql = "UPDATE siteInfo SET homeVideo='$videoURL'";
$result = mysql_query($sql);
echo "<script type='text/javascript'>window.top.location='partner.php';</script>"; exit;

?>
