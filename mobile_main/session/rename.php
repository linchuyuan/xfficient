<?php
session_start(); 
if (isset($_SESSION['username']) && $_SESSION['token']){
$before = $_POST['name_box'];
$after = $_POST['rename_box'];
foreach ($_SESSION['dir'] as $var){
        $dir = $dir .'/'.$var;
}
//$file_type = pathinfo("$dir/$before",PATHINFO_EXTENSION);
rename("$dir/$before","$dir/$after");
header ("Location: /mobile_main/main.php");
}
else { echo "Please Login";}

?>
