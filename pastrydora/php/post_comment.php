<?php
$id = $_POST['target'];;
$time = time();
$content = file_get_contents("../post/$id.json");
$content = json_decode($content);
/*$content->comments = array(
			array(
				$_POST['content_title'],
				$_POST['content'],
				),$content->comments
);*/

array_unshift($content->comments,array($_POST['content_title'],$_POST['content'],date("Y-m-d H:i:s",$time)));
$file = fopen("../post/$id.json", "w");
fwrite($file, json_encode($content));
fclose($file);

echo json_encode($content->comments);
?>
