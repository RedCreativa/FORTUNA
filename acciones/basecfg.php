<?php
session_start(); 
// Database variables
$dbhost ="localhost" ;  
  $dbpass ="fortuna@@2015" ; 
  $dbuser ="fortuna" ;
  $dbname ="fortuna_prod2015" ; 
  $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname) ;
  if ($mysqli->connect_errno) { 
  $okinstall .= "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error ;
  $okmysql =0;
  }else{
  $okmysql =1;
  $okinstall .= "Mysql connect Ok." ;
   }
//echo $okmysql;


?>