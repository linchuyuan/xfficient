<?php
        $content = file_get_contents('../data_base/like_xfficient.txt');
        $file = fopen('../data_base/like_xfficient.txt','w+');
        $content = (int)$content + 1;
        fwrite($file,$content);
        fclose($file);
        echo $content;
?>

