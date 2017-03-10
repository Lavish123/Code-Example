<?php
	
	session_start();
ob_start( );
	include('dbConn.php');
	
	$email = $_SESSION["email"];
	$query2 = "SELECT * FROM users WHERE email='$email'";
	$result2 = mysql_query($query2);

	$row2 = mysql_fetch_assoc($result2);
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
	<title>Create Meet | SupercarVibe</title>
	<meta name="description" content="Car Meets At Your Fingertips | Create Meet Page | SupercarVibe">
	<meta name="keywords" content="Car Meets,Supercar,JDM,Stance,SupercarVibe">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">  
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/vendor.css">     

   <!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>
<style>
#dateYear{
	
	width:100%;
	
}
#dateDay{
	
	width:100%;
	
}
#dateMonth{
	
	width:100%;
	
}
</style>
   <!-- favicons
	================================================== -->
	<link rel="icon" type="image/png" href="favicon.png">
<script src='https://www.google.com/recaptcha/api.js'></script>

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
					
					<li><a class="highlight with-sep"  href="index.php" title="">Home</a></li>
					<li><a class="highlight with-sep"  href="map.php" title="">Map</a></li>
					<li class="current"><a class="highlight with-sep"  href="create.php" title="">Create Meet</a></li>
					<?php
					if($_SESSION["logged"] == "true"){
					echo'
						<div class="dropdown">
					 <div class="dropbtn"><li><a class="highlight with-sep"  title="">My Account</a></li> </div>
					  <div class="dropdown-content">
						<a href="userMeets.php">Meets</a>
						<a href="userHome.php">My Account</a>
						<a href="addCoins.php">Coins: '.$row2['coins'].'</a>
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


   <footer>

   	<div class="footer-bottom">

   		<div class="row">  

	      	

	      	<div class="col-four tab-1-3 mob-full footer-subscribe">

	      		
<br>
<br>
<br>
<br>
<br>
	      		<div class="subscribe-form">
	      			<form action="createProc.php" method="POST" class="group" novalidate="true">

							<input type="text" value="" name="name" class="email" id="mc-email" placeholder="Meet Name" required=""> 
							<input type="text" value="" name="address" class="email" id="address" placeholder="Address" required=""> 
							<input type="text" value="" name="latitude" class="email" id="latitude" placeholder="Latitude" required=""> 
							<input type="text" value="" name="longitude" class="email" id="longitude" placeholder="Longitude" required=""> 
							
							<select class="styled-select slate"  name="dateDay" id="dateDay" >
			 					<option value="0">Choose Day</option>
			 					<option value="1">1</option>
			 					<option value="2">2</option>
			 					<option value="3">3</option>
			 					<option value="4">4</option>
			 					<option value="5">5</option>
			 					<option value="6">6</option>
			 					<option value="7">7</option>
			 					<option value="8">8</option>
			 					<option value="9">9</option>
			 					<option value="10">10</option>
			 					<option value="11">11</option>
			 					<option value="12">12</option>
			 					<option value="13">13</option>
			 					<option value="14">14</option>
			 					<option value="15">15</option>
			 					<option value="16">16</option>
			 					<option value="17">17</option>
			 					<option value="18">18</option>
			 					<option value="19">19</option>
			 					<option value="20">20</option>
			 					<option value="21">21</option>
			 					<option value="22">22</option>
			 					<option value="23">23</option>
			 					<option value="24">24</option>
			 					<option value="25">25</option>
			 					<option value="26">26</option>
			 					<option value="27">27</option>
			 					<option value="28">28</option>
			 					<option value="29">29</option>
			 					<option value="30">30</option>
			 					<option value="31">31</option>
							</select>
							
							<select class="styled-select slate"  name="dateMonth" id="dateMonth" >
								<option value="0">Choose Month</option>
			 					<option value="01">01</option>
			 					<option value="02">02</option>
			 					<option value="03">03</option>
			 					<option value="04">04</option>
			 					<option value="05">05</option>
			 					<option value="06">06</option>
			 					<option value="07">07</option>
			 					<option value="08">08</option>
			 					<option value="09">09</option>
			 					<option value="10">10</option>
			 					<option value="11">11</option>
			 					<option value="12">12</option>
							</select>
							
							<select class="styled-select slate"  name="dateYear" id="dateYear" >
								<option value="0">Choose Year</option>
			 					<option value="2017">2017</option>
			 					<option value="2018">2018</option>
			 					<option value="2019">2019</option>
			 					<option value="2020">2020</option>
			 					<option value="2021">2021</option>
							</select>
							<input type="time" value="" name="time" class="email" id="time" placeholder="Meet Time" required=""> 

							<textarea style="width:1066px;" name="meetInfo" class="email" id="meetInfo" placeholder="More Info..." ></textarea>
	   		<div class="g-recaptcha" data-sitekey="6LfHSRUUAAAAAHkIgrVzi4U2XsClFBSipe0ovQpo"></div>

			   			<button class="button button-primary full-width" type="submit" name="submit">Submit</button>
		   	
		   				<label for="mc-email" class="subscribe-message"></label>
			
						</form>
	      	

	      		</div>	    	      		
	      	           	
	      	</div> <!-- /subscribe -->         

	      </div> <!-- /row -->

   	</div> <!-- /footer-main -->


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
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPUu3LlVkmlv-Kfs8btDaDgKowLj4nqUs&libraries=places"></script>    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('address'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
                var address = place.formatted_address;
                var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();
               
				document.getElementById('latitude').value = latitude;
				document.getElementById('longitude').value = longitude;

                
            });
        });
    </script>

</body>

</html>
