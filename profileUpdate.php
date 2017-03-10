	<?php
	session_start();
	ob_start( );
	include('dbConn.php');

	if($_GET[type] == "update"){
		$title = "Update Profile";
		
		$query = "SELECT * FROM users WHERE email='$email'";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
	}else{
		
		$title = "Register";

	}
	$email = $_SESSION["email"];
	$query24 = "SELECT * FROM users WHERE email='$email'";
	$result24= mysql_query($query24);

	$row24 = mysql_fetch_assoc($result24);
?>
	
	

<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title><?echo$title?> | SupercarVibe</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">  
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/vendor.css">     

 <link rel="stylesheet" type="text/css" href="css/normalize.css" />
		
		<link rel="stylesheet" type="text/css" href="css/component.css" />
   <!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>
		<script src="js/custom-file-input.js"></script>
		<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

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
.styled-select slate{
    padding: .6rem 2rem;
    border-radius: 5px;
    background: #232933;
    border: none;
    width: 100%;
    font-family: "raleway-regular", sans-serif;
    color: #bababa;
    margin-bottom: 1.8rem;
}
#Make{
	
	width:100%;
	
}
#Model{
	
	width:100%;
	
}
.fileUploader{
  padding:5px 10px;
  background:#00ad2d;
  border:1px solid #00ad2d;
  position:relative;
  color:#fff;
  border-radius:2px;
  text-align:center;
  float:left;
  cursor:pointer
}
#fileToUpload {
    position: absolute;
    z-index: 1000;
    opacity: 0;
    cursor: pointer;
    right: 0;
    top: 0;
    height: 100%;
    font-size: 24px;
    width: 100%;
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
				<?php
				if($_GET[type] == "update"){
		
					$query = "SELECT * FROM users WHERE email='$email'";
					$result = mysql_query($query);
					$row = mysql_fetch_assoc($result);
					
					echo'
	      			<form action="profileUpdateProc.php" class="loginForm" method="POST" class="group" novalidate="true" enctype="multipart/form-data">
<center>
						

					<input type="file" name="fileToUpload" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
					<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Upload Profile Image&hellip;</span></label>
			
							<input type="text" value="'.$row['age'].'" name="age" class="email" id="age" placeholder="Age" required/> 
<!--
							<select class="styled-select slate" name="Make" id="Make" onchange="changeModel()">
							<option value="0">
							Please Select Make </option>
							<option value="ALFA ROMEO">
							ALFA ROMEO </option>
							<option value="ASTON MARTIN">
							ASTON MARTIN </option>
							<option value="AUDI">
							AUDI </option>
							<option value="BENTLEY">
							BENTLEY </option>
							<option value="BMW">
							BMW </option>
							<option value="CHRYSLER">
							CHRYSLER </option>
							<option value="CITROEN">
							CITROEN </option>
							<option value="DAEWOO">
							DAEWOO </option>
							<option value="DAIHATSU">
							DAIHATSU </option>
							<option value="DATSUN">
							DATSUN </option>
							<option value="DODGE">
							DODGE </option>
							<option value="EUNOS">
							EUNOS </option>
							<option value="FERRARI">
							FERRARI </option>
							<option value="FIAT">
							FIAT </option>
							<option value="FORD">
							FORD </option>
							<option value="GREATWALL">
							GREATWALL </option>
							<option value="HOLDEN">
							HOLDEN </option>
							<option value="HONDA">
							HONDA </option>
							<option value="HUMMER">
							HUMMER </option>
							<option value="HYUNDAI">
							HYUNDAI </option>
							<option value="INFINITI">
							INFINITI </option>
							<option value="ISUZU">
							ISUZU </option>
							<option value="JAGUAR">
							JAGUAR </option>
							<option value="JEEP">
							JEEP </option>
							<option value="KIA">
							KIA </option>
							<option value="LAMBORGHINI">
							LAMBORGHINI </option>
							<option value="LAND ROVER">
							LAND ROVER </option>
							<option value="LEXUS">
							LEXUS </option>
							<option value="LOTUS">
							LOTUS </option>
							<option value="Make">
							Make </option>
							<option value="MASERATI">
							MASERATI </option>
							<option value="MAZDA">
							MAZDA </option>
							<option value="MERCEDES">
							MERCEDES </option>
							<option value="MG">
							MG </option>
							<option value="MINI">
							MINI </option>
							<option value="MITSUBISHI">
							MITSUBISHI </option>
							<option value="NISSAN">
							NISSAN </option>
							<option value="PEUGEOT">
							PEUGEOT </option>
							<option value="PORSCHE">
							PORSCHE </option>
							<option value="PROTON">
							PROTON </option>
							<option value="RENAULT">
							RENAULT </option>
							<option value="SAAB">
							SAAB </option>
							<option value="SKODA">
							SKODA </option>
							<option value="SSANGYONG">
							SSANGYONG </option>
							<option value="SUBARU">
							SUBARU </option>
							<option value="SUZUKI">
							SUZUKI </option>
							<option value="TOYOTA">
							TOYOTA </option>
							<option value="VOLKSWAGEN">
							VOLKSWAGEN </option>
							<option value="VOLVO">
							VOLVO </option>
							</select>		
							
							<select class="styled-select slate"  name="Model" id="Model" onchange="">
													
							
							</select>								
							-->
							<input type="text" value="'.$row['carMake'].'" name="Make" class="email" id="Make" placeholder="Car Make" required/> 
							<input type="text" value="'.$row['carModel'].'" name="Model" class="email" id="Model" placeholder="Car Model" required/> 
							<input type="text" value="'.$row['carEngine'].'" name="carEngine" class="email" id="carEngine" placeholder="Car Engine" required/> 
							<input type="text" value="'.$row['carInfo'].'" name="carInfo" class="email" id="carInfo" placeholder="Car Info" required/> 
							
							<input type="text" value="'.$row['instagram'].'" name="insta" class="email" id="insta" placeholder="Instagram Username" required/> 

					
					<input type="file" name="avatar" id="file-2" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" multiple />
					<label for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Upload Car Image&hellip;</span></label>
				
	   		
			   			<button class="button button-primary full-width" type="submit" name="submit">Save</button>
		   	</center>
		   				<label for="mc-email" class="subscribe-message"></label>
			
						</form>';
				}else{
					
				
		echo'
	      			<form action="profileUpdateProc.php" class="loginForm" method="POST" class="group" novalidate="true" enctype="multipart/form-data">
<center>
						

					<input type="file" name="fileToUpload" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
					<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Upload Profile Image&hellip;</span></label>
			
							<input type="text" value="" name="age" class="email" id="age" placeholder="Age" required/> 
<!--
							<select class="styled-select slate" name="Make" id="Make" onchange="changeModel()">
							<option value="0">
							Please Select Make </option>
							<option value="ALFA ROMEO">
							ALFA ROMEO </option>
							<option value="ASTON MARTIN">
							ASTON MARTIN </option>
							<option value="AUDI">
							AUDI </option>
							<option value="BENTLEY">
							BENTLEY </option>
							<option value="BMW">
							BMW </option>
							<option value="CHRYSLER">
							CHRYSLER </option>
							<option value="CITROEN">
							CITROEN </option>
							<option value="DAEWOO">
							DAEWOO </option>
							<option value="DAIHATSU">
							DAIHATSU </option>
							<option value="DATSUN">
							DATSUN </option>
							<option value="DODGE">
							DODGE </option>
							<option value="EUNOS">
							EUNOS </option>
							<option value="FERRARI">
							FERRARI </option>
							<option value="FIAT">
							FIAT </option>
							<option value="FORD">
							FORD </option>
							<option value="GREATWALL">
							GREATWALL </option>
							<option value="HOLDEN">
							HOLDEN </option>
							<option value="HONDA">
							HONDA </option>
							<option value="HUMMER">
							HUMMER </option>
							<option value="HYUNDAI">
							HYUNDAI </option>
							<option value="INFINITI">
							INFINITI </option>
							<option value="ISUZU">
							ISUZU </option>
							<option value="JAGUAR">
							JAGUAR </option>
							<option value="JEEP">
							JEEP </option>
							<option value="KIA">
							KIA </option>
							<option value="LAMBORGHINI">
							LAMBORGHINI </option>
							<option value="LAND ROVER">
							LAND ROVER </option>
							<option value="LEXUS">
							LEXUS </option>
							<option value="LOTUS">
							LOTUS </option>
							<option value="Make">
							Make </option>
							<option value="MASERATI">
							MASERATI </option>
							<option value="MAZDA">
							MAZDA </option>
							<option value="MERCEDES">
							MERCEDES </option>
							<option value="MG">
							MG </option>
							<option value="MINI">
							MINI </option>
							<option value="MITSUBISHI">
							MITSUBISHI </option>
							<option value="NISSAN">
							NISSAN </option>
							<option value="PEUGEOT">
							PEUGEOT </option>
							<option value="PORSCHE">
							PORSCHE </option>
							<option value="PROTON">
							PROTON </option>
							<option value="RENAULT">
							RENAULT </option>
							<option value="SAAB">
							SAAB </option>
							<option value="SKODA">
							SKODA </option>
							<option value="SSANGYONG">
							SSANGYONG </option>
							<option value="SUBARU">
							SUBARU </option>
							<option value="SUZUKI">
							SUZUKI </option>
							<option value="TOYOTA">
							TOYOTA </option>
							<option value="VOLKSWAGEN">
							VOLKSWAGEN </option>
							<option value="VOLVO">
							VOLVO </option>
							</select>		
							
							<select class="styled-select slate"  name="Model" id="Model" onchange="">
													
							
							</select>								
							-->
							<input type="text" value="" name="Make" class="email" id="Make" placeholder="Car Make" required/> 
							<input type="text" value="" name="Model" class="email" id="Model" placeholder="Car Model" required/> 
							<input type="text" value="" name="carEngine" class="email" id="carEngine" placeholder="Car Engine" required/> 
							<input type="text" value="" name="carInfo" class="email" id="carInfo" placeholder="Car Info" required/> 
							
							<input type="text" value="" name="insta" class="email" id="insta" placeholder="Instagram Username" required/> 
							<input type="hidden" name="new" value="new"></input>
					
					<input type="file" name="avatar" id="file-2" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" multiple />
					<label for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Upload Car Image&hellip;</span></label>
				
	   		
			   			<button class="button button-primary full-width" type="submit" name="submit">Save</button>
		   	</center>
		   				<label for="mc-email" class="subscribe-message"></label>
			
						</form>';
				}
				
						?>
						
	      	

	      		</div>	      		
	      	           	
	      	</div> <!-- /subscribe -->         

	      </div> <!-- /row -->

   	</div> <!-- /footer-main -->

