<?php

session_start();
if (count($_SESSION['dir']) > 2){
	array_pop( $_SESSION['dir']);
	header("Location: /main/main.php");
} else { 
header("Location: /main/main.php");
}
?>
