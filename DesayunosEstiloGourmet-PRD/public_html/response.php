<?php
use Freshwork\Transbank\CertificationBagFactory;
use Freshwork\Transbank\TransbankServiceFactory;
use Freshwork\Transbank\RedirectorHelper;

include 'vendor/autoload.php';
include 'funciones/funciones.php';

// Obtenemos los certificados y llaves para utilizar el ambiente de integración de Webpay Normal.
$bag =  CertificationBagFactory::integrationWebPayNormal();

$webPay = TransbankServiceFactory::normal($bag); 

//toma el token y consulta a transbank por la transaccion y devuelve un array con todos los datos de la transaccion
//response code = 0  transaccion aprobada
$result =  $webPay->getTransactionResult();

//rescato los datos de la respuesta de transbank
$numero_tarjeta =  $result->cardDetail->cardNumber;
$fecha_expiracion_tarjeta =  $result->cardDetail->cardExpirationDate;
$tbk_codigo_autorizacion =  $result->detailOutput->authorizationCode;
$codigo_tipo_pago =  $result->detailOutput->paymentTypeCode;
$tbk_codigo_transaccion =  $result->detailOutput->responseCode;
$codigo_comercio =  $result->detailOutput->commerceCode;
//$tbk_fecha_transaccion =  $result->transactionDate;
$tbk_url_retorno = $result->urlRedirection;
$tbk_vci = $result->VCI;

//el orden de la compra
$orden_compra = $result->buyOrder;


//guardamos este dato solo como prueba para luego recuperarlo en finalizar.php
//deberiamos llevarnos el token para hacer la validacion de forma correcta
//$_SESSION['response_code'] =  $result->detailOutput->responseCode;

//si responseCode es = 0, la transaccion fue aprobada con exito por transbank
if($result->detailOutput->responseCode == 0 ){
    //echo 'la transaccion fue aprobada';
    //guardar datos de la trasaccion en la bd
    //MUY IMPORTANTE GUARDAR EL TOKEN PARA LUEGO EN FINALIZAR.PHP RESCATARLO DESDE UNA CONSULTA Y OBTENER TODOS
    //LOS DATOS DE LA TRANSACCION 

    //se actualizan los datos de la tabla tbk_transacciones con los datos de la respuesta de transbank
    actualizarTbk_transacciones($codigo_tipo_pago,$numero_tarjeta,$fecha_expiracion_tarjeta,$tbk_codigo_autorizacion,$tbk_codigo_transaccion,$codigo_comercio,$tbk_url_retorno,$tbk_vci,$orden_compra);

    //se actualiza el estado de la compra    
    $estado = $tbk_codigo_transaccion;
    actualizarEstadoCompra($estado,$orden_compra);

}else{
    //guradar datos de la transaccion en la bd como rechazado 

   
    //se actualizan los datos de la tabla tbk_transacciones pero con el tbk_codigo_transaccion distinto de 0
    actualizarTbk_transacciones($codigo_tipo_pago,$numero_tarjeta,$fecha_expiracion_tarjeta,$tbk_codigo_autorizacion,$tbk_codigo_transaccion,$codigo_comercio,$tbk_url_retorno,$tbk_vci,$orden_compra);

    $estado = $tbk_codigo_transaccion;
    actualizarEstadoCompra($estado,$orden_compra);
}

//se le informa a webpay el resultadpo de la transaccion
//ua vez ejecutada esta linea ya no se puede volver a recargar la misma pagina
//una vez informado ya no se puede deshacer
//aqui se acepta la plata, si no se acepta dentro del tiempo 30 segundos el token expira 
//y transbank declara la transaccion como reversada apesar de que haya sido 
//aprobada tal vez en primera instancia
$webPay->acknowledgeTransaction();

// Redirecciona al cliente a Webpay para recibir el Voucher
echo  RedirectorHelper::redirectBackNormal($result->urlRedirection);


?>