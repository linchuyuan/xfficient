<?php
$target_dir = "../image/";
$time = time();
$target_file = $target_dir . basename($_FILES["post_image"]["name"]);
if(move_uploaded_file($_FILES["post_image"]["tmp_name"], "$target_dir/$time")){
	if ($_FILES["post_image"]["size"] > 190000){
	switch($_FILES["post_image"]["type"]){
	case "image/png":
		echo "png uploaded";
		$source = imagecreatefrompng("$target_dir/$time");
		imagepng($source,"$target_dir/$time",70);
		break;
	case "image/jpeg":
		echo "jpeg uploaded";
		$source = imagecreatefromjpeg("$target_dir/$time");
                imagejpeg($source,"$target_dir/$time",70);
		break;
	case "image/gif":
		echo "GIF uploaded";
		$source = imagecreatefromgif("$target_dir/$time");
		imagegif($source,"$target_dir/{$time}_small_version");
		break;
	default:
		echo "unknow type uploaded";
	}
	}

      
}
else { echo $_FILES["post_image"]["tmp_name"]; echo "failed";}

$content = str_replace("\n","\r\n",$_POST["content"]);
$title = $_POST["title"];
$title_position = 0;
$content_position = 0;
$comments = array(array("","",""));

$post  = array(
        "title" => $title,
	"title_position"=> $title_position,
        "content" => $content,
	"content_position"=> $content_position,
	"like_count"=> 0,
	"comments"=> $comments,
	"image" => $time,
	"image_type" => $_FILES["post_image"]["type"]
	);
$file = fopen("../post/$time.json", "a");
fwrite($file, json_encode($post));
fclose($file);
echo "\n content uploaded";
?>
