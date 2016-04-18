<?php

function auto_logout()
{
    $t = time();
    $t0 = $_SESSION['time'];
    $diff = $t - $t0;
    if ($diff > 1500 || !isset($_SESSION['time']))
    {          
        return true;
    }
    else
    {
        $_SESSION['time'] = time();
	return false;
    }
}

function is_image($target)
{
$imageFileType = pathinfo($target,PATHINFO_EXTENSION);

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    return false;
}
else { return true; }
}

function replace_space_dot($target){
$temp = str_replace(' ', '_', $target);
$temp = str_replace('.', '-', $temp);
return $temp;
}

function file_size($target)
{
    $bytes = filesize($target);
if ($bytes){
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}
}

function is_txt($target){

$txtFileType = pathinfo($target,PATHINFO_EXTENSION);

if($txtFileType != "txt" && $txtFileType != "log" && $txtFileType != "html" && $txtFileType != "js" && $txtFileType != "css") {

    return false;
}
else { return true; }

}

function is_pdf($target){

$txtFileType = pathinfo($target,PATHINFO_EXTENSION);

if($txtFileType != "pdf" && $txtFileType != "PDF") {

    return false;
}
else { return true; }

}

function is_video($target){

$FileType = pathinfo($target,PATHINFO_EXTENSION);

if($FileType != "mp4" && $FileType != "MP4" && $FileType != "avi") {

    return false;
}
else { return true; }

}

function is_audio($target){

$FileType = pathinfo($target,PATHINFO_EXTENSION);

if($FileType != "mp3" && $FileType != "MP3") {

    return false;
}
else { return true; }

}

function is_doc($target){

$FileType = pathinfo($target,PATHINFO_EXTENSION);

if($FileType != "docx") {

    return false;
}
else { return true; }

}

function is_zip($target){

$FileType = pathinfo($target,PATHINFO_EXTENSION);

if($FileType != "zip") {

    return false;
}
else { return true; }

}



