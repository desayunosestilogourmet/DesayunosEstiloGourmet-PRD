<?php
session_start();
//var_dump($_POST); 
$total = 0;
$cantidad = 0;

// echo "<pre>";
// var_dump($_POST);
// exit;

// $conn = mysqli_connect("10.128.0.2", "desayuno","5Fe7L!yUe06#zT","desayuno_qa");
//$conn = mysqli_connect("localhost", "root","", "dev_desayunosgourmet");

$conn = mysqli_connect("10.128.0.2", "desayuno","5Fe7L!yUe06#zT","desayuno_prd");



if(isset($_POST['quantity'])){
    $cantidad =  $_POST['quantity'];
}else{
    $cantidad = 1;
}


if(isset($_SESSION['carrito_compras'])){
    if(isset($_POST['id_producto'])){
            $arreglo=$_SESSION['carrito_compras'];
            $encontro=false;
            $numero=0;
            for($i=0;$i<count($arreglo);$i++){
                if($arreglo[$i]['Id']==$_POST['id_producto']){
                    $encontro=true;
                    $numero=$i;
                }
            }
            if($encontro==true){
                $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+$cantidad;
                $_SESSION['carrito_compras']=$arreglo;
            }else{
                $nombre="";
                $precio=0;
                $imagen="";
                $re=mysqli_query($conn,"select * from producto where id=".$_POST['id_producto']);
                while ($f=mysqli_fetch_array($re)) {
                    $nombre=$f['nombre'];
                    $precio=$f['precio'];
                    $imagen=$f['imagen'];
                    $stock=$f['stock'];
                    }
                    $datosNuevos=array('Id'=>$_POST['id_producto'],
                                    'Nombre'=>$nombre,
                                    'Precio'=>$precio,
                                    'Imagen'=>$imagen,
                                    'Stock'=>$stock,
                                    'Cantidad'=>$cantidad);

                    array_push($arreglo, $datosNuevos);
                    $_SESSION['carrito_compras']=$arreglo;

                }
    }
}else{
    if(isset($_POST['id_producto'])){
        $nombre="";
        $precio=0;
        $imagen="";
        $QUERY = "select * from producto where id=".$_POST['id_producto']."";
        $re=mysqli_query($conn,$QUERY);
        while ($f=mysqli_fetch_array($re)) {
            $nombre=$f['nombre'];
            $precio=$f['precio'];
            $imagen=$f['imagen'];
            $stock=$f['stock'];
        }
        $arreglo[]=array('Id'=>$_POST['id_producto'],
                        'Nombre'=>$nombre,
                        'Precio'=>$precio,
                        'Imagen'=>$imagen,
                        'Stock'=>$stock,
                        'Cantidad'=>$cantidad);
        $_SESSION['carrito_compras']=$arreglo;
    }
}

header("location:cart.php");
?>