<?php
session_start();
include("basecfg.php");
//echo $okmysql;

$columx = "SELECT * FROM `uc_products`  ";
//$columx = "SELECT * FROM `uc_orders`  ";
//$columx = "SELECT * FROM `preguntas` WHERE grado LIKE '$grado'  ";

$resultado2 = $mysqli->query($columx);
	while ($columnas=$resultado2->fetch_assoc()){
		$modelo = $columnas['model'];
		$nid = $columnas['nid'];
		$tickets = 0;
		$columxz = "SELECT * FROM `uc_order_products`  WHERE nid LIKE '$nid' ";
		$resultado2x = $mysqli->query($columxz);
			if($resultado2x ->num_rows > 0) {
					while ($columnasx=$resultado2x->fetch_assoc()){
					
							$ordenid = $columnasx['order_id'];
					
							$columxzy = "SELECT * FROM `uc_orders`  WHERE order_id LIKE '$ordenid' AND order_status LIKE 'pending'  ";
							$resultado2xy = $mysqli->query($columxzy);
								if($resultado2xy ->num_rows > 0) {
								
										while ($columnasxy=$resultado2xy->fetch_assoc()){
										
										$tickets++;
										
										
										}
										
										
								}
								
			
					
					
					
					}
			}
	
	
	
	
	
	
			$opciones .=  "<option value=".$nid."#".$tickets.">".$modelo." - ".$tickets." tickets activos</option><br>";
	
	
	}







$timestamp = time();
$score = array();
$myarray = serialize($score);
$sorteo1 = split("#", $_POST['sorteo']);
$sorteo = $sorteo1[0]; 
$diff = $_POST['segundos']; 
$key = md5($_POST['adm']); 
$keyo ="cf618b46cdf4360fa0f6ba74df988bc4";
if(strcasecmp($key, $keyo) == 0    && isset($_POST['segundos'])  && isset($_POST['sorteo'])  ){

set_error_handler(function ($errno, $errstr, $errfile, $errline ,array $errcontex) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});

	try {
	file_put_contents("sorteo.php",$sorteo,LOCK_EX);
	file_put_contents("playerpremiado.php",0,LOCK_EX);
	file_put_contents("premiado.php",0,LOCK_EX);
	file_put_contents("puntajes.php",$myarray,LOCK_EX);
    file_put_contents("amount.php",$diff,LOCK_EX);
	file_put_contents("contando.php",$timestamp,LOCK_EX);
    if(!file_exists("amount.php") || !file_exists("contando.php")  || !file_exists("premiado.php")  || !file_exists("puntajes.php")){
    throw new Exception("Sorry, there's an error.");
    }
     
    
   } catch (ErrorException $e) {
    var_dump($e->getMessage());
    var_dump($e->getCode());
            var_dump($e->getMessage());
                        var_dump($e->getFile());
            var_dump($e->getLine());
           // var_dump($e);
            
            
               }
   
		 
		/*
if($diff > 0){
				$tiempo = file_get_contents('contando.php');
		
			$hld_diff = $diff;
			if((strcasecmp($tiempo, "") != 0)) {
				$slice = ($timestamp - (float)$tiempo);	
				$diff = $diff - $slice;
				//echo file_put_contents("test.txt",$slice);
			}

			// file_put_contents("contando.php",$timestamp);
			
		}*/
	
	if(file_exists("amount.php") && file_exists("contando.php")  && file_exists("premiado.php")    && file_exists("sorteo.php")  ){
		$oktim= "Timer iniciado";
	}else{
		$oktim=  "Archivos de configuracion no creados";
	}
	
}else{
	$oktim=  "Clave incorrecta.";
}


?>
<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>INICIAR EVENTO</title>
	
	<style>
body{
color: #b5b5b5;
    font-family: Arial, Helvetica, sans-serif;
    text-align:center;
    text-indent: 0px;
    font-size: 18px;
    line-height: 20px;
    font-weight: bolder;
    text-transform: none;
    text-decoration: none; 
     
	
}
body:before{
position: absolute;
top:20px;
left:20px;
width: 100px;
height: 80px;
content: "";
	
	background-image: url(../images/logofortuna.png);
background-repeat: no-repeat;
background-position: center center;
background-size: 100px 80px;

	
}
	</style>
	
</head>

<body>

<form action="timerstart.php"  method="post">
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<label  style="width:350px;position:absolute;left:50%;margin-left:-175px;text-align:center;"> CUENTA REGRESIVA EVENTO</label>
<br><br>
 <label for="adm" style="width:150px;position:absolute;left:50%;margin-left:-170px;text-align:right;"> Clave:</label> <input type="text" name="adm" value="for_2015_tuna" style="width:150px;position:absolute;left:50%;"><br><br>
 <label for="segundos"  style="width:250px;position:absolute;left:50%;margin-left:-270px;text-align:right;" > Duración en segundos:</label>  <input type="text" name="segundos" style="width:150px;position:absolute;left:50%;" value="10"><br><br>
  <label for="sorteo"  style="width:250px;position:absolute;left:50%;margin-left:-270px;text-align:right;" > Tipo de sorteo:</label>  
  <select id="sorteo" name="sorteo" style="width:250px;position:absolute;left:50%;margin-left:0px;"  >
  <option value=0>Seleccione el tipo de sorteo</option>
  <?php echo $opciones ; ?>
</select>
  
  <br><br>
  
<input type="submit"  style="width:150px;position:absolute;left:50%;">
</form>
<br><br><br>
<div class="feed"><?php echo $oktim; ?></div>
	
</body>

</html>
