<?php
session_start();

$id_producto =  $_POST["Id"];
$arreglo =  $_SESSION["carrito_compras"];

for($i=0; $i<count($arreglo); $i++) { 
    if($arreglo[$i]["Id"] != $id_producto){
        $datosNuevos[] = array(
            'Id'=>$arreglo[$i]['Id'],
            'Nombre'=>$arreglo[$i]['Nombre'],
            'Precio'=>$arreglo[$i]['Precio'],
            'Imagen'=>$arreglo[$i]['Imagen'],
            'Stock'=>$arreglo[$i]['Stock'],
            'Cantidad'=>$arreglo[$i]['Cantidad']
        );
    }
}

if(isset($datosNuevos)){
    $_SESSION["carrito_compras"] = $datosNuevos;
}else{
    unset($_SESSION["carrito_compras"]);
    echo '0';
}

?>