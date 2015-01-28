<?php
session_start(); 
header('Content-Type: text/html; charset=UTF-8');
$sorteo = intval(file_get_contents("sorteo.php"));
include("basecfg.php");
//echo $okmysql;
$usuario = $_POST['user'];
$acentos = $mysqli->query("SET NAMES 'utf8'");
$variables = array();
$useremail;
if($okmysql == 1){

$columx = "SELECT * FROM `uc_orders`  WHERE primary_email LIKE '$usuario'  AND order_status LIKE 'pending' LIMIT 1 ";
//$columx = "SELECT * FROM `uc_orders`  ";
//$columx = "SELECT * FROM `preguntas` WHERE grado LIKE '$grado'  ";

$resultado2 = $mysqli->query($columx);
if($resultado2->num_rows > 0) {
$existe = 1;

	while ($columnas=$resultado2->fetch_assoc()){
	
	$name =  $columnas['billing_first_name']." ".$columnas['billing_last_name'];
	$ordenid = $columnas['order_id'];
	$userid = $columnas['uid'];
	$useremail = $columnas['primary_email'];
	
	}
	
	$columxz = "SELECT * FROM `uc_order_products`  WHERE order_id LIKE '$ordenid' ";
	$resultado3 = $mysqli->query($columxz);
	$columnas2=$resultado3->fetch_assoc();
	
	$idpro = $columnas2['nid'];
	//$producto = $columnas2['model'];

		$columx = "SELECT * FROM `node` WHERE `vid` LIKE   '$sorteo' AND  `type` LIKE   'product'  ";
		$resultado2 = $mysqli->query($columx);
		$columnas2=$resultado2->fetch_assoc();
	
		$titulo = $columnas2['title'];
	
	
	
	
	
	
	if($idpro == $sorteo){
		$variables['existe'] = $existe;
		$variables['name'] = $name;
		$variables['ordenid'] = $ordenid;
		$variables['userid'] = $userid;
		$variables['idpro'] = $idpro;
		$variables['producto'] = $titulo;
		$variables['email'] = $useremail;
		$variables['mensaje'] = "Orden, Usuario, producto y tipo de evento correctos.";
	}else{
		$existe = 0;	
		$variables['existe'] = $existe;
		$variables['name'] = "";
		$variables['ordenid'] = "";
		$variables['userid'] = "";
		$variables['idpro'] = "";
		$variables['producto'] = "";
		$variables['email'] = "";
		$variables['mensaje'] = "Orden, Usuario ok.  Tipo de ticket no corresponde con el evento lanzado.";
	}
	
	
	
}else{
$existe = 0;	
$variables['existe'] = $existe;
	$variables['name'] = "";
	$variables['ordenid'] = "";
	$variables['userid'] = "";
	$variables['idpro'] = "";
	$variables['producto'] = "";
	$variables['email'] = "";
	$variables['mensaje'] = "Orden y Usuario no encontrados";
}

	/*
while ($columnas=$resultado2->fetch_assoc()){
	
	$opciones =  "Usted está participando por: Fortuna ".$columnas['entity_id']."<br><br>".$columnas['body_summary']."<br>";
	
	
	}
*/



echo json_encode($variables);

}else{
echo "Mysql no conectado";	
}

?>