
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
	$query2 = "SELECT * FROM users WHERE email='$email'";
	$result2 = mysql_query($query2);

	$row2 = mysql_fetch_assoc($result2);
	
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

           
				<h2>Your Meets:</h2>
                          
             	

              

              
  
         </div> <!-- /testimonial-slider -->    
		 </div>
<div class="row">
   		<div class="col-twelve">
   			<h2 class="h01"><?echo$row["name"]?></h2>
   		</div>   		
   	</div>   		 <div id="two">
<?php
		
			while($row = mysql_fetch_assoc($result)){
				
				
				   echo'
				   <div style="border: 1px solid #EAEAED;" id="testimonial-slider" class="flexslider">
					<a href="meetPage.php?meetID='.$row['id'].'"><div class="testimonial-author">
							
							<div class="author-info">'.$row['name'].'<span class="position">Location: '.$row['address'].'</span>
							</div></a>
							
					  </div>
					 
					 <a href="deleteMeet.php?meetID='.$row['id'].'"><img style="height:50px;" src="http://www.clker.com/cliparts/1/1/9/2/12065738771352376078Arnoud999_Right_or_wrong_5.svg.hi.png"></img></a>
					  </div>
					  ';
			}

                      ?>  
			<div>
			<div class="row">
   		<div class="col-twelve">
   			<h2 class="h01"><?echo$row["name"]?></h2>
   		</div>   		
   	</div>  
			<h2>Promote Your Meets:</h2>
			 <form action="promote.php" method="POST">
			 	<select class="styled-select slate"  name="carMeet" id="carMeet" >
			 <?php
				 while($row55 = mysql_fetch_assoc($result55)){
					 
					 echo'
					 <option value="'.$row55['id'].'">'.$row55['name'].'</option>	
					 
					 ';
					 
				 }
			 
			 
			 ?>
												
							
			</select>
					   <input type="number" min="1" id="days" name="days" onChange="onChange()" placeholder="Days">
					  <input type="number" min="1" id="weight" name="weight" onChange="onChange()" placeholder="Weight">
					 
					  <h2 id="coinCost">Cost= 0</h2>
					  <button type="submit">Promote</button>
					 
			
			 </form>
			</div>					  
   	</div>   
	<div>
	 
	
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- SupercarVibe Ads -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-2012222309093875"
     data-ad-slot="3869499749"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	
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
	 
	var days = document.getElementById("days").value;
	var weight = document.getElementById("weight").value;
	document.getElementById("coinCost").innerHTML = "Cost= "+(days*weight);
}
</script>
</body>

</html>