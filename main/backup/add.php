<html>
<head><title>LINCHUYUAN</title></head>
<body>
<?php
$data = array(
        "username" => $_POST["username"],
        "password" => $_POST["password"],
        "space" => $_POST["space"],
        "email" => $_POST["email"]
);
$username = $_POST["username"];
$password = $_POST["password"];
if (file_exists("/var/www/html/teamfolder/userdata/" . $data['username'] . ".json")){
        echo " user name is used";
}
else {
        if (isset($_POST["username"])){
        $file = fopen ("/var/www/html/teamfolder/userdata/" . $data['username'] . ".json","a") or die ("file_name can't be processed");
        $info=json_encode($data);
        fwrite($file,$info);
        fclose($file);
		
	$username=escapeshellarg($username); 
	$password=escapeshellarg($password);
	shell_exec("sh add.sh $username $password");












/*
	$temp = shell_exec("ls /home");
	echo $temp;
	$temp = shell_exec("sudo useradd $username ");
	echo $temp;
	$temp = shell_exec("sudo mkdir /home/$username");
	echo $temp;
	$temp = shell_exec("sudo chown $username /home/$username");
	echo $temp;
	$temp = shell_exec("sudo (echo $password;echo $password)|smtpasswd -s -a $username");
	echo $temp;
	$temp = shell_exec("sudo echo  \"[$username]\n
			comment = $username\n
			writable = YES\n
			browseable = NO\n
			valid user = $username\n
			path = /home/$username\" > /etc/samba/smb.conf\n\n\n");
*/
}
}
?>
</body>
</html>

