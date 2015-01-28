<?php
session_start();
$playername = $_POST['playername']; 
$playerid = $_POST['playerid']; 
$playertime = $_POST['playertime']; 
$playerorden = $_POST['playerorden']; 
$playerproducto = $_POST['playerproducto']; 
$playerproid = $_POST['playerproid']; 
$playeremail = $_POST['playeremail']; 
$playerevento = intval(file_get_contents("sorteo.php"));
$timestamp = time();
$timeorigen =intval(file_get_contents("contando.php"));



$datauser = array();
$datauser['playername'] = $playername;
$datauser['playerid'] = $playerid;
$datauser['playertime'] = $playertime;
$datauser['playerproid'] = $playerproid;
$datauser['playerproducto'] = $playerproducto;
$datauser['playeremail'] = $playeremail;
$datauser['playerevento'] = $playerevento;
$datauser['timefinal'] = $timestamp;
$datauser['timeinicio'] = $timeorigen;
$datauser['playerorden'] = $playerorden;

$datauserstring = serialize($datauser);

include("basecfg.php");

set_error_handler(function ($errno, $errstr, $errfile, $errline ,array $errcontex) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});

	try {
	$diff = (float)file_get_contents('premiado.php'); 
	if($diff == 0){
		file_put_contents("premiado.php",1,LOCK_EX);
		$diff = (float)file_get_contents('premiado.php'); 
					$as =$playername."|".$playerid."|".$playertime."|".$playerorden."|".$playerproducto."|".$playerproid."|".$playeremail."|".$playerevento."|".$timestamp ."|".$timeorigen;
		file_put_contents("playerpremiado.php",$as,LOCK_EX);
		$prem = file_get_contents('playerpremiado.php'); 
		echo "1#".$prem."#ganador";
		
					if($okmysql==1){
					
					$columx = "INSERT INTO  `fortuna_juego`.`premiados`  (
					`idi` ,
					`playerid` ,
					`playername` ,
					`playeremail` ,
					`playerorden` ,
					`playeridpro` ,
					`playerproducto`,
					`playertime`,
					`timeinicio`,
					`timefinal`,
					`playerevento`  
					)VALUES(  NULL,'$playerid','$playername','$playeremail','$playerorden','$playerproid','$playerproducto','$playertime','$timeorigen','$timestamp','$playerevento'  )";
					//$columx = "SELECT * FROM `preguntas` WHERE grado LIKE '$grado'  ";
					
					if ($mysqli->query($columx) === TRUE) {
						    	//echo "Pregunta creada Ok.";
						    	
						    	}else{
							   //echo "Pregunta NO creada.";	
							    
						    	}
						    	
					
					}else{
						//echo "Mysql no conectado";
					}





	}else{
	$diff = (float)file_get_contents('premiado.php'); 
		$prem = file_get_contents('playerpremiado.php'); 
		echo "0#".$prem."#perdedor";
	}
    
   


    if(!file_exists("premiado.php") ){
    throw new Exception("Sorry, there's an error.");
    }
     
    
   } catch (ErrorException $e) {
    var_dump($e->getMessage());
    var_dump($e->getCode());
            var_dump($e->getMessage());
                        var_dump($e->getFile());
            var_dump($e->getLine());
            var_dump($e);
            
            
               }
?>