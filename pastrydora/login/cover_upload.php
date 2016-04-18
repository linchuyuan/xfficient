<?php
$target_dir = "../cover_page/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

if (isset($target_file)){
	$list = scandir ("../cover_page");
	print_r($list);
	foreach ($list as $var){
	if ( $var != "." || $var != ".."){
		echo $var;
		unlink("$target_dir/$var");
	}
	}
}
if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
	echo "Success";
}
else { echo $target_file; echo $target_dir; echo $_FILES["fileToUpload"]["tmp_name"]; echo "failed";}

?>
