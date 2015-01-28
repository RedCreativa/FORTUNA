<?php
session_start();


	try {
	$diff = (float)file_get_contents('premiado.php'); 
if($diff > 0){
    echo 1;
}else{
echo 0;
}	

set_error_handler(function ($errno, $errstr, $errfile, $errline ,array $errcontex) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});

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