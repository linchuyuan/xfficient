<?php
session_start();
if (file_exists("/home/client/background/{$_SESSION['username']}.jpg"))
{ unlink ("/home/client/background/{$_SESSION['username']}.jpg");}
header ("location: /main/main.php");
?>

