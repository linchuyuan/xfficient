<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="description" content="cloud storage">
<meta name="keywords" content=cloud,xfficient,efficient,storage,linchuyuan">
<meta name="author" content="linchuyuan">
    <link rel="shortcut icon" type="image/x-icon" href="/icons/xfficient_icon.png" />
    <title>Xfficient</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
    <script src="main/jquery/slider.js"></script>
	<script>
	jQuery(document).ready(function ($) {
	var like_status = true;
	$('#like').click(function(){
	if(like_status){
		$.ajax({
		url: 'main/session/like_xfficient.php',
                type: "GET",
               	success: function(result){ like_status=false;document.getElementById("like_p").textContent = result + " people liked Xfficient"}
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
	background-color: lightgray;
        padding:10px;
	}
    div.body {
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
    div.hidden {
	position: fixed;
	top: 0%;
	right: 0%;
	opacity: 0.1;
        margin: 0 auto;
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
	<div class="body">
	</div>

    <div id="slider">
  	<ul>
    	<li><img id="image" src="main/image/halo.png"></li>
    	<li><img id="image" src="main/image/halo.png"></li>
    	<li><img id="image" src="main/image/halo.png"></li>
    	<li><img id="image" src="main/image/halo.png"></li>
  	</ul>  
    </div>
    <div class="center">
    	<h2 style="font-style: oblique;font-size: 90px;text-shadow: 0.1em 0.1em 0.05em #333; margin-top:0; margin-bottom:0;">Xfficient</h2>
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
	<a href="windows_setup.exe" download="main/windows_xfficient.exe">Windows</a><br>
    	</div>
    </div>
    </div>
<div id="footer">
<h2><a href="/producer">Producer's Page</a></h2>
</div>
</body>
</html>

