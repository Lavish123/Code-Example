
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

	$log = $_SESSION["logged"];

	$query = "SELECT * FROM markers WHERE id='$meetID'";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_assoc($result);
	$authorEmail = $row['authorEmail'];
	$query2 = "SELECT * FROM users WHERE email='$authorEmail'";
	$result2 = mysql_query($query2);
	$row2 = mysql_fetch_assoc($result2);


	if (isset($_GET['notificationID'])) {
	    $notID = $_GET['notificationID'];
			$sql2 = "DELETE FROM notifications WHERE id='$notID'";
			$result2 = mysql_query($sql2);
	}
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
	<title>'.$row["name"].' | SupercarVibe</title>
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

<style>
ul.products li {
    width: 150px;
    display: inline-block;
    vertical-align: top;
    *display: inline;
    *zoom: 1;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
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


				<h2>Author:</h2>
				<?php

if(file_exists($row2['avatar']))
    $avatar = $row2['avatar'];
else
    $avatar = "http://supercarvibe.com/userInfo/userProfile/placeholderProfile.jpg";

?>
               <?php
			   echo'
               	<a href="profile.php?id='.$row2['id'].'"><div class="testimonial-author">
                    	<img src="'.$avatar.'" alt="Author image">
                    	<div class="author-info">'.$row2['name'].'<span class="position">Age: '.$row2['age'].'</span>
                    	</div></a>
                  </div>';

                      ?>







         </div> <!-- /testimonial-slider -->
		 </div>
		 <div id="two">
<?php

				$query14 = "SELECT * FROM carMeets WHERE meetID='$meetID'";
				$result14 = mysql_query($query14);
				$row14 = mysql_fetch_assoc($result14);
				$userEmail = $_SESSION["email"];

				$query13 = "SELECT * FROM users WHERE email='$userEmail'";
				$result13 = mysql_query($query13);
				$row13 = mysql_fetch_assoc($result13);
				$userID = $row13['id'];
				$string = $row14['usersGoing'];
				$query50 = "SELECT * FROM carMeets WHERE meetID='$meetID'";
				$result50 = mysql_query($query50);
				$row50 = mysql_fetch_assoc($result50);
				$usersGoing = $row50['usersGoing'];

				$array = explode(',', $string);
				$j = (int)count($array) -1;
				$i=1;
				echo'<div class="col-twelve">
   			<h2 class="h01">Meet Info:</h2>
   		</div>  ';
				echo'<br>';
			echo'<br>';
			echo'<h3>Address: <br>'.$row['address'].'<h3>';


			echo'<h3>Date: '.$row['meetDate'].'<h3>';

			echo'<p style="font-size:18px;">Info: <br>'.$row['meetInfo'].'<p>';
			$wedding = strtotime($row['meetDate']); // or whenever the wedding is
			$current=strtotime('now');
			$diffference =$wedding-$current;
			$days=floor($diffference / (60*60*24));

			echo "$days days until meet.";


			echo'
	<center><div id="map" style="width:487px;height:325px;border: 7px solid #EAEAED;"></div></center>

<script>
function initMap() {
        var myLatLng = {lat: '.$row["lat"].', lng: '.$row["lng"].'};

        var map = new google.maps.Map(document.getElementById("map"), {
          zoom: 15,
		  styles: [{"featureType":"all","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"all","elementType":"labels","stylers":[{"visibility":"on"},{"saturation":"-100"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40},{"visibility":"on"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#4d6059"}]},{"featureType":"landscape","elementType":"geometry.stroke","stylers":[{"color":"#4d6059"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"color":"#4d6059"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"lightness":21}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#4d6059"}]},{"featureType":"poi","elementType":"geometry.stroke","stylers":[{"color":"#4d6059"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#7f8d89"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#7f8d89"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#7f8d89"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#7f8d89"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#7f8d89"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#7f8d89"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#7f8d89"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#7f8d89"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#2b3638"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2b3638"},{"lightness":17}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#24282b"}]},{"featureType":"water","elementType":"geometry.stroke","stylers":[{"color":"#24282b"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"labels.icon","stylers":[{"visibility":"on"}]}],

          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,

          title: "'.$row["name"].'"
        });
      }
</script>


     <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPUu3LlVkmlv-Kfs8btDaDgKowLj4nqUs&callback=initMap">
    </script>



 <br>

			';

				echo'<div id="" style="overflow-y: scroll; height:400px;border: 7px solid #EAEAED;"><h1>Users Going:</h1><br><ul class="products">';
				while ($i<$j){
					$query4 = "SELECT * FROM users WHERE id='$array[$i]'";
					$result4 = mysql_query($query4);
					$row4 = mysql_fetch_assoc($result4);

				if(file_exists($row4['avatar']))
					$avatar = $row4['avatar'];
				else
					$avatar = "http://supercarvibe.com/userInfo/userProfile/placeholderProfile.jpg";


			   echo'<li style="background-color:#eaeaed;"">
						<a href="profile.php?id='.$row4['id'].'">
							<img src="'.$avatar.'"/>
							<h4>'.$row4['name'].'</h4>
							<h5>Car: '.$row4['carModel'].'</h5>
						</a>
					</li>
					';



					$i++;
				}
				echo'</ul></div>';
			?>
			</div>
			</section>
		 	<div class="row">


			<?php

				$tempVal = ','.$userID.',';
				if (strpos($usersGoing,$tempVal) !== false) {
					echo'
				<a href="setAttendance.php?meetID='.$row["id"].'&attendance=notGoing"><button class="button button-primary full-width">Cant Go</button></a>';

				}else{

			echo'
				<a href="setAttendance.php?meetID='.$row["id"].'&attendance=going"><button class="button button-primary full-width">Going</button></a>';
				}

			?>
			<button id="myBtn" class="button button-primary full-width">Invite User</button>


			<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form action="sendInvite.php" method="POST" >
			<input type="email"name="sendEmail" value="" placeholder="Users Email">
			<input type="hidden" name="meetID" value="<?php echo$_GET['meetID'];?>">
			<button class="button button-primary full-width">Send Invite</button>
		</form>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
				<button class="button button-primary full-width" onclick="myNavFunc()">Get Directions</button>

   	</div>
<?php


function adflyShortenURL($url, $uid, $key){
    $apiURL = 'http://api.adf.ly/api.php?';

    // api queries
    $query = array(
        'key' => $key,
        'uid' => $uid,
        'advert_type' => 'int',
        'domain' => 'adf.ly'
    );

    // full api url with query string
    $apiURL = $apiURL . http_build_query($query).'&url='.$url;

    // get data
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiURL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );

    $data = curl_exec($ch);
    curl_close($ch);
    return $data;

}
	 $uid = "15934457";
    $key = "58a14237cd2fb191803c1740bed9f436";
    $url = 'http://supercarvibe.com/meetPage.php?meetID='.$_GET['meetID'];
    $return = adflyShortenURL($url, $uid, $key);
?>
	<input type="text" value="<?php echo$return?>"></input>

	<br>
	<br>
	<br>
	<div class="row section-intro">
   		<div class="col-twelve with-bottom-line">

   			<h5>Promoted</h5>


   		</div>

   	</div>
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
	<div>



	</div>

<script>
function myNavFunc(){

    if( (navigator.platform.indexOf("iPhone") != -1)
        || (navigator.platform.indexOf("iPod") != -1)
        || (navigator.platform.indexOf("iPad") != -1))
         window.open("maps://maps.google.com/maps?daddr=<?echo$row["lat"]?>,<?echo$row["lng"]?>&amp;ll=");
    else
         window.open("http://maps.google.com/maps?daddr=<?echo$row["lat"]?>,<?echo$row["lng"]?>&amp;ll=");
}

</script>


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
   <?php
   echo'
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Event",
  "name": "'.$row['address'].'",
  "startDate" : "'.$row['meetDate'].'",
  "url" : "http://supercarvibe.com/meetPage.php?meetID='.$row['id'].'",
  "location" : {
    "@type" : "Place",
    "sameAs" : "http://www.hi-dive.com",
    "name" : "'.$row['name'].'",
    "address" : "'.$row['address'].'"
  }
}
</script>';
?>

</body>

<iframe id="iframe" frameborder="0" align="right" allowtransparency="true" style="right: 50px; width:420px; height:420px;
  z-index:50;  position: fixed;
    bottom: 0;" id="snippet-preview" src="http://supercarvibe.com/testComment.php?id=<?echo$_GET['meetID']?>&meetName=<?echo$row["name"]?>">
  <p>Your browser does not support iframes.</p>
</iframe>



</html>
