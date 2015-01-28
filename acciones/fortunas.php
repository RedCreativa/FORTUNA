<?php
session_start(); 
header('Content-Type: text/html; charset=UTF-8');
$sorteo = intval(file_get_contents("sorteo.php"));
$fortunas = array();
include("basecfg.php");
//echo $okmysql;

$acentos = $mysqli->query("SET NAMES 'utf8'");

/*
$fortunas[] = "Arrendataria#Es el pago de un año de arriendo habitacional, hasta un tope de $ 5.000.000 anuales.";
$fortunas[] = "Subsidio Habitacional#$ 5.000.000 de abono al pago del precio de tu propiedad.";  
$fortunas[] = "Vacaciones#Quincenas de vacaciones. Es el pago de un arriendo de temporada, con un tope de $ 2.000.000 por una quincena de arriendo."; 
$fortunas[] = "Académica#Rifa de una escolaridad completa, matricula, arancel, etc. por un año, desde “play group” hasta último año de universidad."; 
$fortunas[] = "Combustible#El Premio es un cupón electrónico por $1.000.000 en combustible."; 
*/
if($sorteo > 0){


	
	//titulo premio
$columx = "SELECT * FROM `node` WHERE `vid` LIKE   '$sorteo' AND  `type` LIKE   'product'  ";
//$columx = "SELECT * FROM `uc_orders`  ";
//$columx = "SELECT * FROM `preguntas` WHERE grado LIKE '$grado'  ";

$resultado2 = $mysqli->query($columx);
	while ($columnas=$resultado2->fetch_assoc()){
	
	$titulo = $columnas['title'];
	
	
	}



//texto premio
$columx = "SELECT * FROM `field_data_body` WHERE `entity_id` LIKE   '$sorteo' ";
//$columx = "SELECT * FROM `uc_orders`  ";
//$columx = "SELECT * FROM `preguntas` WHERE grado LIKE '$grado'  ";

$resultado2 = $mysqli->query($columx);
	while ($columnas=$resultado2->fetch_assoc()){
	
	$opciones =  $titulo."_".$columnas['body_summary']."";
	
	
	}
	

//ganadores
$columx2 = "SELECT * FROM `fortuna_juego`.`premiados` LIMIT 10 ";
//$columx = "SELECT * FROM `uc_orders`  ";
//$columx = "SELECT * FROM `preguntas` WHERE grado LIKE '$grado'  ";

$resultado22 = $mysqli->query($columx2);
	while ($columnas2=$resultado22->fetch_assoc()){
	$evento =$columnas2['playerevento'];
	
		$columx1 = "SELECT * FROM `field_data_body` WHERE `entity_id` LIKE   '$evento' ";
		$resultado21 = $mysqli->query($columx1);
		while ($columnas1=$resultado21->fetch_assoc()){
			$premio = $columnas1['body_summary'];
			}
	
	$ganadores .=  $columnas2['playername']." | ".$columnas2['playertime']." | ".$titulo."_";
	
	
	}
	
	



echo $opciones."#".$ganadores;
}else{
echo "Tipo de  sorteo no encontrado";	
}

?>