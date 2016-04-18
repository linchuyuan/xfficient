<html>
<head><title>Xfficient</title></head>
<body>
<?php
        session_start();
        $dir = "";
        foreach ($_SESSION['dir'] as $var){
        $dir = $dir .'/'.$var;
        }
	$index = 1;
	if (!file_exists("$dir/New Folder")){
		mkdir ("$dir/New Folder", 0750);
	}
	else{
		while (file_exists("$dir/New Folder $index")) 
		{
		$index = $index + 1;
		}
		mkdir ("$dir/New Folder $index", 0750);
	}
	$index = 1 ; 
	header ("Location: /main/main.php"); 
?>
	
</body>
</html>
