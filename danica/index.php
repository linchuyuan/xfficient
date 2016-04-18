<!DOCTYPE html>
<html>
<head>
    <META CHARSET="UTF-8">
    <META name="description" content="Keep living, keep learning is what I aim for.">
    <link rel="shortcut icon" type="image/x-icon" href="/icons/xfficient_icon.png" />
    <title>Danica@SINA</title>
	<style>
		.center_post>.hover_zoom_image img:hover
		{
			width: 65% !important;
			height: 85% !important;
			z-index: 1002 !important;
			cursor:pointer;
		}
                #comment_reply  img:hover
                {
                        width: 6% !important;
                        height: 100% !important;
                        cursor:pointer;
                }
		.quick_link{
			-moz-filter: grayscale(100%);
			-ms-filter: grayscale(100%);
			-o-filter: grayscale(100%);
			-webkit-filter: grayscale(100%);
		}
		.center_post>#the_end img:hover{
                        -moz-filter: grayscale(0%) !important; 
                        -ms-filter: grayscale(0%) !important;
                        -o-filter: grayscale(0%) !important;
                        -webkit-filter: grayscale(0%) !important;
			cursor:pointer;
		}
	</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="danica.js"></script> 
	<link rel="StyleSheet" type="text/css" href="danica.css" />
	<script>
	jQuery(document).ready(function ($) {
	$(window).on("load",function(){
	var nav_top_position ;
	var cover_image_width = $("#cover_image").width();
	var cover_image_height = $("#cover_image").height();
	var aspect_ratio = cover_image_width / cover_image_height ;
	$(".cover").css({height: $(window).width() / aspect_ratio + 'px'});
	$("#message").css({height: 0.7*$(window).height(), width: $(".inmail").width()});
	$(".nav").css({top: $(window).width() / aspect_ratio + 'px'});
	$(".center_post").css({top: $(window).width() / aspect_ratio + 0.07 * $(window).height() +'px'});
	$("#cover_image").css({width:  '100%', height: $(window).width() / aspect_ratio + 'px'});
	$(document).scroll(function(){
		nav_top_position = $(".nav").offset().top;
		nav_top_position = nav_top_position - $(window).scrollTop(); 
		if ( nav_top_position <= 0)
		{ $(".nav").css({"position": "fixed", "top": 0});}
		$(document).scroll(function() { 
			if($(".center_post").offset().top - $(window).scrollTop() > 0.07 * $(window).height()) {
				$(".nav").css({"position": "absolute", "top": $(window).width() / aspect_ratio + 'px'}); 
			}
		});
	});
	});
	});

</script>

</head>
    
<body>
<div class="sheild" style="display:none;opacity:0.5;z-index:1003;position:fixed;width:100%;height:100%;background-color:lightgray;top:0;right:0;left:0;bottom;0"></div>


<?php
        $useragent = $_SERVER ['HTTP_USER_AGENT'];
        if ( !strpos($useragent,"Mobile")){?>

<div id="center_post" style="overflow:auto;display:none;z-index:1004;opacity:0.95;background-color:white;position:fixed;left:0;right:0;top:0;bottom:0;margin:auto;width:60%;height:50%;border: 5px solid black;">
	<div id="comment_reply" style="background-color:white;position:fixed;height:40px"></div>
	<script>
		$('#comment_reply').css({
                        width: $('#center_post').width()*0.97 + 'px',
                });
		$(window).resize(function(){
			$('#comment_reply').css({
                        width: $('#center_post').width()*0.97 + 'px',
	                });
		});
	</script>	
	<div id="center_post_comments" style="margin:5%"></div>
</div>
<?php } else {?>
<div id="center_post" style="overflow:auto;display:none;z-index:1004;opacity:0.95;background-color:white;position:fixed;left:0;right:0;top:0;bottom:0;margin:auto;width:90%;height:90%;border: 5px solid black;">
        <div id="comment_reply" style="background-color:white;position:fixed;width:100%;height:30px"></div>
        <script>
                /*$('#comment_reply').css({
                        width: $('#center_post').width()*0.97 + 'px',
                });
		$(window).resize(function(){
			alert("resized");
                        $('#comment_reply').css({
                        width: $('#center_post').width()*0.97 + 'px',
                        });
                });
             */
        </script>
        <div id="center_post_comments" style="margin:5%"></div>
</div>
<?php } ?>