<script>
function changeModel(){
	document.getElementById("Model").options.length = 0;

var e = document.getElementById("Make");
var strUser = e.options[e.selectedIndex].value;

var select1 = document.getElementById("Make");
var select2 = document.getElementById("Model");
if(strUser == "ALFA ROMEO"){
	var o = document.createElement("option");
			o.value = "Please Select Model";
			o.text = "Please Select Model";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "164";
			o.text = "164";
			select2.appendChild(o);
			var o = 	document.createElement("option");
			o.value = "ALFETTA";
			o.text = "ALFETTA";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "BRERA";
			o.text = "BRERA";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "GIULIETTA";
			o.text = "GIULIETTA";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "GT";
			o.text = "GT";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "GTV";
			o.text = "GTV";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "GTV6";
			o.text = "GTV6";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "SPIDER";
			o.text = "SPIDER";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "SPRINT";
			o.text = "SPRINT";
			select2.appendChild(o);
}
if(strUser == "ASTON MARTIN"){
	var o = document.createElement("option");
			o.value = "Please Select Model";
			o.text = "Please Select Model";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "DB5";
			o.text = "DB5";
			select2.appendChild(o);
			var o = 	document.createElement("option");
			o.value = "DB6";
			o.text = "DB6";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "DB9";
			o.text = "DB9";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "DBS";
			o.text = "DBS";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "GT";
			o.text = "GT";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "GTV";
			o.text = "GTV";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "GTV6";
			o.text = "GTV6";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "RAPIDE";
			o.text = "RAPIDE";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "V12";
			o.text = "V12";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "V8";
			o.text = "V8";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "VANQUISH";
			o.text = "VANQUISH";
			select2.appendChild(o);
}
if(strUser == "BENTLEY"){
	var o = document.createElement("option");
			o.value = "Please Select Model";
			o.text = "Please Select Model";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "ARNAGE";
			o.text = "ARNAGE";
			select2.appendChild(o);
			var o = 	document.createElement("option");
			o.value = "AZURE";
			o.text = "AZURE";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "BROOKLANDS";
			o.text = "BROOKLANDS";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "CONTINENTAL";
			o.text = "CONTINENTAL";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "EIGHT";
			o.text = "EIGHT";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "MULSANNE";
			o.text = "MULSANNE";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "T";
			o.text = "T";
			select2.appendChild(o);
			
}			
if(strUser == "BMW"){
	var o = document.createElement("option");
			o.value = "Please Select Model";
			o.text = "Please Select Model";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "1 SERIES";
			o.text = "1 SERIES";
			select2.appendChild(o);
			var o = 	document.createElement("option");
			o.value = "2 SERIES";
			o.text = "2 SERIES";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "3 SERIES";
			o.text = "3 SERIES";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "4 SERIES";
			o.text = "4 SERIES";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "5 SERIES";
			o.text = "5 SERIES";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "6 SERIES";
			o.text = "6 SERIES";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "7 SERIES";
			o.text = "7 SERIES";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "8 SERIES";
			o.text = "8 SERIES";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "E30";
			o.text = "E30";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "M1";
			o.text = "M1";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "M3";
			o.text = "M3";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "M4";
			o.text = "M4";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "M5";
			o.text = "M5";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "M6";
			o.text = "M6";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "X1";
			o.text = "X1";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "X3";
			o.text = "X3";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "X4";
			o.text = "X4";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "X5";
			o.text = "X5";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "X6";
			o.text = "X6";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "Z3";
			o.text = "Z3";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "Z4";
			o.text = "Z4";
			select2.appendChild(o);
			
}
if(strUser == "CHRYSLER"){
	var o = document.createElement("option");
			o.value = "Please Select Model";
			o.text = "Please Select Model";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "300C";
			o.text = "300C";
			select2.appendChild(o);
			var o = 	document.createElement("option");
			o.value = "CROSSFIRE";
			o.text = "CROSSFIRE";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "GRAND VOYAGER";
			o.text = "GRAND VOYAGER";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "NEON";
			o.text = "NEON";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "PT CRUISER";
			o.text = "PT CRUISER";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "SEBRING";
			o.text = "SEBRING";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "VOYAGER";
			o.text = "VOYAGER";
			select2.appendChild(o);
			
}
if(strUser == "CITROEN"){
	var o = document.createElement("option");
			o.value = "Please Select Model";
			o.text = "Please Select Model";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "BERLINGO";
			o.text = "BERLINGO";
			select2.appendChild(o);
			var o = 	document.createElement("option");
			o.value = "C2";
			o.text = "C2";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "C4";
			o.text = "C4";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "C5";
			o.text = "C5";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "C6";
			o.text = "C6";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "DISPATCH";
			o.text = "DISPATCH";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "DS3";
			o.text = "DS3";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "LACETTI";
			o.text = "LACETTI";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "XSARA";
			o.text = "XSARA";
			select2.appendChild(o);
			
}
if(strUser == "DAEWOO"){
	var o = document.createElement("option");
			o.value = "Please Select Model";
			o.text = "Please Select Model";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "CIELO";
			o.text = "CIELO";
			select2.appendChild(o);
			var o = 	document.createElement("option");
			o.value = "ESPERO";
			o.text = "ESPERO";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "KALOS";
			o.text = "KALOS";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "KORANDO";
			o.text = "KORANDO";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "LACETTI";
			o.text = "LACETTI";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "LANOS";
			o.text = "LANOS";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "LEGANZA";
			o.text = "LEGANZA";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "MATIZ";
			o.text = "MATIZ";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "NUBIRA";
			o.text = "NUBIRA";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "TACUMA";
			o.text = "TACUMA";
			select2.appendChild(o);
			
}
if(strUser == "DODGE"){
	var o = document.createElement("option");
			o.value = "Please Select Model";
			o.text = "Please Select Model";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "AVENGER";
			o.text = "AVENGER";
			select2.appendChild(o);
			var o = 	document.createElement("option");
			o.value = "CALIBER";
			o.text = "CALIBER";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "JOURNEY";
			o.text = "JOURNEY";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "NITRO";
			o.text = "NITRO";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "VIPER";
			o.text = "VIPER";
			select2.appendChild(o);
						
}
if(strUser == "FERRARI"){
	var o = document.createElement("option");
			o.value = "Please Select Model";
			o.text = "Please Select Model";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "250";
			o.text = "250";
			select2.appendChild(o);
			var o = 	document.createElement("option");
			o.value = "308";
			o.text = "308";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "328";
			o.text = "328";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "348";
			o.text = "348";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "360";
			o.text = "360";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "365";
			o.text = "365";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "400";
			o.text = "400";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "412";
			o.text = "412";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "456";
			o.text = "456";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "458";
			o.text = "458";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "512";
			o.text = "512";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "550";
			o.text = "550";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "575";
			o.text = "575";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "599";
			o.text = "599";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "612";
			o.text = "612";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "CALIFORNIA";
			o.text = "CALIFORNIA";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "DINO";
			o.text = "DINO";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "F355";
			o.text = "F355";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "F430";
			o.text = "F430";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "MONDIAL";
			o.text = "MONDIAL";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "SCUDERIA";
			o.text = "SCUDERIA";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "SUPERAMERICA";
			o.text = "SUPERAMERICA";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "TESTAROSSA";
			o.text = "TESTAROSSA";
			select2.appendChild(o);
						
}
if(strUser == "MERCEDES"){
	var o = document.createElement("option");
			o.value = "Please Select Model";
			o.text = "Please Select Model";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "A SERIES";
			o.text = "A SERIES";
			select2.appendChild(o);
			var o = 	document.createElement("option");
			o.value = "B SERIES";
			o.text = "B SERIES";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "C SERIES";
			o.text = "C SERIES";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "CL CLASS";
			o.text = "CL CLASS";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "CLA CLASS";
			o.text = "CLA CLASS";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "CLK CLASS";
			o.text = "CLK CLASS";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "CLS CLASS";
			o.text = "CLS CLASS";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "E CLASS";
			o.text = "E CLASS";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "GL CLASS";
			o.text = "GL CLASS";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "GLA CLASS";
			o.text = "GLA CLASS";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "GLK CLASS";
			o.text = "GLK CLASS";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "ML";
			o.text = "ML";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "R CLASS";
			o.text = "R CLASS";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "S CLASS";
			o.text = "S CLASS";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "SL CLASS";
			o.text = "SL CLASS";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "SLK CLASS";
			o.text = "SLK CLASS";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "SPRINTER";
			o.text = "SPRINTER";
			select2.appendChild(o);
			var o = document.createElement("option");
			o.value = "VITO";
			o.text = "VITO";
			select2.appendChild(o);
			
}

		
}
</script>
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
 <script src='js/jquery.min.js'></script>

   
</body>

</html>
