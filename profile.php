
<?php
session_start();
ob_start( );
	include('dbConn.php');
	if($_SESSION["logged"] != "true"){

				echo "<script type='text/javascript'>window.top.location='login.php';</script>"; exit;


	}
		if(isset($_GET['id'])) {

}else{
	echo "<script type='text/javascript'>window.top.location='index.php';</script>"; exit;


}
?>
<?php

	//$email = $_SESSION["email"];
	$log = $_SESSION["logged"];
	$user = $_GET['id'];

	$query = "SELECT * FROM users WHERE id='$user'";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_assoc($result);
	$email = $_SESSION["email"];
	$query24 = "SELECT * FROM users WHERE email='$email'";
	$result24= mysql_query($query24);

	$row24 = mysql_fetch_assoc($result24);



?>

<?php

	session_start();
	ob_start( );
?>

<?php

if(file_exists($row['avatar']))
    $avatar = $row['avatar'];
else
    $avatar = "http://supercarvibe.com/userInfo/userProfile/placeholderProfile.jpg";

if(file_exists($row['carImage']))
    $carImage = $row['carImage'];
else
    $carImage = "http://supercarvibe.com/userInfo/userCar/placeholderCar.png";
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
   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Account | SupercarVibe</title>
	<meta name="description" content="Car Meets At Your Fingertips | Account Page | SupercarVibe">
	<meta name="keywords" content="Car Meets,Supercar,JDM,Stance,SupercarVibe">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/vendor.css">
<style>


#pagewrap {
	padding: 5px;
	width: 960px;
	margin: 20px auto;
}



#sidebar {
	width: 260px;
	padding: 1px 1px;
	float: left;
}


/************************************************************************************
MEDIA QUERIES
*************************************************************************************/
/* for 980px or less */
@media screen and (max-width: 980px) {

	#pagewrap {
		width: 94%;
	}


	#sidebar {
		clear: both;
		padding: 1% 1%;
		width: auto;
		float: none;
	}


}

/* for 700px or less */
@media screen and (max-width: 600px) {


	#sidebar {
		width: auto;
		float: none;
	}

}

/* for 480px or less */
@media screen and (max-width: 480px) {

	header {
		height: auto;
	}
	h1 {
		font-size: 2em;
	}
	#sidebar {
		display: none;
	}

}

.image-container {
    position: relative;
    width: 250px;
    height: 250px;
}
.image-container .after {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: none;
    color: #FFF;
}
.image-container:hover .after {
    display: block;
    background: rgba(0, 0, 0, .6);
}





</style>
   <!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>

   <!-- favicons
	================================================== -->
	<link rel="icon" type="image/png" href="favicon.png">

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

   <br>
   <br>
   <br>
   <section id="testimonials">

   	<div class="row">
   		<div class="col-twelve">
   			<h2 class="h01">Profile</h2>
   		</div>
   	</div>

      <div class="row flex-container">

         <div id="testimonial-slider" class="flexslider">



               <?php
			   echo'
               	<div class="testimonial-author">
                    	<img src="'.$avatar.'" alt="Author image">
                    	<div class="author-info">'.$row['name'].'<span class="position">Age: '.$row['age'].'</span>
                    	</div>
                  </div>';

                      ?>
											<form action="addFriend.php" method="POST">
												<?php

												$query44 = "SELECT * FROM users where id=$user";
												$result44 = mysql_query($query44);
												$row44 = mysql_fetch_assoc($result44);

												$userEmail = $row44['email'];

												?>
												<input type="hidden" name="sentRequest" value="<?echo$email?>"/>
												<input type="hidden" name="sendingTo" value="<?echo$userEmail?>"/>
             						<button type="submit">Add Friend</button>
											</form>





         </div> <!-- /testimonial-slider -->

		 	<div class="row">
   		<div class="col-twelve">
   			<h2 class="h01">Car Specifications</h2>
   		</div>
			<?php
			echo'<img src="'.$carImage.'" style="height:325px;border: 9px solid #EAEAED;"></>';
			echo'<br>';
			echo'<br>';
			echo'<h3>Car Make: '.$row['carMake'].'<h3>';

			echo'<h3>Car Model: '.$row['carModel'].'<h3>';

			echo'<h3>Car Engine:'.$row['carEngine'].'<h3>';

			echo'<p style="font-size:18px;">More Info: <br>'.$row['carInfo'].'<p>';

			?>
   	</div>
        <div id="pagewrap">



<?php
$username = $row['instagram'];
$instaResult= file_get_contents('https://www.instagram.com/'.$username.'/media/');

$data = json_decode($instaResult);
$i=1;
foreach ($data->items as $items) {

	if($i <=9){
    $imageLink = $items->images->standard_resolution->url;
    $imageLikes = $items->likes->count;
    $imageURL = $items->link;
	echo'
	<section id="sidebar">
	<center>

		<a href="'.$imageURL.'">
		<div class="image-container">
			<img style="width:250px;" src="'.$imageLink.'"></img>
			<div class="after">
				<h2 style="color:white;padding-top:115px;"><img style="width:25px;" src="http://www.followers.co.il/wp-content/uploads/2016/01/1-2.png"></img>'.$imageLikes.'</h2>
			</div>
		</div>

		</a>
		</center>
	</section>
	';
	$i++;
	}

}


?>
</div>
      </div> <!-- /flex-container -->

   </section> <!-- /testimonials -->


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
						<li><a href="instagram.com/SupercarVibe">Instagram</a></li>
					</ul>

	      	</div> <!-- /social -->



	      </div> <!-- /row -->

   	</div> <!-- /footer-main -->


      <div class="footer-bottom">

      	<div class="row">

      		<div class="col-twelve">
	      		<div class="copyright">
		         	<span>� Copyright SupercarVibe 2017.</span>
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
