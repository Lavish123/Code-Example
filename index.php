<?php
date_default_timezone_set("Australia/Brisbane");
$timeDate = date("Ymdhis");
?>
<?php

	session_start();
	ob_start( );
	include('dbConn.php');
	/*
	$query = "SELECT * FROM ads WHERE endDate>=$timeDate";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);*/
	$email = $_SESSION["email"];
	$query24 = "SELECT * FROM users WHERE email='$email'";
	$result24= mysql_query($query24);

	$row24 = mysql_fetch_assoc($result24);

	$query44 = "SELECT * FROM siteInfo";
	$result44= mysql_query($query44);

	$row44 = mysql_fetch_assoc($result44);

?>
<?php


	$query4 = "SELECT * FROM ads";
	$result4 = mysql_query($query4);
	$num_rows4 = mysql_num_rows($result4);
	$adID = array();
	while($row4 = mysql_fetch_assoc($result4)){
		$weight = $row4['weight'];
		$i = 0;
		while ($i<$weight){
			array_push($adID,$row4['id']);
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
$adIDtemp = $adID[$key];

	$query5 = "SELECT * FROM ads WHERE id=$adIDtemp";
	$result5 = mysql_query($query5);
	$row5 = mysql_fetch_assoc($result5);

?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-90263212-1', 'auto');
  ga('send', 'pageview');

</script>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "http://www.SupercarVibe.com",
  "contactPoint": [{
    "@type": "ContactPoint",
    "email": "Lachlan.Kruger@outlook.com"
  }]
}
</script>


   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Home | SupercarVibe</title>
	<meta name="description" content="Car Meets At Your Fingertips | SupercarVibe">
	<meta name="keywords" content="Car Meets,Supercar,JDM,Stance,SupercarVibe">
<meta name="propeller" content="8745c695127f1faeb0bb00e02b9382a0" />
   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="google-site-verification" content="utRgooWzl7pZxR138rVoPJpwe2bpBPEsYDBJn28TB9A" />
 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/vendor.css">

   <!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>


	   <script src="/js/adsbygoogle.js"></script>
<script>
if(window.isAdsDisplayed === undefined ) {
  // AdBlock is enabled. Show message or track custom data here

}
</script>
   <!-- favicons
	================================================== -->
	<link rel="icon" type="image/png" href="favicon.png">
<style>
.findMeets{
    background: transparent !important;
	color:white;
    border: 3px solid white;
    line-height: 4.4rem;
	font-size:1.6rem;
}

.findMeets:hover{
    background: transparent !important;
	color:#05bca9;
    border: 3px solid #05bca9;
    line-height: 4.4rem;
}


.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
	background: rgba(249, 249, 249, .5);
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
#ads{
	background-color:white;

}


</style>
</head>

<body id="top">



	<!-- header
   ================================================== -->
   <header>

   	<div class="row">

   		<div class="logo">
	         <a href="index.php">SupercarVibe</a>
	      </div>

	   	<nav id="main-nav-wrap">
				<ul class="main-navigation">
					<li class="current"><a class="highlight with-sep"  href="index.php" title="">Home</a></li>
					<li><a class="highlight with-sep"  href="map.php" title="">Map</a></li>
					<li><a class="highlight with-sep"  href="create.php" title="">Create Meet</a></li>

					<?php

										$query49 = "SELECT * FROM notifications where userEmail='$email' ORDER BY  `id` DESC";
										$result49 = mysql_query($query49);
										$rowcount= mysql_num_rows($result49);

					if($_SESSION["logged"] == "true"){
					echo'
						<div class="dropdown">
					 <div class="dropbtn"><li><a class="highlight with-sep"  title="">My Account</a></li> </div>
					  <div class="dropdown-content">
						<a href="userMeets.php">Meets</a>
						<a href="userHome.php">My Account</a>
						<a href="addCoins.php">Coins: '.$row24['coins'].'</a>
					  </div>
					</div>

					<div class="dropdown">
					<div class="dropbtn"><li><a class="highlight with-sep"  title=""><img style="height:20px;" src="https://image.flaticon.com/icons/svg/189/189806.svg" />'.$rowcount.'</a></li> </div>
					<div style="min-width:275px;" class="dropdown-content">';
					while($row49 = mysql_fetch_assoc($result49)){
						$sentEmail = $row49['sentFrom'];
						$query59 = "SELECT * FROM users where email='$sentEmail'";
						$result59 = mysql_query($query59);
						$row59 = mysql_fetch_assoc($result59);
						$userName = $row59['name'];

						$meetID = $row49['meetID'];

						$query69 = "SELECT * FROM markers where id='$meetID'";
						$result69 = mysql_query($query69);
						$row69 = mysql_fetch_assoc($result69);
						$meetName = $row69['name'];
						$meetLink = "meetPage.php?meetID=".$row69['id']."&notificationID=".$row49['id'];

echo
						'<a style="font-size:9px;" href="'.$meetLink.'">'.$userName.' Invited you to a meet</a>';


					}
echo'
					</div>
					</div>
						<li class="highlight with-sep"><a href="logout.php" title="">Log Out</a></li>';


					}else{

						echo'<li><a class="highlight with-sep"  href="login.php" title="">Login</a></li>
						<li class="highlight with-sep"><a href="register.php" title="">Sign Up</a></li>';

					}
					?>


				</ul>
			</nav>

			<a class="menu-toggle" href="#"><span>Menu</span></a>

   	</div>

   </header> <!-- /header -->

	<!-- intro section
   ================================================== -->
   <section id="intro">

   	<div class="shadow-overlay"></div>

   	<div class="intro-content">
   		<div class="row">

   			<div class="col-twelve">

	   			<div class='video-link'>
	   				<a href="#video-popup"><img src="images/play-button.png" alt=""></a>
	   			</div>

	   			<h5>Hello welcome to SupercarVibe.</h5>
	   			<h1>Car Meets,<br>At Your Fingertips.</h1>

				<?php
