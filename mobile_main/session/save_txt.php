<?php
    session_start();
    if ($_SESSION['token']){
    $target = $_GET['target'];
	$content = $_POST['txt_editor_box'];
	$dir = "";
    foreach ($_SESSION['dir']as $var){
    $dir = $dir .'/'.$var;
    }
	$file = fopen("$dir/$target","w+");
	fwrite($file,$content);
	fclose($file);
	header("Location: /mobile_main/main.php");
}
?>
