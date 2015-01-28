<?php
session_start();
$score = array();
$cells = array();
if(isset($_SESSION['cells'])){
$cells = unserialize( hidetxt('resolver', $_SESSION['cells'])  ) ;           	
}
$timestamp = time();
$stampa = $_POST['user']."|".$_POST['score']."|".$_POST['jugador'];
$puntajes = file_get_contents('puntajes.php');
if((strcasecmp($puntajes, "") != 0)) {
	$score = unserialize($puntajes);
	$score[$stampa]=$timestamp;
	arsort($score);
	$puntero =reset($score);
	$key = array_search ($puntero, $score);
	$myarray = serialize($score);
	file_put_contents("puntajes.php",$myarray,LOCK_EX);
}

if(!$puntajes) {
	$score[$stampa]=$timestamp;
	$myarray = serialize($score);
	file_put_contents("puntajes.php",$myarray,LOCK_EX);
	$puntero =$score[$stampa];
	$key = array_search ($puntero, $score);
}

function hidetxt($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = '87654321';
    $secret_iv = '12345678';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == 'encriptar' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'resolver' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}





echo $key."#".$puntero;

?>