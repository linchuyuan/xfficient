<?php
session_start();
$push = $_GET['push'];
array_push($_SESSION['dir'],$push);
header("Location: /main/main.php");
?>
