<?php
	session_start();
	ob_start( );
	include('dbConn.php');
	
		$email = $_SESSION["email"];

	if( isset($_POST['message']) )
	{
		 
		 $message = $_POST['message'];
		 
		 $userEmail = $_POST['userEmail'];
		 $meetID = $_POST['meetID'];
		 $sql = "INSERT INTO chat (message,userEmail,meetID)
		VALUES ('$message','$userEmail','$meetID')";
			
		$result = mysql_query($sql);
	}
	$meetID = $_GET['id'];
	$query24 = "SELECT * FROM chat WHERE meetID='$meetID' order by Id DESC";
	$result24= mysql_query($query24);
function get_timeago( $ptime )
{
    $estimate_time = time() - $ptime;

    if( $estimate_time < 1 )
    {
        return 'Less than 1 second ago';
    }

    $condition = array( 
                12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $estimate_time / $secs;

        if( $d >= 1 )
        {
            $r = round( $d );
            return 'About ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
        }
    }
}
?>

    <meta charset="utf-8">
    <meta name="robots" content="noindex">

    <title>Chat</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    body{
    height:400px;
    position: fixed;
    bottom: 0;
	background-color : transparent;

	
}
.col-md-2, .col-md-10{
    padding:0;
}
.panel{
    margin-bottom: 0px;
}
.chat-window{
    bottom:0;
    position:fixed;
    float:right;
    margin-left:10px;
}
.chat-window > div > .panel{
    border-radius: 5px 5px 0 0;
}
.icon_minim{
    padding:2px 10px;
}
.msg_container_base{
  background: #e5e5e5;
  margin: 0;
  padding: 0 10px 10px;
  max-height:300px;
  overflow-x:hidden;
}
.top-bar {
  background: #666;
  color: white;
  padding: 10px;
  position: relative;
  overflow: hidden;
}
.msg_receive{
    padding-left:0;
    margin-left:0;
}
.msg_sent{
    padding-bottom:20px !important;
    margin-right:0;
}
.messages {
  background: white;
  padding: 10px;
  border-radius: 2px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  max-width:100%;
}
.messages > p {
    font-size: 13px;
    margin: 0 0 0.2rem 0;
  }
.messages > time {
    font-size: 11px;
    color: #ccc;
}
.msg_container {
    padding: 10px;
    overflow: hidden;
    display: flex;
}
img {
    display: block;
    width: 100%;
}
.avatar {
    position: relative;
}
.base_receive > .avatar:after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 0;
    height: 0;
    border: 5px solid #FFF;
    border-left-color: rgba(0, 0, 0, 0);
    border-bottom-color: rgba(0, 0, 0, 0);
}

.base_sent {
  justify-content: flex-end;
  align-items: flex-end;
}
.base_sent > .avatar:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 0;
    border: 5px solid white;
    border-right-color: transparent;
    border-top-color: transparent;
    box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
}

.msg_sent > time{
    float: right;
}



.msg_container_base::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

.msg_container_base::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

.msg_container_base::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

.btn-group.dropup{
    position:fixed;
    left:0px;
    bottom:0;
}
.col-xs-12 {
    width: 400px;
}
.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
   
    padding-left: 0px;
    
}
    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'http://bootsnipp.com');
        });
    </script>
</head>

	<div class="container">
    <div class="row chat-window col-xs-5 col-md-3" id="chat_window_1" style="margin-left:10px;">
        <div class="col-xs-12 col-md-12">
        	<div class="panel panel-default">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat | <?echo$_GET['meetName']?></h3>
                    </div>
                    <div class="col-md-4 col-xs-4" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                    </div>
                </div>
                <div class="panel-body msg_container_base">
				<?php
					while($row24 = mysql_fetch_assoc($result24)){
						$tempEmail = $row24['userEmail'];
						$query25 = "SELECT * FROM users WHERE email='$tempEmail'";
						$result25 = mysql_query($query25);

						$row25 = mysql_fetch_assoc($result25);
						$timeago=get_timeago(strtotime($row24['time']));
						
						if($row24['userEmail'] == $email){
							
							echo'
						<div class="row msg_container base_sent">
							<div class="col-md-10 col-xs-10">
								<div class="messages msg_sent">
									<p>'.$row24['message'].'</p>
									<time datetime="'.$row24['time'].'">'.$row25['name'].' &#8226; '.$timeago.'</time>
								</div>
							</div>
							<div class="col-md-2 col-xs-2 avatar">
								<a href="http://supercarvibe.com/profile.php?id='.$row25['id'].'"><img src="'.$row25['avatar'].'" class=" img-responsive "></a>
							</div>
						</div>';
						}else{
							echo'<div class="row msg_container base_receive">
                        <div class="col-md-2 col-xs-2 avatar">
                            <a href="http://supercarvibe.com/profile.php?id='.$row25['id'].'"><img src="'.$row25['avatar'].'" class=" img-responsive "></a>
                        </div>
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_receive">
                                <p>'.$row24['message'].'</p>
                                <time datetime="'.$row24['time'].'">'.$row25['name'].' &#8226; '.$timeago.'</time>
                            </div>
                        </div>
                    </div>';
							
						}
						
					}
				?>
					
                   
                    
                        
                    </div>
                </div>
				
                <div class="panel-footer">
				<form method="POST" action="testComment.php?id=<?echo$_GET['id']?>">
                    <div class="input-group">
						
							<input id="btn-input" name="message" type="text" class="form-control input-sm chat_input" placeholder="Write your message here...">
							<input name="userEmail" type="hidden" value="<?echo$email?>">
							<input name="meetID" type="hidden" value="<?echo$_GET['id']?>">
							<span class="input-group-btn">
							<button class="btn btn-primary btn-sm" id="btn-chat">Send</button>
							</span>
						
                    </div>
					</form>
                </div>
    		</div>
        </div>
    </div>
    
   
</div>
	<script type="text/javascript">
	$(document).on('click', '.panel-heading span.icon_minim', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('focus', '.panel-footer input.chat_input', function (e) {
    var $this = $(this);
    if ($('#minim_chat_window').hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideDown();
        $('#minim_chat_window').removeClass('panel-collapsed');
        $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '#new_chat', function (e) {
    var size = $( ".chat-window:last-child" ).css("margin-left");
     size_total = parseInt(size) + 400;
    alert(size_total);
    var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
    clone.css("margin-left", size_total);
});
$(document).on('click', '.icon_close', function (e) {
    //$(this).parent().parent().parent().parent().remove();
    $( "#chat_window_1" ).remove();
});

	</script>
<?php
echo'
<script>
window.onload = function() {
  document.getElementById("btn-input").focus();
  document.getElementById("btn-input").value = "'.$_GET['message'].'";
};
setTimeout(function(){
	var message = document.getElementById("btn-input").value;
	var id = "'.$meetID.'";
   window.location.href = "testComment.php?id="+id+"&message="+message+"&meetName='.$_GET['meetName'].'";
}, 10000);
</script>
';
?>

