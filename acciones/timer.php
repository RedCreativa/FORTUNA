<?php
session_start();
$timestamp = time();
$diff = 3600; //<-Time of countdown in seconds.  ie. 3600 = 1 hr. or 86400 = 1 day.
$tiempo = file_get_contents('tiempo.php');
//MODIFICATION BELOW THIS LINE IS NOT REQUIRED.
$hld_diff = $diff;
if((strcasecmp($tiempo, "") != 0)) {
	$slice = ($timestamp - (float)$tiempo);	
	$diff = $diff - $slice;
	//echo file_put_contents("test.txt",$slice);
}

/*
if(!$tiempo || $diff > $hld_diff || $diff < 0) {
	$diff = $hld_diff;
	//$_SESSION['ts'] = $timestamp;

	echo file_put_contents("tiempo.php",$timestamp,LOCK_EX);
}
*/

//Below is demonstration of output.  Seconds could be passed to Javascript.
$diff; //$diff holds seconds less than 3600 (1 hour);

$hours = floor($diff / 3600) . ' : ';
$diff = $diff % 3600;
$minutes = floor($diff / 60) . ' : ';
$diff = $diff % 60;
$seconds = $diff;

$hoursx = floor($slice / 3600) . ' : ';
$slice = $slice % 3600;
$minutesx = floor($slice / 60) . ' : ';
$slice = $slice % 60;
$secondsx = $slice;


echo $hoursx.$minutesx.$secondsx;

?>