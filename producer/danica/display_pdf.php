<?php
  $target = $_GET['target'];
  if ($target == 1) {
  $filename= "resume_danica.pdf";
  }
  else if ($target == 2) {
  $filename= "danica_about.pdf";
  }
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  readfile("$filename");
?> 
