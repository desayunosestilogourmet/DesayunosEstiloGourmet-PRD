<?php
session_start();


// echo '<pre>';
// var_dump($_SESSION);

// echo count($_SESSION["carrito_compras"]);


use Freshwork\Transbank\CertificationBagFactory;
use Freshwork\Transbank\TransbankServiceFactory;
use Freshwork\Transbank\RedirectorHelper;

include 'vendor/autoload.php';
include 'funciones/funciones.php';

// echo __DIR__.'/funciones/funciones2.php';
//rescato los datos de la transaccion
$monto_total = $_SESSION["datos_formulario"]["monto_total"];
$nombre_cliente = $_SESSION["datos_formulario"]["nombre_cliente"];
$correo_cliente = $_SESSION["datos_formulario"]["correo_cliente"];
$comuna_delivery = $_SESSION["datos_formulario"]["id_comuna"];
$fecha_delivery = $_SESSION["datos_formulario"]["fecha_delivery"];
$direccion_delivery =  $_SESSION["datos_formulario"]["direccion_delivery"];
$mensaje = $_SESSION["datos_formulario"]['mensaje'];

//$id_producto = $_SESSION["id_producto"];

$orden_compra =  "DEG-".obtenerMaxIdComercio_transacciones();

//se registra la compra
$registroCompra = registrarCompra($orden_compra,99,$direccion_delivery,$comuna_delivery,$fecha_delivery,$monto_total,$nombre_cliente,$correo_cliente,$mensaje);

$nuevoStock = 0;

if($registroCompra){
// //quito los valores de la sesion de los datos del formulario
// unset($_SESSION["datos_formulario"]);

    for ($i=0; $i<count($_SESSION["carrito_compras"]) ; $i++) { 

        $stock = getStock($_SESSION["carrito_compras"][$i]["Id"]);
        $nuevoStock =  $stock - $_SESSION["carrito_compras"][$i]["Cantidad"];

        $insertarProductosCompra = insertarProductosCompra($orden_compra,$_SESSION["carrito_compras"][$i]["Id"],$_SESSION["carrito_compras"][$i]["Cantidad"]);
    }

}else{
 echo 'Se ha producido un error al registrar la compra <br>';
 echo 'Será redirigido al incio de la página.';
 echo '<a href="index.php">Volver al inicio</a>';
}



//guardo la orden de compra en sesion para luego rescatar los datos de la transaccion en la vista 
//boucher_final.php
$_SESSION["orden_compra"] = $orden_compra;

// Obtenemos los certificados y llaves para utilizar el ambiente de integración de Webpay Normal.
$bag =  CertificationBagFactory::integrationWebPayNormal();


$webPay = TransbankServiceFactory::normal($bag); 

// Para transacciones normales, solo puedes añadir una linea de detalle de transacción.
$webPay->addTransactionDetail($monto_total, $orden_compra);



// Debes además, registrar las URLs a las cuales volverá el cliente durante y después del flujo de Webpay
$response =  $webPay->initTransaction('https://desayunosestilogourmet.cl/response.php', 'https://desayunosestilogourmet.cl/boucher_final.php');

//registro los datos de la transaccion de transbank
$registrarTransaccionTBK =  registrarTransaccionTBK($orden_compra,$response->token,"NULL","NULL",0,1,0,$monto_total,"NULL","NULL","NULL");


if($registrarTransaccionTBK){
    for ($i=0; $i<count($_SESSION["carrito_compras"]) ; $i++) { 
        actualizarStock($_SESSION["carrito_compras"][$i]["Id"],$nuevoStock);
    }    
   
}

//la respuesta me entrega el token y una url donde debe ser redirigido el usuario junto al token
//deberia pasar por input hidden el token a la url entregada en la respuesta

// Utilidad para generar formulario y realizar redirección POST
//GUARDAR EL TOKEN EN BD, POR QUE LUEGO SERA LA UNICA FORMA DE RECUPERAR LOS DATOS DE LA 
//TRANSACCION UNA VEZ CONCRETADO EL PAGO POR TRANSBANK
echo RedirectorHelper::redirectHTML($response->url, $response->token);

?>