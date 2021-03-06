<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" type="image/x-icon" href="/icons/xfficient_icon.png" />
    <title>Xfficient</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
	<script>
	jQuery(document).ready(function ($) {
		var like_status = true;
                var width=$(window).width();
                var height=$(window).height();
		$('#like').click(function(){
			if(like_status){
			$.ajax({
				url: 'like.php',
				type: "GET",
				success: function(result){ like_status=false; document.getElementById("like_p").textContent = result + " people liked Chu Lin"}
			});
			}
			else { alert("Your support means a lot!!!Thanks!") }
		});
                $('#title').show();
                $('.item').css({
                        top: 0.03 * height + 'px',
                        'font-size': 0.03 * height +'px'
                });
                $('#title').css({
                        'font-size': 0.06 * width +'px'
                });
                var pop_width=$('.open').width();
                var pop_height=$('.open').height();
                $('#resume_iframe').css({
                        width: 0.4 * width +'px',
                        height: 0.8* height +'px'
                });
		$('.content .open .resume_popup').css({
                        width: 0.405 * width +'px',
                        height: 0.82* height +'px'
                });
                $('#message').css({
                        width:  0.45* width +'px',
                        height: 0.6* height +'px'
                });
                $('#resume').click(function(){
                        $('#resume_iframe').attr('src','resume_chu.htm');
                        $('.resume_popup').show(100);
                        $('#title').hide();
                });
                $(document).click(function(event){
                        if(!$(event.target).is('.content .open .resume_popup') && !$(event.target).is('#resume')&& !$(event.target).is('#about')){
                         $('.content .open .resume_popup').hide(100);
                         $('#title').show();
                        }
                });
                $('#about').click(function(){
                        $('#resume_iframe').attr('src','cover_letter.htm');
                        $('.resume_popup').show(100);
                        $('#title').hide();
                });
                $('#contact').click(function(){
                        $('.inmail').show(100);
                        $('#title').hide();
                });
                $(document).click(function(event){
                        //if(!$(event.target).is('.content .inmail') && !$(event.target).is('#contact')){
                        // $('.content .inmail').hide(100);
                        // $('#title').show();
                        //}
                });


        });

	</script>
<style>
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
    div.body {
        position: absolute;
        top: 0%;
        min-height:600px;
        right:0%;
        background-image: url("linchuyuan.jpg");
        background-size: 100% 100%;
        background-repeat: no-repeat;
        opacity: 0.8;
        width: 100%;
        height:100%;
        margin: 0 0;
    }
    div.padding{
	border: 3px solid #D0D0D0 ;
        border-radius: 30px;
	background-color: lightgray;
        padding:10px;
	}
    div.hidden {
	position: fixed;
	top: 0%;
	right: 0%;
	opacity: 0.1;
        margin: 0 auto;
	}
    #image {
	width: 100%;
	height: 100%;	
	opacity: 0.9;
    }
    .item {
	position:relative;
	text-decoration:None;
	color:white;
	font-family:Arial, Helvetica, sans-serif;
    }
    .nav {
	position: fixed;
	z-index: 999;
	background-color: black;
	width: 100%;
	height: 7%;
	top: 0%;
	left: 0%;
	opacity: 0.6;
   }
   nav ul {
	text-align: justify;
	line-height: 0;
	margin: 0;
	padding: 0;
   }
   nav ul:after {
	content: '';
	display: inline-block;
	width: 100%;
   }
   nav ul li {
	display: inline-block;
	line-height: 100%;
   }
   div.content {
	position: absolute;
	top: 10%;
	width :90%;
	height: 80%;
	margin-left:10%;
	margin-right:0;
   }
   .open {
	display: inline-block;
	left: 0%;
	min-width:45%;
	height:80%;
	margin: 0 0 0 0;
  }
  .resume_popup {
	display: none;
	background-color: white; 
	border: 5px solid #D0D0D0 ;
	border-radius: 30px;
	padding: 20px;
	position: absolute;
	overflow: auto;
	left: 0%;
	top: 0%;
	margin: 0 0 0 0;
  }
    .my_image {
        position: absolute;
	right: 0%;
	width: 55%;
	height: 100%;
        overflow; hidden;
  }
  .inmail {
        display: none;
        border: 5px solid #D0D0D0 ;
        border-radius: 30px;
        padding: 20px;
	height: 100%;
	background-color: lightgray;
        position: absolute;
        left: 0%;
        top: -5%;
        margin: 0 0 0 0;
  }
		  
</style>
</head>
    
<body>
<div class="body"></div>
<a href="#" id="like" style="position:fixed; width:3.5%; height:5%; left:15%; top: 1%; z-index:1000"><img src="like.png" style="width:100%; height:100%"></a>
<a href="https://www.linkedin.com/profile/view?id=AAkAABKAyJMBuw-FsepTXB8Bb_8JYi5jXqDw1vM&authType=NAME_SEARCH&authToken=Fu4T&locale=en_US&trk=tyah&trkInfo=clickedVertical%3Amynetwork%2CclickedEntityId%3A310429843%2CauthType%3ANAME_SEARCH%2Cidx%3A1-1-1%2CtarId%3A1447263889048%2Ctas%3Achu" id="linkedin"" style="position:fixed; width:3.5%; height:5%; left:20%; top: 1%; z-index:1000"><img src="linkedin.png" style="width:100%; height:100%"></a>
<div class='nav'>
<nav style="margin-left:25%;margin-right:25%">
<ul>
<li><a href="#" class="item" id="resume">Resume</a></li>
<li><a href="#" class="item" id="about">About Me</a></li>
<li><a href="#" class="item" id="contact">Contact Me</a></li>
</ul>
</nav>
</div>
<img src="linchuyuan_head.png"  class="my_image">
<div class="content">
<div class="open">
<h2 id="title" style="position:relative; display: none; left:20%; font-style: oblique; text-shadow: 0.1em 0.1em 0.05em #333">Cheif Designer<br>Chu Lin</h2>
<h2 id="like_p" style="position:relative;  left:20%; font-style: oblique; text-shadow: 0.1em 0.1em 0.05em #333"></h2>
<div class="resume_popup">
<iframe id="resume_iframe" src="display_pdf.php"></iframe>
</div>
</div>
<div class="inmail">
<form method="post" action="inmail.php">
  Your Email: <input name="email" id="email" type="text" /><br />
  <p style="white-space: pre;">Subject:        <input name="subject" id="subject" type="text" /><br /><p>

  Message:<br />
  <textarea name="message" id="message"></textarea><br />

  <input type="submit" value="Send" />
</form>
</div>

</div>

</body>
</html>

