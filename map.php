<?php
	
	session_start();
ob_start( );
	include('dbConn.php');
	
	$email = $_SESSION["email"];
	$query2 = "SELECT * FROM users WHERE email='$email'";
	$result2 = mysql_query($query2);

	$row2 = mysql_fetch_assoc($result2);
?>
<?php
	  if($_SESSION["logged"] != "true"){
		  		echo "<script type='text/javascript'>window.top.location='login.php';</script>"; exit;

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
	<title>Map | SupercarVibe</title>
	<meta name="description" content="Car Meets At Your Fingertips | Meet Map Page | SupercarVibe">
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
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
		 margin-top:100px;
        height: 89%;
      }
      
   
/* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
		overflow-y: hidden;
    overflow-x: hidden; 

      }<?php
	  if($_SESSION["logged"] != "true"){
					echo'  #map {
  -webkit-filter: blur(5px);
  -moz-filter: blur(5px);
  -o-filter: blur(5px);
  -ms-filter: blur(5px);
  filter: blur(5px);
 
  background-color: #ccc;

}';

						
					}
					?>
					
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
					<li class="current"><a class="highlight with-sep"  href="Map.php" title="">Map</a></li>
					
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


   <div id="map" ></div>
   <?php
 
	
	$ip = $_SERVER['REMOTE_ADDR'];
	$json = file_get_contents("http://ipinfo.io/".$ip."/json");
	
	
	$details = json_decode($json);
	// access title of $book object
	$userLocationIP = $details->loc; 

	$array3 = explode(',', $userLocationIP);
   $userLat = $array3[0];
   $userLng = $array3[1];
   
   
   
   ?>
   
   <?php
   include('dbConn.php');
   $email = $_SESSION['email'];
    $query2 = "SELECT * FROM users where email='$email'";
	$result2 = mysql_query($query2);
	
	$row2 = mysql_fetch_assoc($result2);
	
   $query = "SELECT * FROM carMeets";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_assoc($result);
   $id = $row2['id'];
   
   
if (strpos($row['usersGoing'], ",".$id.",") !== false) {
    	 $isGoing = "false";

}else{
	 $isGoing = "true";
	
}
   
   ?>
    <script>
	   
	var isGoing ="<?echo$isGoing?>";
    
	
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        },
		meet: {
           icon: 'http://www.clipartbest.com/cliparts/niX/oR4/niXoR45xT.png'
        }
      }; 
var x = document.getElementById("demo");

var myLatLng = {<?echo'lat: '.$userLat.', lng: '.$userLng.''?>};

			
			
        function initMap() {
			
			
        var map = new google.maps.Map(document.getElementById('map'), {
			
          center: myLatLng,
		  
		  styles: [{"featureType":"all","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"all","elementType":"labels","stylers":[{"visibility":"on"},{"saturation":"-100"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40},{"visibility":"on"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#4d6059"}]},{"featureType":"landscape","elementType":"geometry.stroke","stylers":[{"color":"#4d6059"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"color":"#4d6059"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"lightness":21}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#4d6059"}]},{"featureType":"poi","elementType":"geometry.stroke","stylers":[{"color":"#4d6059"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#7f8d89"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#7f8d89"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#7f8d89"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#7f8d89"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#7f8d89"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#7f8d89"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#7f8d89"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#7f8d89"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#2b3638"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2b3638"},{"lightness":17}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#24282b"}]},{"featureType":"water","elementType":"geometry.stroke","stylers":[{"color":"#24282b"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"labels.icon","stylers":[{"visibility":"on"}]}],
          zoom: 9
		  
        });
		

        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('markers.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var id = markerElem.getAttribute('id');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
			  var url = markerElem.getAttribute('url');
			  var numPeople = markerElem.getAttribute('numPeople');

              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
             
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

        
               var text = document.createElement('text');

              text.textContent = address
			  
			 var attendanceText = document.createElement('text');

             

			   var numbPeople = document.createElement('text');
				numbPeople.textContent = "People Attending: "+numPeople;

			  var goAttendance = document.createElement('a');
				goAttendance.href = "/setAttendance.php?meetID="+id+"&attendance=going&reference=map";
				goAttendance.textContent = "Going?"
				
			  var noAttendance = document.createElement('a');
				noAttendance.href = "/setAttendance.php?meetID="+id+"&attendance=notGoing&reference=map";
				noAttendance.textContent = "Cant Go?"
			                
			   var open = document.createElement('a');
				open.href = url;
				open.textContent = "View Meet"
			                

              infowincontent.appendChild(text);
			   infowincontent.appendChild(document.createElement('br'));
              infowincontent.appendChild(numbPeople);
			  infowincontent.appendChild(document.createElement('br'));
				if(isGoing == "true"){
										attendanceText.textContent = "You are currently not going to this meet.";

					              infowincontent.appendChild(attendanceText);
			  infowincontent.appendChild(document.createElement('br'));

					 
								  infowincontent.appendChild(goAttendance);

				}
				if(isGoing == "false"){
										attendanceText.textContent = "You are currently going to this meet.";

					              infowincontent.appendChild(attendanceText);
								  			  infowincontent.appendChild(document.createElement('br'));

					infowincontent.appendChild(noAttendance);

				}

			  infowincontent.appendChild(document.createElement('br'));

			  infowincontent.appendChild(open);
             // var icon = customLabel[type] || {};
			  var icon = {
				url: "images/SCVmarkerIcon.png", // url
				scaledSize: new google.maps.Size(50, 50), // scaled size
				origin: new google.maps.Point(0,0), // origin
				anchor: new google.maps.Point(0, 0) // anchor
			};
              var marker = new google.maps.Marker({
                map: map,
				url: url,

                position: point,
               
				icon: icon
				
              });
			  
			   
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
			  
            });
          });
        }
		



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPUu3LlVkmlv-Kfs8btDaDgKowLj4nqUs&callback=initMap">
    </script>

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