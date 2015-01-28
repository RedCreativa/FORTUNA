<?php
session_start();
$timestamp = time();
$diff = (float)file_get_contents('amount.php'); 
if($diff > 0){
		$tiempo = file_get_contents('contando.php');
	
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
	
		 file_put_contents("contando.php",$timestamp,LOCK_EX);
	}
	
*/
	
	$diff; 
	
	$hours = floor($diff / 3600) . ' : ';
	$hoursx = floor($diff / 3600) ;
	$diff = $diff % 3600;
	$minutes = floor($diff / 60) . ' : ';
	$minutesx = floor($diff / 60) ;
	$diff = $diff % 60;
	$seconds = $diff;
	$secondsx = $diff;
	
	
	if($hoursx == 0 && $minutesx == 0 && $secondsx == 0 ){
		echo 0;
		
			file_put_contents("tiempo.php",$timestamp,LOCK_EX);
			
	}else if($hoursx < 0 || $minutesx < 0 || $secondsx < 0 ){
		echo -1;
	}else{
		echo $hours.$minutes.$seconds;
	}


}


?>