include 'Mobile_Detect.php';
$detect = new Mobile_Detect();

// Check for any mobile device.
if ($detect->isMobile()){
	   //echo"<script data-cfasync='false' type='text/javascript' src='//p198544.clksite.com/adServe/banners?tid=198544_365902_5&type=footer&size=728x90'></script>";

}
else{
	/*echo'<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Front Page -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2012222309093875"
     data-ad-slot="2688753747"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>';*/

}

	?>
				<form action="map.php">
	   			<button type="submit" class="findMeets" href="map.php" title="">Find Meets</button>
				</form>



	   		</div>

   		</div>
   	</div>

   	<!-- Modal Popup
	   ========================================================= -->

      <div id="video-popup" class="popup-modal mfp-hide">

		   <div class="fluid-video-wrapper">
            <iframe src="<?echo$row44['homeVideo']?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
         </div>

         <a class="close-popup">Close</a>

	   </div> <!-- /video-popup -->

   </section> <!-- /intro -->


   <!-- Process Section
   ================================================== -->
   <section id="process">

   	<div class="row section-intro">
   		<div class="col-twelve with-bottom-line">

   			<h5>Promoted</h5>
   		</div>
   	</div>


   	<div class="row process-content">

   		<?php


				$meetID=$row5['meetID'];
				$query2 = "SELECT * FROM markers where id=$meetID";
				$result2 = mysql_query($query2);
				$row2 = mysql_fetch_assoc($result2);
				if($row5['adType'] == "meet"){
				   echo'
				   <div style="border: 1px solid #EAEAED;" id="testimonial-slider" class="flexslider">
					<a href="meetPage.php?meetID='.$row2['id'].'"><div class="testimonial-author">
							<img src="'.$row2['avatar'].'" alt="Meet Thumbnail">
							<div class="author-info">'.$row2['name'].'<span class="position">Location: '.$row2['address'].'</span>
							</div></a>
					  </div>
					  </div>
					  ';
				}else{
					echo'<a href="'.$row5['adURL'].'"><div style="border: 1px solid #EAEAED; background-image: url('.$row5['imageURL'].');" id="testimonial-slider" class="flexslider">
								<div class="testimonial-author">
								<br>
								<br>
										<div class="author-info">'.$row5['adName'].'<span class="position"></span>
										</div>
					  </div>
					  </div></a>

					';

				}


                      ?>

   	</div> <!-- /process-content -->

   </section> <!-- /process-->


   <!-- footer
   ================================================== -->
  <footer>

   	<div class="footer-main">

   		<div class="row">

	      	<div class="col-four tab-full mob-full footer-info">

	            <div class="footer-logo"></div>



		      </div> <!-- /footer-info -->

	      	<div class="col-two tab-1-3 mob-1-2 site-links">

	      		<h4>Site Links</h4>

	      		<ul>
	      			<li><a href="index.php">Home</a></li>
						<li><a href="map.php">Map</a></li>
						<li><a href="create.php">Create Meet</a></li>
						<?php
					if($_SESSION["logged"] == "true"){
					echo'<li><a href="userHome.php">My Account</a></li>
						<li><a href="logout.php">Log Out</a></li>';


					}else{

						echo'<li><a href="login.php">Login</a></li>
						<li><a href="register.php"></a>Sign Up</li>';

					}
					?>


					</ul>

	      	</div> <!-- /site-links -->


	      	<div class="col-two tab-1-3 mob-1-2 social-links">

	      		<h4>Social</h4>

	      		<ul>
	      			<li><a href="#">Twitter</a></li>
						<li><a href="#">Facebook</a></li>
						<li><a href="https://www.instagram.com/SupercarVibe/">Instagram</a></li>
					</ul>

	      	</div> <!-- /social -->



	      </div> <!-- /row -->

   	</div> <!-- /footer-main -->


      <div class="footer-bottom">

      	<div class="row">

      		<div class="col-twelve">
	      		<div class="copyright">
		         	<span>© Copyright SupercarVibe 2017.</span>
		         	<span>Design by <a href="http://www.SupercarVibe.com/">Lachlan</a></span>
		         </div>

		         <div id="go-top" style="display: block;">
		            <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon ion-android-arrow-up"></i></a>
		         </div>
	      	</div>

      	</div> <!-- /footer-bottom -->

      </div>

   </footer>


   <div id="preloader">
    	<div id="loader"></div>
   </div>

   <!-- Java Script
   ================================================== -->
   <script src="js/jquery-1.11.3.min.js"></script>
   <script src="js/jquery-migrate-1.2.1.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/main.js"></script>

</body>


</html>
