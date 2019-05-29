<?php
session_start();
/*print_r($_POST);
print_r($_SESSION);*/

//validacion chanta para poder saber que se hizo bien no mas 
if($_SESSION['response_code'] == 0 ){
    echo 'gracias por comprar, transaccion exitosa';
    return;
}else{
    echo 'error en la transaccion';
}

//OBTENER LA TRANSACCION QUE TENGA EL TOKEN QUE VIENE POR POST QUE ES EL MISMO QUE SE GENERA EN PAGAR.PHP
//esto debiese suceder a nivel de bd
/*
$transaction =  Transaction::getByToken($_POST['token_ws']);

if($transaction->failed){
    echo 'error'; 
}else{
    echo 'gracias por su compra';
}
*/

?>