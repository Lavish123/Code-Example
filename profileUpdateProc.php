
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	

	<!--iOS -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="css/normalizeLoader.css">
	<link rel="stylesheet" href="css/mainLoader.css">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>
	<style type="text/css">
	.back-link a {
		color: #4ca340;
		text-decoration: none; 
		border-bottom: 1px #4ca340 solid;
	}
	.back-link a:hover,
	.back-link a:focus {
		color: #408536; 
		text-decoration: none;
		border-bottom: 1px #408536 solid;
	}
	h1 {
		height: 100%;
		/* The html and body elements cannot have any padding or margin. */
		margin: 0;
		font-size: 14px;
		font-family: 'Open Sans', sans-serif;
		font-size: 32px;
		margin-bottom: 3px;
	}
	.entry-header {
		text-align: left;
		margin: 0 auto 50px auto;
		width: 80%;
        max-width: 978px;
		position: relative;
		z-index: 10001;
	}
	#demo-content {
		padding-top: 100px;
	}
	</style>
</head>
<body class="demo" style="background-color: #171b23;">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

	<!-- Demo content -->			
	<div id="demo-content">

		

		<div id="loader-wrapper">
			<div id="loader"></div>
		</div>

	</div>
	<!-- /Demo content -->

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="js/mainLoader.js"></script>

</body>
</html>
<?php
session_start();
	ob_start();
include('dbConn.php');
$email = $_SESSION['email'];
$userAge = $_POST['userAge'];
$carModel = $_POST['carModel'];
$carEngine = $_POST['carEngine'];
$carInfo = $_POST['carInfo'];
$carImage = $_POST['carImage'];


?>

<?php
$target_dir = "userInfo/userProfile/";
$target_file = $target_dir .$email."Avatar".".png". basename($_FILES["fileToUpload"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       
        $uploadOk = 1;
    } else {
        
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    
    $uploadOk = 1;
}
// Check file size

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
    } else {
        
    }
}

echo$avatarURL = $target_file;


?>

<?php
$target_dir = "userInfo/userCar/";
$target_file = $target_dir .$email."Car".".png". basename($_FILES["avatar"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
   
    $uploadOk = 1;
}
// Check file size

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
    } else {
    }
}

echo$carURL = $target_file;


?>

<?php
		
	$avatar = $avatarURL;
	$age = $_POST['age'];
	$carMake = $_POST['Make'];
	$carModel = $_POST['Model'];
	$carEngine = $_POST['carEngine'];
	$carInfo = $_POST['carInfo'];
	$instaUser = $_POST['insta'];
	$carImage = $carURL;
	
	$sql = "UPDATE users SET avatar='$avatar',age='$age',carMake='$carMake',carModel='$carModel',carEngine='$carEngine',carInfo='$carInfo',carImage='$carImage',instagram='$instaUser' WHERE email='$email'";
	$result = mysql_query($sql);
	if( isset($_POST['new']) )
	{
			echo "<script type='text/javascript'>window.top.location='logout.php';</script>"; exit;

		
	}else{
			echo "<script type='text/javascript'>window.top.location='userHome.php';</script>"; exit;

	}

?>
