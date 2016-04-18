<!DOCTYPE html>
<html> 
<head>
	<link rel="shortcut icon" type="image/x-icon" href="/icons/xfficient_icon.png" />
	<title>Xfficient</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
	<script src="jquery/taphold.js"></script>
	<script src="jquery/slider.js"></script>
	<script src="jquery/right_click.js"></script>
	<script src="jquery/icon_right_click.js"></script>
	<script src="jquery/txt_right_click.js"></script>
	<script src="jquery/img_right_click.js"></script>
	<script src="jquery/function.js"></script>
	<link rel="StyleSheet" type="text/css" href="css/style.css" />
<style>
.nearby_result:hover {
	background-color: lightblue;
}
</style>
</head>                        
<body>
	<?php session_start(); include 'session/function.php'; if(auto_logout()){ header("location: /main/session/log_out.php"); exit;} ?>
	<div id="loading" style = "position:absolute; right:0; top:0; left:0; bottom:0; z-index: 9999; width:100%; height:100%; background-image: url('/icons/xfficient_loading.gif');background-size: 100% 100%; background-repeat:no-repeat;background-color:DimGray; opacity: 0.5; display:none"></div>
	<div class="back">
	</div>
	<div class="video_box">
	<video autoplay  controls id="div_video_popup"></video>
	<a href="#" id="video_close" style="position:absolute; left:10px; top:10px;"><img src="/icons/xfficient_close.png" style="width:30px;height:30px"></a>
	</div>
	<div class="audio_box">
        <audio autoplay  controls id="div_audio_popup"></audio>
        <a href="#" id="audio_close" style="position:absolute; left:0px; top:7px;"><img src="/icons/xfficient_power.jpg" style="width:17px;height:17px"></a>
        </div>
        <div class="center_adaptive doc_box">
        <iframe style="white-space: pre;" src=""  id="div_doc_popup"></iframe>
        </div>
                                <script>
					
                                        var win_width = $(window).width();
                                        var win_height = $(window).height();
                                        $('.center_adaptive').css({width: win_width/2+"px" ,height: win_height/2 -20 +"px"});
					$('.doc_box #div_doc_popup').css({width: win_width/2+"px" ,height: win_height/2 -20 +"px"});
                                </script>
	<div class = "center_adaptive" id = "near_by" style=" display: none; text-align:left; border: 3px solid black; background-size: 100% 100%;background-repeat: no-repeat; background-image: url('/icons/xfficient_throw_plane.jpg'); border-radius: 2px; min-width: 600px; width:40%; height:50%">
	<div id="nearby_div_close">
	 <a href="#" id="nearby_close" style="position:relative;top: 10%; left: 5%"><img src="/icons/xfficient_close.png" style="width:30px;height:30px"></a>
	</div>
	<div id="nearby_list" style="text-align: center; font-size: 30px; overflow: auto"><a href="#" class="nearby_class"></a></div>	
	</div>
	<?php
		session_start();
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

	
	<ul class="img">
		<li data-action="new_folder">New Folder</li>
		<li data-action="set_as_background">Set As Background..</li>
		<li data-action="default_background">Reset Background..</li>
		<li data-action="download">Download</li>
		<li data-action="delete">Delete</li>
		<li class = "share">Sent to nearby..</li>
		<li id = "img_rename">Rename</li>
		<li data-action="log_out">Log Out</li>
	</ul>
        <ul class="txt">
		<li data-action="edit">Quick Edit</li>
                <li data-action="new_folder">New Folder</li>
                <li data-action="download">Download</li>
                <li data-action="delete">Delete</li>
		<li class = "share">Sent to nearby..</li>
                <li id = "txt_rename">Rename</li>
                <li data-action="log_out">Log Out</li>
        </ul>
	<ul class="icon">
		<li data-action="new_folder">New Folder</li>
		<li data-action="download">Download</li>
		<li data-action="delete">Delete</li>
		<li class = "share">Sent to nearby..</li>
		<li id = "icon_rename">Rename</li>
		<li data-action="log_out">Log Out</li>
	</ul>
	<ul class="custom-menu">
		<li data-action="new_folder">New Folder</li>
		<li data-action="refresh">Refresh</li>
		<li data-action="default_background">Reset Background..</li>
		<li data-action="log_out">Log Out</li>
	</ul>  
	<?php
	$dir = "";
	foreach ($_SESSION['dir']as $var){
		$dir = $dir .'/'.$var;
	}
	if ($_SESSION['token']){
		$file_list = scandir($dir);
		foreach ( $file_list as $var){
			if ($var[0] === ".")
			{
				$key = array_search($var, $file_list);
				unset($file_list[$key]);
			}
		}
	?>
	<?php  foreach ( $file_list as $var){ 
         	if (is_image("$dir/$var")){ ?>
			<div id="div_<?php echo replace_space_dot($var);?>" data-role="popup" class = "popup">
                        <img id="img_<?php echo replace_space_dot($var);?>" src="/main/session/display.php?target=<?php echo $var;?>">
                        </div>
                                <script>
                                        var div_width = $(window).width();
                                        var div_height = $(window).height();
                                        $('#div_<?php echo replace_space_dot($var);?> #img_<?php echo replace_space_dot($var);?>').css({width: div_width/2+"px",height: div_height/1.5-20+"px"});
                                </script>

	<?php }
		elseif (is_txt("$dir/$var")){ ?>
			<div id="div_<?php echo replace_space_dot($var);?>" data-role="popup" class = "txt_popup">
                        <article style="white-space: pre;"> <?php echo file_get_contents("$dir/$var"); ?> </article>
                        </div>
                                <script>
                                        var div_width = $(window).width();
                                        var div_height = $(window).height();
                                        $('#div_<?php echo replace_space_dot($var);?>').css({width: div_width/2+"px",height: div_height/1.5-20+"px"});
                                </script>
	<?php }} ?>
		<div class = "file_browser">
			<form action="/main/session/rename.php" method="post" id="rename_input">
			<input name="name_box" type=text id = "name_box" style="display: none;">
			<input name="rename_box" type=text id = "rename_box" style="border-radius: 8px;">
			<input type=submit value="login" style="display: none;">
			</form>

			<table>
			<tr><td valign="top"><img src="/icons/xfficient_back.png" style="width:30px;height:30px"></td><td><a href="session/session_pop.php">BACK</a></td><td align="Center">Last Modified</td><td align="right">Size</td><td>&nbsp;</td></tr>
			<?php foreach ( $file_list as $var){ ?> 
			<?php if (is_image("$dir/$var")){ ?>
			<tr><td valign="top"><img src="/icons/xfficient_image.png" style="width:30px;height:30px"></td><td><a href="#<?php echo $var;?>" data-rel="popup" class="img_right_click" id = "<?php echo replace_space_dot($var);?>" data-value = "<?php echo $var ?>" ><?php echo $var; ?></a></td><td align="right"><?php ?></td><td align="right"><?php echo file_size("$dir/$var");?> </td><td>&nbsp;</td></tr>
			<?php }
			 elseif (is_txt("$dir/$var")){ ?>
                        <tr><td valign="top"><img src="/icons/xfficient_txt.png" style="width:30px;height:30px"></td><td><a href="#<?php echo $var;?>" data-rel="popup" class="txt_right_click" id = "<?php echo replace_space_dot($var);?>" data-value = "<?php echo $var ?>" ><?php echo $var; ?></a></td><td align="right"><?php ?></td><td align="right"><?php echo file_size("$dir/$var");?> </td><td>&nbsp;</td></tr>
                        <?php }
			 elseif (is_doc("$dir/$var")){ ?>
                        <tr><td valign="top"><img src="/icons/xfficient_docx.png" style="width:30px;height:30px"></td><td><a href="#<?php echo $var;?>" class="doc icon_right_click" id = "<?php echo replace_space_dot($var);?>" data-value = "<?php echo $var ?>" data-rel="<?php echo "$dir/$var" ?>"><?php echo $var; ?></a></td><td align="right"><?php ?></td><td align="right"><?php echo file_size("$dir/$var");?> </td><td>&nbsp;</td></tr>
                        <?php }
 			elseif (is_pdf("$dir/$var")){ ?>
                        <tr><td valign="top"><img src="/icons/xfficient_pdf.png" style="width:30px;height:30px"></td><td><a href="/main/session/display_pdf.php?filename=<?php echo $var;?>" class = "icon_right_click" id = "<?php echo replace_space_dot($var);?>" data-value = "<?php echo $var ?>" ><?php echo $var; ?></a></td><td align="right"><?php ?></td><td align="right"><?php echo file_size("$dir/$var");?> </td><td>&nbsp;</td></tr>
                        <?php }
			elseif (is_video("$dir/$var")){ ?>
                        <tr><td valign="top"><img src="/icons/xfficient_video.png" style="width:30px;height:30px"></td><td><a href="#" class = "video icon_right_click" id = "<?php echo replace_space_dot($var);?>" data-value = "<?php echo $var ?>" data-rel="<?php echo "$dir/$var" ?>"><?php echo $var; ?></a></td><td align="right"><?php ?></td><td align="right"><?php echo file_size("$dir/$var");?> </td><td>&nbsp;</td></tr>
                        <?php }
			elseif (is_audio("$dir/$var")){ ?>
                        <tr><td valign="top"><img src="/icons/xfficient_audio.png" style="width:30px;height:30px"></td><td><a href="#" class = "audio icon_right_click" id = "<?php echo replace_space_dot($var);?>" data-value = "<?php echo $var ?>" data-rel="<?php echo "$dir/$var" ?>"><?php echo $var; ?></a></td><td align="right"><?php ?></td><td align="right"><?php echo file_size("$dir/$var");?> </td><td>&nbsp;</td></tr>
                        <?php }
                        elseif (is_zip("$dir/$var")){ ?>
                        <tr><td valign="top"><img src="/icons/xfficient_zip.png" style="width:30px;height:30px"></td><td><a href="#" class = "audio icon_right_click" id = "<?php echo replace_space_dot($var);?>" data-value = "<?php echo $var ?>" data-rel="<?php echo "$dir/$var" ?>"><?php echo $var; ?></a></td><td align="right"><?php ?></td><td align="right"><?php echo file_size("$dir/$var");?> </td><td>&nbsp;</td></tr>
                        <?php }
			elseif (is_dir("$dir/$var")) { ?>
			<tr><td valign="top"><img src="/icons/xfficient_folder.png" style="width:30px;height:30px"></td><td><a href="session/session_push.php?push=<?php echo $var;?>" class = "icon_right_click" id = "<?php echo replace_space_dot($var);?>" data-value = "<?php echo $var; ?>"><?php echo $var; ?></a></td><td align="right"><?php echo "         "; ?></td><td align="right"><?php echo file_size("$dir/$var");?></td><td>&nbsp;</td></tr>
			<?php }
                        else { ?>
                        <tr><td valign="top"><img src="/icons/xfficient_unknown.png" style="width:30px;height:30px"></td><td><a href="#" onclick = "alert('Unknown Type');" class = "icon_right_click" id = "<?php echo replace_space_dot($var);?>" data-value = "<?php echo $var; ?>"><?php echo $var; ?></a></td><td align="right"><?php echo "         "; ?></td><td align="right"><?php echo file_size("$dir/$var");?></td><td>&nbsp;</td></tr>

			<?php } ?>
			<?php } ?>
			<tr><th colspan="5"><hr></th></tr>
			</table>
			
		<div class = "upload">
		<form action="/main/session/upload.php" method="post" enctype="multipart/form-data" >
                Select file to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload" name="submit">
                </form>
                </div>
	<?php } else { echo "Please Login";} ?>
</div>
<button value="location" onclick="getLocation()" style="position:absolute;right:5%;z-index:1000">Turn Location Service On</button>
<div id="footer">
	<h2>&copy 林楚源, 徐淑颖 All rights reserved.</h2>
</div>

</body>
</html>
