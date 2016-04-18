<!DOCTYPE html>
<head><title>Xfficient</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
<script src="jquery/slider.js"></script>
<link rel="StyleSheet" type="text/css" href="css/style.css" />
</head>
<body>
        <div class="back">
        </div>
        <?php
            session_start();
            if ($_SESSION['token']){
	    $target = $_GET['target'];
            $name = $_SESSION['username'];
            if (file_exists("/home/client/background/{$_SESSION['username']}.jpg"))
        {?>
            <script> $('.back').css('background-image',  "url('/background/<?php echo $name; ?>.jpg')"); </script>
        <?php }
            else { ?> <script> $('.back').css('background-image',  "url('/background/default.jpg')");</script>
        <div id="slider">
        <ul>
                <li><img id="image" src="image/halo.png"></li>
                <li><img id="image" src="image/halo.png"></li>
                <li><img id="image" src="image/halo.png"></li>
                <li><img id="image" src="image/halo.png"></li>
        </ul>
        </div>
        <?php }  ?>
				<div class="center_adaptive">
				<form action="/main/session/save_txt.php?target=<?php echo $target?>" method="post">
						<textarea name="txt_editor_box" id="txt_editor_box"><?php $dir = "";foreach ($_SESSION['dir'] as $var){$dir = $dir .'/'.$var;}$file = fopen ("$dir/$target", "r") or die ("can't open file");$content = fread($file,filesize("$dir/$target"));fclose($file);echo $content;?></textarea>
						 <input type=submit value="Save">
						<button type="button" onclick="window.location.replace('/main/main.php')">Cancel</button><br><br>
						<button type="button" onclick="window.location.replace('/main/session/log_out.php')">Log Out</button>
				</form>
                		</div>
				<script>
					var div_width = $(window).width();
					var div_height = $(window).height();
					$('.center_adaptive').css({width: div_width/2+"px",height: div_height/1.5-20+"px"});
					$('.center_adaptive #txt_editor_box').css({width: div_width/2+"px",height: div_height/1.5-20+"px"});
				</script>
                <?php } ?>
</body>
</html>

