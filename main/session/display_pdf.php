<?php
  session_start();
  $dir = "";
  foreach ($_SESSION['dir']as $var){
	$dir = $dir .'/'.$var;
  }
  $filename= $_GET['filename'];
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  readfile("$dir/$filename");
?> 
