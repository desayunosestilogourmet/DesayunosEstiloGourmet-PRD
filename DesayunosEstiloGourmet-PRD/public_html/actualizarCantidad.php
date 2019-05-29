<?php 
    session_start();

    $encontro=false;
    $numero=0;

    for($i=0;$i<count($_SESSION['carrito_compras']);$i++){

        if($_SESSION['carrito_compras'][$i]['Id']==$_POST['id_producto']){
            $encontro=true;
            $numero=$i;
        }

        if($encontro==true){
            $_SESSION['carrito_compras'][$numero]['Cantidad']=$_POST['cantidad'];
        }
    }
?>