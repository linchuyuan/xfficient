<?php
  $target = $_GET['target'];
  if ($target == 1) {
  $filename= "resume_chu.pdf";
  }
  else if ($target == 2) {
  $filename= "cover_letter.pdf";
  }
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  readfile("$filename");
?> 
