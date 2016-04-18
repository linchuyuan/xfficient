<?php
$id = $_POST['target'];
$content = file_get_contents("../post/$id.json");
$content = json_decode($content);
$content = json_encode($content->comments);
echo $content;
?>
