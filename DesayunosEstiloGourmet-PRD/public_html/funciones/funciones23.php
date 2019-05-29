<?php

include __DIR__.'../conexion/BDconexion.php';

//echo __DIR__.'/../conexion/BDconexion.php';

//Se valida si el usuario se encuentra registrado en la BD
function validaUsuario($usuario){
  global $conn;
  $usu = "";
  $query = "SELECT usuario FROM usuario WHERE usuario = '".$usuario."'";
  $resp = mysqli_query($conn, $query);

  while($row = mysqli_fetch_row($resp)){
    $usu = $row[0];
  }

  if($usu === $usuario){
    return true;
  }else{
    return false;
  }

}


//Se valida clave del usuario al momento de loguearse
function validaClave($usuario, $clave){
  global $conn;
  $pass="";
  $query = "SELECT clave FROM usuario WHERE usuario = '".$usuario."'";
  $resp = mysqli_query($conn, $query);

  while($row = mysqli_fetch_row($resp)){
    $pass = $row[0];
  }

  if($clave === $pass){
    return true;
  }else{
    return false;
  }

}


function obtieneNombre($usuario){
  global $conn;
  $nombre="";
  $query = "SELECT nombre FROM usuario WHERE usuario = '".$usuario."'";
  $resp = mysqli_query($conn, $query);

  while($row = mysqli_fetch_row($resp)){
    $nombre = $row[0];
  }
    return $nombre;
}



function registrarUsuario($nombre, $usuario, $clave, $tipo_usuario, $foto, $cargo){
  global $conn;
  $query = "INSERT INTO usuario (nombre, usuario, clave, tipo, foto, cargo) VALUES ('".$nombre."','".$usuario."','".$clave."',".$tipo_usuario.",'".$foto."',".$cargo.")";
  $resp = mysqli_query($conn, $query);

  if($resp){
    echo "SI";
    return true;
  }else{
    echo "NO".mysqli_error($conn);
    return false;
  }

}


//metodo para contar notificaciones
function notificaciones(){
  global $conn;
  $noti = '';
  $query = "SELECT COUNT(*) FROM contacto WHERE gestion = 0";
  $resp = mysqli_query($conn, $query);

  while($row = mysqli_fetch_row($resp)){
    $noti = $row[0];
  }
    return $noti;
}

//metodo para registrar compra 
function registrarCompra($orden_compra,$estado,$direccion_delivery,$id_comuna_delivery,$fecha_delivery,$monto_compra,$nombre_usuario,$correo_usuario,$mensaje){
 global $conn;
 $query = "INSERT INTO comercio_transacciones(orden_compra, estado, direccion, id_comuna_delivery, fecha_delivery, monto_compra, nombre_usuario, correo_usuario, mensaje) 
           VALUES ('".$orden_compra."',".$estado.",'".$direccion_delivery."',".$id_comuna_delivery.",'".$fecha_delivery."',".$monto_compra.",'".$nombre_usuario."','".$correo_usuario."','".$mensaje."')";
 $resp = mysqli_query($conn,$query);


 if($resp){
    //echo "SI";
    return true;
  }else{
    //echo "NO".mysqli_error($conn);
    return false;
  }
 
}

//metodo para registrar transaccion transbank
function registrarTransaccionTBK($orden_compra,$tbk_token_transaccion,$numero_tarjeta,$fecha_expiracion_tarjeta,$tbk_codigo_autorizacion,$tbk_codigo_transaccion,$codigo_comercio,$monto_compra,$tbk_url_retorno,$tbk_vci){
  global $conn;
  $query = "INSERT INTO tbk_transacciones(orden_compra, tbk_token_transaccion, numero_tarjeta, fecha_expiracion_tarjeta, tbk_codigo_autorizacion, tbk_codigo_transaccion, codigo_comercio, monto_compra,tbk_url_retorno,tbk_vci) 
            VALUES ('".$orden_compra."','".$tbk_token_transaccion."','".$numero_tarjeta."','".$fecha_expiracion_tarjeta."',".$tbk_codigo_autorizacion.",".$tbk_codigo_transaccion.",".$codigo_comercio.",".$monto_compra.",'".$tbk_url_retorno."','".$tbk_vci."')";

  $resp = mysqli_query($conn,$query);

  if($resp){
    //echo "SI";
    return true;
  }else{
    //echo "NO".mysqli_error($conn);
    return false;
  }

}

