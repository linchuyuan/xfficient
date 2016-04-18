<?php
session_start();
if ($_SESSION['token']){
$content = file_get_contents("/home/client/{$_SESSION['username']}/.config.json");
$content = json_decode($content);
$content->{'status'} = "false";
$content = json_encode($content);
$file = fopen("/home/client/{$_SESSION['username']}/.config.json", "w+");
fwrite($file,$content);
fclose($file);
session_destroy();
echo "logged out";
?><a href="/">Click me to go back to homepage</a><?php
}
?>
