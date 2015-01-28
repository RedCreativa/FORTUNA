<?php
session_start();

$playername = $_POST['playername']; 
$playeremail = $_POST['playeremail']; 
$playerid = $_POST['playerid']; 

if(isset($_POST['playername']) && isset($_POST['playeremail']) && isset($_POST['playerid'])  ){
$players = $playername."|".$playeremail."|".$playerid."#";
file_put_contents("listaplayers.php",$players,FILE_APPEND | LOCK_EX);
	echo "Variables recibidas: ".$playername."|".$playeremail."|".$playerid;
}else{
	echo "Error. Variables NO recibidas";
}

?>