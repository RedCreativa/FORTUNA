<?php
session_start(); 
$key = '12345678';


$premios = array();
$data = stripslashes($_POST['premios']);
$data2= json_decode($data);
$premios2 = serialize($data2);

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


$_SESSION['cells'] = hidetxt('encriptar', $premios2);
file_put_contents("cells1.php", hidetxt('resolver', $_SESSION['cells'])  );


?>