//metodo para obtner el max id para concatenarlo la orden de compra
function obtenerMaxIdComercio_transacciones(){
  global $conn;
  $query = "SELECT max(id) as id FROM comercio_transacciones";
  $resp =  mysqli_query($conn,$query);
  $id =  mysqli_fetch_array($resp);
    
  if($id['id'] ==  NULL){
    return 1;
  }else{
    return $id['id']+1;
  }
  
}

//metodo para actualizar la informacion de la tabla tbk_transacciones segun orden de compra
function actualizarTbk_transacciones($codigo_tipo_pago,$numero_tarjeta,$fecha_expiracion_tarjeta,$tbk_codigo_autorizacion,$tbk_codigo_transaccion,$codigo_comercio,$tbk_url_retorno,$tbk_vci,$orden_compra){
  global $conn;
  $query = "UPDATE tbk_transacciones SET codigo_tipo_pago = '".$codigo_tipo_pago."', numero_tarjeta = '".$numero_tarjeta."',
                                          fecha_expiracion_tarjeta = '".$fecha_expiracion_tarjeta."',tbk_codigo_autorizacion = ".$tbk_codigo_autorizacion.",
                                          tbk_codigo_transaccion = ".$tbk_codigo_transaccion." ,codigo_comercio = ".$codigo_comercio.",
                                          tbk_url_retorno = '".$tbk_url_retorno."',
                                          tbk_vci = '".$tbk_vci."' WHERE orden_compra = '".$orden_compra."'";
  $resp = mysqli_query($conn,$query);


  if($resp){
    return true;
  }else{
    return false;
  }
}

//funcion para actualizar el estado de la compra a aprobado
//estado = 0  significa aprobado
//estado = 99 no aprobado
//esta tabla se lleva el mismo estado de la tabla de TBK
function actualizarEstadoCompra($estado,$orden_compra){
  global $conn;
  $query =  "UPDATE comercio_transacciones SET estado = ".$estado." WHERE orden_compra =  '".$orden_compra."'";
  $resp =  mysqli_query($conn,$query);
  if($resp){
    return true;
  }else{
    return false;
  }

}

//metodo para traer los datos de la transaccion y la compra segun orden de compra
function selectDatosCompraAndTBK($orden_compra){
  global $conn;
  $query =  "SELECT c.fecha_delivery,c.nombre_usuario,c.correo_usuario,c.id_comuna_delivery,c.monto_compra, tbk.tbk_codigo_autorizacion,tbk.tbk_codigo_transaccion,tbk.orden_compra,tbk.fecha_registro
             FROM comercio_transacciones c 
             JOIN tbk_transacciones tbk on tbk.orden_compra = c.orden_compra
             WHERE tbk.orden_compra =  '".$orden_compra."'";
  $resp =  mysqli_query($conn,$query);
  $row =  mysqli_fetch_array($resp);

  return $row;
}

//funcion para insertar los productos y su cantidad en una compra
function insertarProductosCompra($orden_compra,$id_producto,$cantidad_producto){
  global $conn;
  $query= "INSERT INTO productos_compras (orden_compra,id_producto,cantidad_producto) VALUES ('".$orden_compra."',".$id_producto.",".$cantidad_producto.")";
  $result =  mysqli_query($conn,$query);

  //echo 'query insertar Productos Compra ->'.$query.'<br>';
  
  if($result){
    return true;
  }else{
    return false;
  }


}

//funcion para listar los datos del producto segun id de producto
//se utiliza en la vista product-details.php
function verDetalleProducto($id_producto){
  global $conn;
  $query = "SELECT * FROM producto WHERE id =  ".$id_producto."";
  $resp =  mysqli_query($conn,$query);  
  return $resp;

}

function getStock($id_producto){
  global $conn;
  $query = "SELECT stock FROM producto WHERE id =  ".$id_producto."";
  $resp =  mysqli_query($conn,$query);  
  $row = mysqli_fetch_array($resp);

  //echo 'query getStock ->'.$query.'<br>';

  return $row["stock"];

}

