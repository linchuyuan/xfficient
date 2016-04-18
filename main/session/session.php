 <?php session_start(); 
$_SESSION['start'] = time(); 
$_SESSION['root'] = '/home/client';
 
$_SESSION['token']=false;
$_SESSION['time'] = time();
$_SESSION['username'] = $_POST["username"];
$file_name = $_POST["username"];
$password = $_POST["password"];
if (file_exists("/var/www/html/main/userdata/$file_name.json")=== true)
{
	$temp=file_get_contents("/var/www/html/main/userdata/" . $file_name . ".json");
        $data=json_decode($temp,true);
        $file_password = $data["password"];
        $password=(string)$password;
        $file_password=(string)$file_password;
        if ( $password === $file_password ){
             $_SESSION['token']=true;
	     $_SESSION['dir'] = array();
	     array_push($_SESSION['dir'],"/home/client",$_POST["username"]);
	if ( !strpos($_SERVER['HTTP_USER_AGENT'],"Mobile") ){
	     header("Location: ../main.php");
	}
	else { header("Location: ../../mobile_main/main.php");}
        }
        else{
             echo "Wrong login password , Consult pikeittt@gmail.com";
             sleep (3) ;
             exit () ;
         }
}
else{
	echo "Wrong login ID, Consult pikeittt@gmail.com";
        sleep (3) ;
        exit ();
}
?>
