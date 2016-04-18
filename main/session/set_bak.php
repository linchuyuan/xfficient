<?php
session_start();
$img = $_GET['target'];
foreach ($_SESSION['dir'] as $var){
	$dir = $dir .'/'.$var;
}
$imageFileType = pathinfo("$dir/$img",PATHINFO_EXTENSION);
if(file_exists("/home/client/background/$img")) unlink("/home/client/background/$img");
copy("$dir/$img","/home/client/background/{$_SESSION['username']}.jpg");

header ("location: /main/main.php"); 
?>
