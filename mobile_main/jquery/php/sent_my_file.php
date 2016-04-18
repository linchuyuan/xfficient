<?php
function recurse_copy($src,$dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recurse_copy($src . '/' . $file,$dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

session_start();
$my_file = $_POST['target_file'];
$my_target = $_POST['target_nearby'];

return 	copy("/home/client/{$_SESSION['username']}/$my_file","/home/client/$my_target/$my_file");


?>
