<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['token']){
$dir="";
foreach ($_SESSION['dir']as $var){
   $dir = $dir .'/'.$var;
}
$dir .= '/';
$target_dir = $dir;

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    echo $_FILES["fileToUpload"]["tmp_name"];
    ?><a href="/mobile_main/main.php">Click me to go back</a><?php
    exit();
}
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    header ("Location: /mobile_main/main.php");
} 
}
else { echo "Please Login";}
?>
