	<?php
	session_start();
	ob_start( );


		
	if($_SESSION["logged"] == "true"){
		echo"<p>You're Already Logged In. Click Here to go to <a href='userHome.php'>My Account</a></p>";
		die;
		
	}
	if($_GET['error'] == "email"){
		
		$error = "The email that you've entered is already been used.";
 		
	}

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
	<title>Register | SupercarVibe</title>
	<meta name="description" content="Car Meets At Your Fingertips | Sign Up Page | SupercarVibe">
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

   <!-- favicons
	================================================== -->
	<link rel="icon" type="image/png" href="favicon.png">
<style>
#email{
	width:500px;
	
}
#loginForm{
	padding-left:250px;
	margin: auto;
	
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
					
					<li><a class="highlight with-sep"  href="index.php" title="">Home</a></li>
					<li><a class="highlight with-sep"  href="map.php" title="">Map</a></li>
					<li><a class="highlight with-sep"  href="create.php" title="">Create Meet</a></li>
					<li><a class="highlight with-sep"  href="login.php" title="">Login</a></li>
					<li class="current"><a class="highlight with-sep"  href="register.php" title="">Sign Up</a></li>

										
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
	      			<form action="registerProc.php" class="loginForm" method="POST" class="group" novalidate="true">
<center>
							<input type="text" value="" name="name" class="email" id="name" placeholder="Name" required/> 

							<input type="email" value="" name="email" class="email" id="email" placeholder="Email" required/> 
							<input type="password" value="" name="password" class="email" id="password" placeholder="Password" required/> 
	   		
			   			<button class="button button-primary full-width" type="submit" name="submit">Sign Up</button>
		   	</center>
		   				<label style="color:#c0392b;" for="mc-email" class="subscribe-message"><?echo$error?></label>
			
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

</body>

</html>
