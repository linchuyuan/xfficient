<?php
	$content = file_get_contents('like.txt');
	$file = fopen('like.txt','w+');
	$content = (int)$content + 1;
	fwrite($file,$content);
	fclose($file);
	echo $content;
?>
