<?php
session_start();

$data = array(
	"status" => $_GET["status"],
	"longtitude" => $_GET["longtitude"],
	"latitude" => $_GET["latitude"]
);
$file = fopen ("/home/client/{$_SESSION['username']}/.config.json","w+") or die ("data file can't be processed");
$data = json_encode($data);
fwrite($file, $data);
fclose($file);
header("location: /main/main.php");
?>
