<html>
<head><title>Xfficient</title></head>
<body>

<?php
function is_string_exit($target,$base){
	if (strpos($target,$base)){return false;}
	else {return true;}

}

if ($_POST["password"] != $_POST["repassword"])
{
	echo "Password Entered are different";
}
elseif (is_string_exit(" ",$_POST["username"]) || is_string_exit("&",$_POST["username"]) || is_string_exit("%",$_POST["username"])){ echo " No special character allowd in Username";
else {
$uname=$_POST["username"];
$pword=$_POST["password"];
$data = array(
	"username" => $_POST["username"],
	"password" => $_POST["password"],
	"gender" => $_POST["gender"],
	"favorite_person" => $_POST["favarite_person"],
	"cell_phone" => $_POST["cell_phone"],
	"email" => $_POST["email"]
);
header("Location: /");


if (file_exists("/var/www/html/main/userdata/" . $data['username'] . ".json")){
	echo " user name is used";
}
else {
	
	echo 'Processing.... This process will take up to 5min';
	if (isset($_POST["username"])){
	$file = fopen ("/var/www/html/main/userdata/" . $data['username'] . ".json","a") or die ("file_name can't be processed");
	$info=json_encode($data);
	fwrite($file,$info);
	fclose($file);
	
	$file = fopen ("/var/www/html/main/data_base/username.txt","a") or die ("data file can't be processed");
	fwrite($file,$data['username']);
	fwrite($file,"\n");
	fclose($file);

        $file = fopen ("/var/www/html/main/data_base/count.txt","a+") or die ("file_name can't be processed");
	$count = fread($file,filesize("/var/www/html/main/data_base/count.txt")-1);
	$count = (int)$count+1;
	fwrite ($file,$count);
	fclose($file);
	
	$username=escapeshellarg($uname);
        $password=escapeshellarg($pword);
        shell_exec("sudo sh /var/www/html/main/add.sh $username $password");
	//shell_exec("sudo killall -HUP httpd");
}
}

}
?>
</body>
</html>

