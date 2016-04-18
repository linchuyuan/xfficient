<?php
session_start();

$file = file_get_contents("/home/client/{$_SESSION['username']}/.config.json");
$file = json_decode($file);
$my_latitude =  (float)$file->{'latitude'};
$my_longtitude = (float)$file->{'longtitude'};
$power = 0.1;

$list = scandir("/home/client");
$key = array_search("background",$list);
unset($list[$key]);
$key = array_search($_SESSION['username'],$list);
unset($list[$key]);
foreach ( $list as $var){
	if ($var[0] === ".")
        {
	$key = array_search($var, $list);
        unset($list[$key]);
        }
}

foreach ($list as $var){
	$file = file_get_contents("/home/client/$var/.config.json");
	$file = json_decode($file);
	if ( $file->{'status'} === 'true'){
		$target_latitude = $file->{'latitude'};
		$target_longtitude = $file->{'longtitude'};
		if ( $target_latitude > $my_latitude + $power || $target_latitude < $my_latitude - $power || $target_longtitude > $my_longtitude + $power || $target_longtitude < $my_longtitude - $power ){
			$key = array_search($var, $list);
			unset($list[$key]);
		}
	}
	else {$key = array_search($var, $list);unset($list[$key]);}

}
$json_list = json_encode($list);
echo $json_list;

?>
