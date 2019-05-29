<?php
session_start();
include 'funciones/funciones.php';

if(isset($_SESSION['carrito_compras'])){

    $cant = count($_SESSION['carrito_compras']);
    $datos = $_SESSION['carrito_compras'];

    for($i=0; $i < count($datos); $i++) { 

        if(getStock($datos[$i]["Id"]) > 0){
            if($datos[$i]["Cantidad"] > getStock($datos[$i]["Id"])){
                echo 'La cantidad seleccionada del producto "'.$datos[$i]["Nombre"].'" es mayor al stock disponible.';
            }else{
                echo '0';
            }
        }else{
            echo 'El producto "'.$datos[$i]["Nombre"].'" no tiene stock';
        }
        

    }
}


?>