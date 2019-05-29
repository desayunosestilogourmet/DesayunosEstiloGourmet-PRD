<?php 
session_start();


include 'funciones/funciones.php';

$monto_total = $_POST["monto_total"];

$sub_total = $_POST["sub_total"];

$resp = listarComunas();


$nombre_cliente = $_POST["nombre_cliente"];
$correo_cliente = $_POST["correo_cliente"];
$id_comuna = $_POST["comuna"];
$direccion_delivery = $_POST["direccion_delivery"]; 
$fecha_delivery = $_POST["fecha_delivery"];
$mensaje = $_POST["mensaje"];

$resp2 =  getDatosComuna($id_comuna);
$row = mysqli_fetch_array($resp2);

$monto_total_final = 0;

if(isset($_SESSION["datos_formulario"])){
    if($_SESSION["datos_formulario"]["id_comuna"] == $id_comuna){
        $monto_total_final =  $monto_total;
        // $sub_total = $monto_total;
        
    }else{
        $resp2 =  getDatosComuna($id_comuna);
        $row = mysqli_fetch_array($resp2);
        $monto_total_final =  $sub_total + $row["valor"];
    }
}else{
    $monto_total_final =  $monto_total + $row["valor"];
}



$datos_formulario =  array(
    "nombre_cliente"=>$nombre_cliente,
    "correo_cliente"=>$correo_cliente,
    "id_comuna"=>$id_comuna,
    "direccion_delivery"=>$direccion_delivery,
    "fecha_delivery"=>$fecha_delivery,
    "mensaje"=>$mensaje,
    "monto_total"=>$monto_total_final,
    "sub_total"=>$sub_total);

$_SESSION["datos_formulario"] =  $datos_formulario;


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Confirmar y pagar - Desayunos Estilo Gourmet</title>
        <link rel="icon" href="img/core-img/icono.ico">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/style.css">
        <!-- Bootstrap CDN CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- swal include -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>      
    </head>

    <body>
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img src="img/core-img/logo_deg.png" class="avatar mt-3">
                </div>

                <!--barra de progreso-->
                <div class="container mt-5">
                    <ul class="progressbar">
                        <li class="active">Armar Carro</li>
                        <li class="active">Completar datos</li>
                        <li>Confirmar y pagar</li>
                        <li>comporbante pago</li>
                    </ul>
                </div>
                <!--barra de progreso-->

                
                <div class="col-lg-12 text-center">
                    
                    <h1 class="mt-5 titulo-cursivo">
                        Confirmar y pagar
                    </h1>
                    <p>Confirme la información de la compra, una vez que esté seguro, presione el botón pagar, el cual le dirigirá al portal de pago WebPay.</p>

                    <form action="pagar.php" method="POST" id="form_finalizar" name="form_finalizar">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nombre</td>
                                    <td><?php echo $nombre_cliente; ?></td>
                                </tr>
                                <tr>
                                    <td>Correo</td>
                                    <td><?php echo $correo_cliente;?></td>
                                </tr>
                                <tr>
                                    <td>Comuna</td>
                                    <td><?php echo $row["nombre"];?></td>
                                </tr>
                                <tr>
                                    <td>Direccion delivery</td>
                                    <td><?php echo $direccion_delivery;?></td>
                                </tr>
                                <tr>
                                    <td>Fecha delivery</td>
                                    <td><?php echo $fecha_delivery;?></td>
                                </tr>
                                <tr>
                                    <td>Nota del pedido</td>
                                    <td><?php echo $mensaje;?></td>
                                </tr>
                                <tr>
                                    <th>Sub Total</th>
                                    <td><?php echo "$ ".number_format($sub_total, 0, '', '.');?></td>
                                </tr>
                                <tr>
                                    <th>Valor delivery</th>
                                    <td><?php echo "$ ".number_format($row["valor"], 0, '', '.');?></td>
                                </tr>
                                <tr>
                                        <th>Total a pagar</th>
                                        <td><?php echo "$ ".number_format($monto_total_final, 0, '', '.');?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group row justify-content-center">
                                <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary" style="width:130px;" onclick="window.location.href='completar_datos.php'">Volver</button>
                                </div>
                                &nbsp;
                                <div class="col-sm-2">
                                    <input type="submit" class="btn btn-warning" style="color:white;" id="btn_enviar" value="Confirmar y pagar"> 
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pagar_carro.js"></script>

    </body>

</html>