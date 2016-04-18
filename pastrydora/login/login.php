<?php 
header('Content-Type', 'text/plain');
$file_name = $_POST["username"];
$password = $_POST["password"];

if ($file_name === "linchuyuan" && $password === "123456")
{
	echo "true";
}
else{
	echo "false";
}
return 2;
?>
