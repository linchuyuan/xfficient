<?php

session_start();
if (count($_SESSION['dir']) > 2){
	array_pop( $_SESSION['dir']);
	header("Location: /mobile_main/main.php");
} else { 
header("Location: /mobile_main/main.php");
}
?>
