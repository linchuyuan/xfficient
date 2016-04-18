<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="description" content="cloud storage">
<meta name="keywords" content="cloud,xfficient,efficient,storage,linchuyuan">
<meta name="author" content="linchuyuan">
    <link rel="shortcut icon" type="image/x-icon" href="/icons/xfficient_icon.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <title>Xfficient</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
    <script src="main/jquery/slider.js"></script>
	<script>
	jQuery(document).ready(function ($) {
	$('.page').width($(window).width());
	$('.page').height($(window).height());
	var like_status = true;
	$('#like').click(function(){
	if(like_status){
		$.ajax({
		url: 'main/session/like_xfficient.php',
                type: "GET",
               	success: function(result){ like_status=false;document.getElementById("like_p").innerHTML = "Including your support, <span style='font-weight: bold;color:#8B2323'>" + result + "</span> people liked xfficient"}
                });
                }
        else { alert("Your support means a lot!!!Thanks!") }
        });
	});
	</script>
<style>
    p{font-size: vmax;}
    div.center{
	position: absolute;
     	margin: auto;
    	top: 0;
     	right: 0;
     	bottom: 0;
     	left: 0;
     	width: 500px;
    	height: 500px;
	text-align: center;
    }
    div.login{
        position: relative;
	height: auto;
	width: auto;
        display: inline-block;
     	padding: 20%;
	opacity: 0.9;
	overflow: hidden;
        }
    div.padding{
	border: 3px solid #D0D0D0 ;
        border-radius: 30px;
	background-color: DimGray;
        padding:10px;
	}
    div.body {
	position: absolute;
	top: 0;
	right:0;
	left: 0;
	background-color: black;
	opacity: 0.6;
        margin: 0 0;
    }
    div.body_back {
        position: absolute;
        top: 0%;
        min-height:600px;
        right:0%;
        background-image: url("main/image/view2.jpg");
        background-size: 100% 100%;
        background-repeat: no-repeat;
        opacity: 0.8;
        width: 100%;
        height:100%;
        margin: 0 0;
    }
    div.body_back_dynamic {
        position: absolute;
        top: 0%;
        min-height:600px;
        right:0%;
        background-image: url("media/book.jpg");
        background-size: 100% 100%;
        background-repeat: no-repeat;
        opacity: 0.8;
        width: 100%;
        height:100%;
        margin: 0 0;
    }
    div.hidden {
	position: fixed;
	top: 0%;
	right: 0%;
	opacity: 0.1;
        margin: 0 auto;
    }
    .page {
	position: absolute;
	right:0;
	left:0;
	margin: 0 0 0 0;
	overflow: hidden;
    } 
    div#footer {
	position: fixed;
    	color:black;
	bottom: 0%;
	right: 0%;
	}
    #slider {
        position: absolute;
	top: 0%;
	bottom: 0%;
	left: 0%;
	right: 0%;
        overflow: hidden;
        border-radius: 0px;
    }

    #slider ul {
        position: relative;
        margin: 0;
        padding: 0;
        height: 100%;
        list-style: none;
    }
    #slider ul li {
        position: relative;
        float: left;
        display: block;
        line-height: 0px;
        }
    #image {
	width: 100%;
	height: 100%;	
	opacity: 0.9;
    }
    #video-viewport {
	position: absolute;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	margin: 0 0 0 0;
	opacity: 0.8;
	overflow: hidden;
	z-index: -1; 
    }
    a.control_prev, a.control_next {
        position: absolute;
        top: 30%;
        z-index: 999;
        display: block;
        padding: 4% 3%;
        width: auto;
        height: auto;
        background: #2a2a2a;
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        font-size: 18px;
        opacity: 0.1;
        cursor: pointer;
    }

    a.control_prev:hover, a.control_next:hover {
        opacity: 1;
        -webkit-transition: all 0.8s ease;
    }

    a.control_prev {
        border-radius: 0 2px 2px 0;
     }

    a.control_next {
        right: 0;
        border-radius: 2px 0 0 2px;
     }
</style>
</head>
    
<body>
<div class="page" id="page1" style="top:0">
	<h2 style="position:absolute; z-index:100; width:100%; text-align:center">A place for all your personal files!</h2>
	<?php
	$useragent = $_SERVER ['HTTP_USER_AGENT'];
	$useragent = $_SERVER ['HTTP_HOST'];
	echo $useragent;
	if ( !strpos($useragent,"Mobile")){?>
	<div class="body_back_dynamic"></div>
	<video  preload="preload" muted="muted" autoplay="autoplay" id="video-viewport" src="media/music7.mp4"></video>
	<script> jQuery(function(){
                $('#video-viewport').width($(window).width());
                $('#video-viewport').height($(window).height());
		$('.body').width($(window).width());
		$('.body').height($(window).height());
                $('video').css("object-fit","fill");
                $('video').css("overflow","hidden");
		$(window).resize(function(){
                $('.body').width($(window).width());
                $('.body').height($(window).height());
		$('.page').width($(window).width());
		$('.page').height($(window).height());
                $('#video-viewport').width($(window).width());
                $('#video-viewport').height($(window).height());
		$('video').css("object-fit","fill");
		$('video').css("overflow","hidden");
		});
	//	$('#video-viewport').trigger('play');
	});</script>
	<?php } else {?>
	<div class="body_back"></div>
	<div id="slider">
        <ul>
        <li><img id="image" src="main/image/halo.png"></li>
        <li><img id="image" src="main/image/halo.png"></li>
        <li><img id="image" src="main/image/halo.png"></li>
        <li><img id="image" src="main/image/halo.png"></li>
        </ul>
	</div> <?php } ?>
    <div class="center">
    	<h2 style="font-style: oblique;font-size:80px;text-shadow: 0.1em 0.1em 0.05em #333; margin-top:0; margin-bottom:0;"><img src="/icons/xfficient_icon.png" style="position:relative; top:10px; width:100px; height:100px;">FFICIENT</h2>
	<a href="#" id="like" style="z-index:1000"><img src="producer/linchuyuan/like.png" style="width:10%; height:10%"></a>
	<p  id="like_p" style="margin-top:0; margin-bottom:0;"><?php $content=file_get_contents('main/data_base/like_xfficient.txt'); echo (int)$content; echo " people liked Xfficient";?> </p>
    <div class="login">
	<div class="padding">
        <form action="main/session/session.php" method="post">
	Username:<br>
        <input name="username" type=text placeholder="Username" style="max-width:150px;width:auto"><br>
	Password:<br>
        <input name="password" type=password placeholder="Password" style="max-width:150px;width:auto"><br><br>
        <input type=submit value="login">
	<br>
	<br>
        </form>
        <form action="main/register.html">
	<input type=submit value="Register">
	</form>
	<a href="main/windows_setup.exe" download>Windows</a><br>
    	</div>
    </div>
    </div>
</div>
<?php /*
<div class="page" id="page2" style="top:100%">
</div>
<div class="page" id="page3" style="top:200%">
</div>
*/ ?>
<div id="footer">
<h2><a href="/producer">Producer's Page</a></h2>
</div>
</body>
</html>