function actualizarStock($id_producto,$stock){
  global $conn;
  $query =  "UPDATE producto SET stock = ".$stock." WHERE id =  ".$id_producto."";
  $resp =  mysqli_query($conn,$query);

  //echo 'query actualizarStock ->'.$query.'<br>';
  
  if($resp){
    return true;
  }else{
    return false;
  }

}


/**************************[SECCION PARA LISTAR PRODUCTOS POR CATEGORIAS]********************************/

/**[Categorias]**/

/*

TABLA :  categorias
_______________________________________
|       ID       |     NOMBRE         |
|________________|____________________|
|        1       |   PARA ELLAS       |
|        2       |   PARA EL          |  
|        3       |   CUMPLEAÑOS       |
|        4       |   NACIMIENTOS      |   
|        5       |   DIA DEL PADRE    |
|        6       |   DIA DE LA MADRE  |
|        7       |   SAN VALENTIN     |
|        8       |   ARMA TU PEDIDO   | 
|        9       |   PROMOCIONES      |
|_____________________________________|

*/

/**[Categorias]**/

//funcion para listar porductos / categoria : index
//aqui se listan 9 productos en aleatoriamente de cualquier categoria

function listarProductosIndex(){
  global $conn;
  $query = "SELECT nombre,id,precio,imagen FROM producto ORDER BY RAND() LIMIT 9 ";
  $resp =  mysqli_query($conn,$query);  
  return $resp;
}


//funcion para listar productos / categoria : Para-ella
function listarProductosParaEllas(){
  global $conn;
  $query = "SELECT id,nombre,precio,imagen FROM producto WHERE categoria =  1";
  $resp =  mysqli_query($conn,$query);  
  return $resp;
}

//funcion para listar productos / categoria : Para-el
function listarProductosParaEl(){
  global $conn;
  $query = "SELECT id,nombre,precio,imagen FROM producto WHERE categoria =  2";
  $resp =  mysqli_query($conn,$query);  
  return $resp;
}


//funcion para listar productos / categoria : Cumpleaños
function listarProductosCumpleanos(){
  global $conn;
  $query = "SELECT id,nombre,precio,imagen FROM producto WHERE categoria =  3";
  $resp =  mysqli_query($conn,$query);  
  return $resp;
}


//funcion para listar productos / categoria : nacimientos
function listarProductosNacimientos(){
  global $conn;
  $query = "SELECT id,nombre,precio,imagen FROM producto WHERE categoria =  4";
  $resp =  mysqli_query($conn,$query);  
  return $resp;
}


//funcion para listar productos / categoria : dia del padre
function listarProductosDiaPadre(){
  global $conn;
  $query = "SELECT id,nombre,precio,imagen FROM producto WHERE categoria =  5";
  $resp =  mysqli_query($conn,$query);  
  return $resp;
}


//funcion para listar productos / categoria : Dia madre
function listarProductosDiaMadre(){
  global $conn;
  $query = "SELECT id,nombre,precio,imagen FROM producto WHERE categoria =  6";
  $resp =  mysqli_query($conn,$query);  
  return $resp;
}


//funcion para listar productos / categoria : san valentin
function listarProductosSanValentin(){
  global $conn;
  $query = "SELECT id,nombre,precio,imagen FROM producto WHERE categoria =  7";
  $resp =  mysqli_query($conn,$query);  
  return $resp;
}


//funcion para listar productos / categoria : Arma tu pedido
function listarProductosArmaTuPedido(){
  global $conn;
  $query = "SELECT id,nombre,precio,imagen FROM producto WHERE categoria =  8";
  $resp =  mysqli_query($conn,$query);  
  return $resp;
}


//funcion para listar productos / categoria : promociones
function listarProductosPromociones(){
  global $conn;
  $query = "SELECT id,nombre,precio,imagen FROM producto WHERE categoria =  9";
  $resp =  mysqli_query($conn,$query);  
  return $resp;
}


/**************************[SECCION PARA LISTAR PRODUCTOS POR CATEGORIAS]********************************/

//funcion para listar comunas 
function listarComunas(){
  global $conn;
  $query = "SELECT * FROM comunas";
  $resp =  mysqli_query($conn,$query);  
  return $resp;
}

//funcion para traer los datos de la comuna por id comuna
function getDatosComuna($id){
  global $conn;
  $query =  "SELECT * FROM comunas WHERE id =  ".$id."";
  $resp =  mysqli_query($conn,$query);
  return $resp;
}
