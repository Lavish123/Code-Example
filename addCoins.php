
<?php
session_start();
ob_start( );
	include('dbConn.php');
	if($_SESSION["logged"] != "true"){
		
				echo "<script type='text/javascript'>window.top.location='login.php';</script>"; exit;

		
	}
?>
<?php

	$meetID = $_GET["meetID"];
	$email = $_SESSION["email"];
	$log = $_SESSION["logged"];

	$query = "SELECT * FROM markers WHERE authorEmail='$email'";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	
	$query55 = "SELECT * FROM markers WHERE authorEmail='$email'";
	$result55 = mysql_query($query55);
	$num_rows55 = mysql_num_rows($result55);
	
	
?>

<?php
	
	session_start();
	ob_start( );
echo'
<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Your Meets | SupercarVibe</title>
	<meta name="description" content="Car Meets At Your Fingertips | Meet Page | SupercarVibe">
	<meta name="keywords" content="Car Meets,Supercar,JDM,Stance,SupercarVibe">
';?>
   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-90263212-1', 'auto');
  ga('send', 'pageview');

</script>
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
#days{
	
	width:100%;
	
}
#weight{
	
	width:100%;
	
}
#carMeet{
	
	width:100%;
	
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
					if($_SESSION["logged"] == "true"){
					echo'
						<div class="dropdown">
					 <div class="dropbtn"><li><a class="highlight with-sep"  title="">My Account</a></li> </div>
					  <div class="dropdown-content">
						<a href="userMeets.php">Meets</a>
						<a href="userHome.php">My Account</a>
<a href="addCoins.php">Coins: '.$row['coins'].'</a>
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
   			<h2 class="h01"><?echo$row["name"]?></h2>
   		</div>   		
   	</div>   	

      <div class="row flex-container">
    <section id="wrapper">
    
<div id="one">
         <div id="testimonial-slider" class="flexslider">

           
				<h2>Add Coins</h2>
                          
             	

              

              
  
         </div> <!-- /testimonial-slider -->    
		 </div>
<div class="row">
   		<div class="col-twelve">
   			<h2 class="h01"><?echo$row["name"]?></h2>
   		</div>   		
   	</div>   		 <div id="two">

			<div>
			 <form action="addCoinsProc.php" method="POST">
			 	<select class="styled-select slate" onChange="onChange()" name="coins" id="coins" >
					<option value="1">1 Coin</option>
					<option value="5">5 Coins</option>
					<option value="10">10 Coins</option>
					<option value="25">25 Coins</option>
					<option value="50">50 Coins</option>
					<option value="1000">1000 Coins</option>
				</select>
					   
					 
					  <h2 id="coinCost">Cost= $1.00</h2>
					  <button type="submit">Purchase</button>
					 
			
			 </form>
			</div>					  
   	</div>   
	<div>

	
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
<script>



function onChange(){
	 
	
	var weight = document.getElementById("coins").value;
	if(weight == "1"){
		document.getElementById("coinCost").innerHTML = "Cost= $1.00";
		
	}
	if(weight == "5"){
		document.getElementById("coinCost").innerHTML = "Cost= $4.50";
		
	}
	if(weight == "10"){
		document.getElementById("coinCost").innerHTML = "Cost= $7.50";
		
	}
	if(weight == "25"){
		document.getElementById("coinCost").innerHTML = "Cost= $13.00";
		
	}
	if(weight == "50"){
		document.getElementById("coinCost").innerHTML = "Cost= $24.00";
		
	}if(weight == "1000"){
		document.getElementById("coinCost").innerHTML = "Cost= $125.00";
		
	}
	
}
</script>
</body>

</html>