<?php
session_start();
if ($_SESSION['token'] && isset($_GET['target'])){
$dir = "";
foreach ($_SESSION['dir']as $var){
$dir = $dir .'/'. $var;
}
$target = $_GET['target'];
$dir = $dir .'/'. $target;
echo $dir ;
$type = pathinfo($dir,PATHINFO_EXTENSION);
header("Content-Type: image/$type");
header('Content-Length: ' . filesize($dir));
ob_clean();
readfile($dir);
}
else { echo "please login"; }
?>
