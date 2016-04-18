<!DOCTYPE html>
<html>
    <head><title>Login Validate</title></head>
    <body>
        <?php
	      session_start();
	      $_SESSION["token"]=false;
              $file_name = $_POST["username"];
              $password = $_POST["password"];
              if (file_exists("/var/www/html/main/userdata/$file_name.json")=== true)
              {
//              $file=fopen("/var/www/html/main/userdata/$file_name.txt","r") or die ("Unable to open");
                $temp=file_get_contents("/var/www/html/main/userdata/" . $file_name . ".json");
		$data=json_decode($temp,true);
	
		$file_password = $data["password"];
		
	        $password=(string)$password;
		$file_password=(string)$file_password;
		fclose($file);
                  if ( $password === $file_password ){
		      $_SESSION["token"]=true;
                      header("location: main.php");
                  }
                  else{
//		      echo "post";
//		      echo $_POST["password"];
//		      echo "file";
//		      echo $file_password;	 
                      echo "Wrong login password , Consult pikeittt@gmail.com";
                  }
              }
              else{
		
                echo "Wrong login ID, Consult pikeittt@gmail.com";
              } 
        ?>      
    </body>
</html>
