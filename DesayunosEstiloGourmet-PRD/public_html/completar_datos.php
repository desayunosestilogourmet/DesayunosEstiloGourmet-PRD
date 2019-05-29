<?php 
session_start();

include 'funciones/funciones.php';

if(isset($_POST["monto_total"])){
    $monto_total = $_POST["monto_total"];
    $sub_total = $_POST["monto_total"];
}

$resp = listarComunas();

if(isset($_SESSION["datos_formulario"])){

    $datos_form[] = $_SESSION['datos_formulario'];

    for ($i=0; $i<count($datos_form); $i++){ 

        $nombre_cliente =  $datos_form[$i]["nombre_cliente"];
        $correo_cliente =  $datos_form[$i]["correo_cliente"];
        $id_comuna =  $datos_form[$i]["id_comuna"];
        $direccion_delivery =  $datos_form[$i]["direccion_delivery"];
        $fecha_delivery =  $datos_form[$i]["fecha_delivery"];
        $mensaje =  $datos_form[$i]["mensaje"];
        $monto_total =  $datos_form[$i]["monto_total"];
        $sub_total =  $datos_form[$i]["sub_total"];
    }

}else{
        $nombre_cliente = "";
        $correo_cliente =  "";
        $id_comuna =  0;
        $direccion_delivery = "";
        $fecha_delivery = "";
        $mensaje = "";
        //$monto_total = 0;

}



?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Completar datos compra - Desayunos Estilo Gourmet</title>
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
                            <li>Completar datos</li>
                            <li>Confirmar y pagar</li>
                            <li>comporbante pago</li>
                        </ul>
                </div>
                <!--barra de progreso-->

                <div class="col-lg-12 text-center">
                
                    <h1 class="mt-5 titulo-cursivo">
                        Completar datos compra
                    </h1>
                    <p>Para completar el proceso de compra, por favor ingrese la siguiente información.
                            <br>A continuación será redirigido a la pantalla de confirmar y pagar.</p>
                   
                            <form action="confirmar_pagar.php" method="POST" id="form_finalizar" name="form_finalizar">
                            <div class="form-group row justify-content-center">
                                <label for="nombre" class="col-sm-2 col-form-label">Nombre Completo</label>
                                <div class="col-sm-6">
                                <input  type="text" class="form-control" name="nombre_cliente" id="nombre_cliente" placeholder="Nombre completo" value="<?php echo $nombre_cliente;?>">
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="correo_cliente" name="correo_cliente" placeholder="ej: micorreo@midominio.cl" value="<?php echo $correo_cliente;?>">
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="cbo_delivery" class="col-sm-2 col-form-label">Comuna del delivery</label>
                                <div class="col-sm-6">
                                    <select name="comuna" id="comuna" class="form-control">
                                        
                                        <option value="0">Seleccione comuna</option>
                                        <?php while($row =  mysqli_fetch_array($resp)){ 
                                        if($id_comuna == $row["id"]) {?>
                                            <option selected value="<?php echo $row["id"];?>"><?php echo $row["nombre"]." - $".number_format($row["valor"], 0, '', '.');?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $row["id"];?>"><?php echo $row["nombre"]." - $".number_format($row["valor"], 0, '', '.');?></option>    
                                        <?php } } ?>      
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="cbo_delivery" class="col-sm-2 col-form-label">Dirección del delivery</label>
                                <div class="col-sm-6">
                                <input  type="text" class="form-control" name="direccion_delivery" id="direccion_delivery" placeholder="Nombre Calle 2334, Departamento , Nombre calle referencia" value="<?php echo $direccion_delivery;?>">    
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                    <div id="tooltip" class="col-sm-2 col-form-label">
                                       Fecha delivery(*)
                                        <span id="tooltiptext">El delivery está disponible 48hrs después del dia de la compra.</span>
                                    </div>
                                   
                                    <div class="col-sm-6">
                                        <?php /*fecha minima en php para el input date*/ $date = new DateTime('+2 day'); ?>                                  
                                        <input type="date" class="form-control" name="fecha_delivery" id="fecha_delivery" min="<?php echo $date->format('Y-m-d');?>" value="<?php echo $fecha_delivery;?>">
                                    </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                    <label for="cbo_delivery" class="col-sm-2 col-form-label">Añade una nota para tu amigo(a)</label>
                                    <div class="col-sm-6">
                                        <textarea name="mensaje" id="mensaje" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Querido(a) amigo(a) espero que disfrutes este desayuno que envié con cariño para ti."><?php echo $mensaje;?></textarea>
                                    </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary" style="width:130px;" onclick="window.location.href='cart.php'">Volver</button>
                                </div>
                                &nbsp;
                                <div class="col-sm-2">
                                    <input type="submit" class="btn btn-warning" style="color:white;" id="btn_enviar" value="Siguiente Paso"> 
                                </div>
                            </div>
                            <input type="hidden" name="monto_total" id="monto_total" value="<?php echo $monto_total;?>">
                            <input type="hidden" name="sub_total" id="sub_total" value="<?php echo $sub_total;?>">
                        </form>   
                </div>
            </div>
        </div>
    
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pagar_carro.js"></script>
      
    </body>
    </html>