<html>
<style>

@import url(http://fonts.googleapis.com/css?family=Open+Sans);

body { 
  font-family: 'Open Sans', sans-serif;
  color: #666;
}

/* STRUCTURE */

#pagewrap {
	padding: 5px;
	width: 960px;
	margin: 20px auto;
}
header {
	height: 100px;
	padding: 0 15px;
}
#content {
	width: 290px;
	float: left;
	padding: 5px 15px;
}

#middle {
	width: 294px; /* Account for margins + border values */
	float: left;
	padding: 5px 15px;
	margin: 0px 5px 5px 5px;
}

#sidebar {
	width: 270px;
	padding: 5px 15px;
	float: left;
}
footer {
	clear: both;
	padding: 0 15px;
}

/************************************************************************************
MEDIA QUERIES
*************************************************************************************/
/* for 980px or less */
@media screen and (max-width: 980px) {
	
	#pagewrap {
		width: 94%;
	}
	#content {
		width: 33.33%;
		padding: 1% 4%;
	}
	#middle {
		width: 41%;
		padding: 1% 4%;
		margin: 0px 0px 5px 5px;
		float: right;
	}
	
	#sidebar {
		clear: both;
		padding: 1% 4%;
		width: auto;
		float: none;
	}

	header, footer {
		padding: 1% 4%;
	}
}

/* for 700px or less */
@media screen and (max-width: 600px) {

	#content {
		width: auto;
		float: none;
	}
	
	#middle {
		width: auto;
		float: none;
		margin-left: 0px;
	}
	
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


#content {
	background: #f8f8f8;
}
#sidebar {
	background: #f0efef;
}
header, #content, #middle, #sidebar {
	margin-bottom: 5px;
}

#pagewrap, header, #content, #middle, #sidebar, footer {
	border: solid 1px #ccc;
}

</style>
<body>
<div id="pagewrap">



<?php
$username = "supercarvibe";
$instaResult= file_get_contents('https://www.instagram.com/'.$username.'/media/');

$data = json_decode($instaResult);

foreach ($data->items as $items) {
    $imageLink = $items->images->standard_resolution->url;
    $imageLikes = $items->likes->count;
	echo'
	<section id="sidebar">
	<center>
		<img style="width:250px;" src="'.$imageLink.'"></img>
		<h2>'.$imageLikes.'</h2>
		</center>
	</section>
	';
	
}


?>
</div>
  
</body>


