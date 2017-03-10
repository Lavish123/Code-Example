<?php
include('dbConn.php');

$userAge = $_POST['userAge'];
$carModel = $_POST['carModel'];
$carEngine = $_POST['carEngine'];
$carInfo = $_POST['carInfo'];
$carImage = $_POST['carImage'];

$target_dir = "userInfo/";
$target_file = $target_dir ."spoonMe".".png". basename($_FILES["fileToUpload"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

echo$imageURL = $target_file;


?>

<?php
	
	
	
	$avatar = $imageURL;
	$age = $_POST['age'];
	$carMake = $_POST['carMake'];
	$carModel = $_POST['carModel'];
	$carEngine = $_POST['carEngine'];
	$carInfo = $_POST['carInfo'];
	$carImage = $_POST['carImage'];
	
	$sql = "UPDATE users SET avatar='$avatar',age='$age',carMake='$carMake',carModel='$carModel',carEngine='$carEngine',carInfo='$carInfo',carImage='$carImage' WHERE email='$email'";
	$result = mysql_query($sql);
	//echo "<script type='text/javascript'>window.top.location='userHome.php';</script>"; exit;

?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-82932600-1', 'auto');
  ga('send', 'pageview');

</script>