<div style="z-index: 1000;" class="cover" >
<img id = "cover_image" src="<?php $cover = scandir("cover_page"); echo "cover_page/$cover[2]"; ?>" style="position:absolute; top:0; left:0;">
</div>
<div class='nav'>
<?php //<a href="#" id="like" style="position:relative; width:3.5%; height:5%; right:15%; top: 1%; z-index:1000"><img src="like.png" style="width:100%; height:100%"></a> ?>
<?php //<a href="https://www.linkedin.com/profile/view?id=AAkAAA0wWVgBtR4yiTbsZHMNsqi6jvmNN4YAAP4&authType=NAME_SEARCH&authToken=U3V8&locale=en_US&trk=tyah&trkInfo=clickedVertical%3Amynetwork%2CclickedEntityId%3A221272408%2CauthType%3ANAME_SEARCH%2Cidx%3A1-1-1%2CtarId%3A1447223389716%2Ctas%3Adanica" style="position:relative; width:3.5%; height:5%;right:20%; top: 1%; z-index:1000"><img src="linkedin.png" style="float: right; width:100%; height:100%"></a>?>
<nav style="position:absolute; left:0; bottom:0; top:0; right:0; margin-left:25%;margin-right:25%">
<ul style="text-align: center">
<li><a href="#" class="item" id="contact">Contact Me</a></li>
</ul>
</nav>
</div>
<div id = "inmail_id" class="inmail_item inmail" style="z-index:1001; background-color: lightgray;">
<form class="inmail_item" method="post" action="inmail.php">
  Your Email: <input class="inmail_item" name="email" id="email" type="text" /><br />
  <p class="inmail_item" style="white-space: pre;">Subject:        <input class="inmail_item" name="subject" id="subject" type="text" /><br /><p>
  Message:<br />
  <textarea class="inmail_item" name="message" id="message"></textarea><br />
  <input class="inmail_item" type="submit" value="Submit" />
</form>
</div>
<div class="center center_post" style="display:inline-block;position: absolute; top:37%; width: 95%">
<div class="greeting">
<h1 style="margin-bottom:0%;text-decoration: underline;font-family: 'Brush Script MT', cursive;font-size: 90px;font-style: normal;font-variant: normal;font-weight: 500;line-height: 26.4px;">Danica Xu</h1>
<h1 style="font-family: Papyrus, fantasy;;font-style: normal;font-variant: normal;">Keep Living, Keep Learning</h1>	
</div>
<script> var post_width; var post_height; var post_aspect_ratio </script>
	<?php 
		$list = scandir("post");
		$count = count($list);
		foreach (array_reverse($list) as $var){
			if ($count > 2) {
				$count = $count -1; 
				$file = file_get_contents("post/$var");
				$file = json_decode($file);
				?>
				<div class="hover_zoom_image <?php echo $file->image;?>" style="position:relative;max-width:1920px ;max-height:768px; margin-bottom: 0; overflow: auto;">
				<?php if ($file->image_type == "image/gif"){?>
				<img class="gif center_post_image" id = "image_<?php echo $file->image;?>" data-ref="gif" data-val="<?php echo $file->image;?>" src="image/<?php echo "{$file->image}_small_version"; ?>" style = "float: right; object-fit:contain; width: 60%; height: 80%;">
				<?php } else { ?>
				<img class="center_post_image" id = "image_<?php echo $file->image;?>"  data-ref="none" data-val="<?php echo $file->image;?>" src="image/<?php echo $file->image; ?>" style = "float: right; object-fit:contain; width: 60%; height: auto;"> <?php } ?>
				<h2 id "title_<?php echo $file->image;?>" data-val="<?php echo $file->image;?>" style = "position:relative; width:40%; color:white;font-family:Papyrus, fantasy;font-style:normal;font-variant:normal;background-color:black;text-align:center;top:5%;left:20%"><?php echo $file->title; ?></h2>
				<p style="overflow:auto; max-width: 35%; font-family: Copperplate, 'Copperplate Gothic Light', fantasy;white-space: pre; text-align: left; position:relative;top:5%;margin:2%; margin-left:0%;margin-right:0%;"><?php echo $file->content;?></p>
				</div>
				<script>
				$(window).on("load",function(){				
					window.post_width =  $("#image_<?php echo $file->image;?>").width();
					window.post_height =  $("#image_<?php echo $file->image;?>").height();
					if (window.post_width >= window.post_height){window.post_aspect_ration = window.post_width / window.post_height;}
					else {window.post_aspect_ration = window.post_height / window.post_width;}
					$(".<?php echo $file->image;?>").css({width: '95%', height: ($(".center_post").width() / window.post_aspect_ration) + 10+ 'px'});
				
				});
				</script>					
	<?php			
			}
			//else { $counter = $counter +1; }
						
		}		
	?>
<div id="the_end" style="position:relative;bottom:0%;left:0%;right:0%;background-color:white">
<div id="the_end_content" style="text-align:right;">
<p style="display:inline-block;text-align:right;margin:0;position:relative;width:100%;color:DimGray;white-space:pre">&copy 2016 Xfficient. All rights reversed. |		<img class="quick_link" id="facebook_link" src="image/facebook_icon.png" style="position:absolute;bottom:0%;width:1em;height:1em;">		<img class="quick_link" id="twitter_link" src="image/twitter_icon.png" style="position:absolute;bottom:0%;width:1em;height:1em">		<img class="quick_link" id="linkedin_link" src="image/linkedin_icon.png" style="position:absolute;bottom:0%;width:1em;height:1em">		<img class="quick_link" id="login_link" src="image/login.png" style="position:absolute;bottom:0%;width:1em;height:1em;"></p>
</div>
</div>
<script>
	$("#login_link").click(function(){ window.location.replace("http://www.danicaxu.com/login")});
	$("#facebook_link").click(function(){ window.location.replace("http://www.google.com")});
	$("#twitter_link").click(function(){ window.location.replace("http://www.baidu.com")});
	$("#linkedin_link").click(function(){ window.location.replace("http://www.bing.com")});
        $("#the_end").height($(window).height()*0.1);
</script>
</div>
</body>
</html>
