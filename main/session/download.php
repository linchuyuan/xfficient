<?php
session_start();
$dir="";
foreach ($_SESSION['dir']as $var){
   $dir = $dir .'/'.$var;
}
$file = $_GET['target'];
$file = $dir .'/'. $file;

if (!is_dir($file)){
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
}
else {
	echo " can't download folder";
	sleep(3);
	?><a href="/main/main.php">Click me to go back to Session</a><?php
}
?>
