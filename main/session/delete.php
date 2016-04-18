<html>
<head><title>Xfficient</title></head>
<body>
<?php
function deleteDir($dir_path){
$list = scandir($dir_path);
$count = count($list);
if ($count == 2){
rmdir($dir_path);
}
else {
foreach ($list as $var){
	if (is_dir("$dir_path/$var")){
	deleteDir("$dir_path/$var");
	}
	else { unlink("$dir_path/$var");}
}
}
}
        session_start();
        $dir = "";
        foreach ($_SESSION['dir'] as $var){
        $dir = $dir .'/'.$var;
        }
	$target = $_GET['target'];
	$dir = $dir .'/'.$target;
		
	if (is_dir($dir)){
	deleteDir($dir);
	}
	else {
	unlink($dir);
	}
	header ("Location: /main/main.php");
?>
</body>
</html>
