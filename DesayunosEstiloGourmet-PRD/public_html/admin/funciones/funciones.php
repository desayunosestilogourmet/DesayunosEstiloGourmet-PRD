<?php 

//include '../conexion/BDconexion.php';
include __DIR__.'/../../conexion/BDconexion.php';

//Se valida si el usuario se encuentra registrado en la BD
function validaUsuario($nombre){
  global $conn;
  $name = "";
  $query = "SELECT nombre FROM usuario WHERE nombre = '".$nombre."'";
  $resp = mysqli_query($conn, $query);

  while($row = mysqli_fetch_row($resp))
  {
    $name = $row[0];
  }

  if($name === $nombre){
    return true;
  }else{
    return false;
  }
}

//Se valida clave del usuario al momento de loguearse
function validaClave($nombre, $clave){
  global $conn;
  $pass="";
  $query = "SELECT clave FROM usuario WHERE nombre = '".$nombre."'";
  $resp = mysqli_query($conn, $query);

  while($row = mysqli_fetch_row($resp))
  {
    $pass = $row[0];
  }

  if($clave === $pass){
    return true;
  }else{
    return false;
  }
}

// Lista las categorias
function listarCategorias(){
  global $conn;
  $query = "SELECT id, nombre FROM categorias";

  $result = mysqli_query($conn,$query);
  return $result;
}

// INSERTAR informacion en la tabla producto
function registrarProducto($nombre, $precio, $stock, $img, $categoria, $detalle){
  global $conn;
  $query = "INSERT INTO producto (nombre,precio,stock,fecha_creacion,imagen,categoria,detalle) VALUES	('".$nombre."',".$precio.",".$stock.",NOW(),'".$img."',".$categoria.",'".$detalle."')";
  $resp = mysqli_query($conn, $query);

  if($resp){
    return true;
  }else{
    return false;
  }
}

// Lista los productos para la vista [Listar PRODUCTO]
function listarProductos(){
  global $conn;
  $query = "SELECT p.id AS idP, c.id AS idC, p.imagen AS imagen, p.nombre AS nombreP, c.nombre AS nombreC, p.precio AS precio, p.stock AS stock, p.detalle AS detalle, p.fecha_creacion AS fecha FROM producto AS p INNER JOIN categorias AS c ON p.categoria = c.id";

  $result = mysqli_query($conn,$query);
  return $result;
}

// Lista un producto para poder editar en la vista [Editar PRODUCTO]
function listaProducto($id){
  global $conn;
  $query = "SELECT id, nombre, precio, stock, fecha_creacion, imagen, categoria, detalle FROM producto WHERE id = ".$id."";

  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_array($result);
  return $row;
}

// Edita producto con imagen
function editarProductoConImagen($id, $nombre, $precio, $stock, $categoria, $imagen, $detalle){
  global $conn;
  $query = "UPDATE producto SET nombre = '".$nombre."', precio = ".$precio.", stock = ".$stock.", categoria = ".$categoria.", imagen = '".$imagen."', detalle = '".$detalle."' WHERE id = ".$id."";
  $resp = mysqli_query($conn, $query);

  if($resp){
    return true;
  }else{
    return false;
  }
}

// Edita producto sin imagen
function editarProductoSinImagen($id, $nombre, $precio, $stock, $categoria, $detalle){
  global $conn;
  $query = "UPDATE producto SET nombre = '".$nombre."', precio = ".$precio.", stock = ".$stock.", categoria = ".$categoria.", detalle = '".$detalle."' WHERE id = ".$id."";
  $resp = mysqli_query($conn, $query);

  if($resp){
    return true;
  }else{
    return false;
  }
}

// Elimina producto
function eliminaProducto($id){
  global $conn;
  $query = "DELETE FROM producto WHERE id = ".$id."";
  $resp = mysqli_query($conn, $query);

  if($resp){
    return true;
  }else{
    return false;
  }
}

//metodo para traer los datos de la transaccion y la compra segun orden de compra
function selectDatosCompraAndTBK(){
  global $conn;
  $query =  "SELECT id, orden_compra, numero_tarjeta, fecha_expiracion_tarjeta, tbk_codigo_autorizacion, tbk_codigo_transaccion, monto_compra, codigo_comercio, fecha_registro
             FROM tbk_transacciones";

  $result = mysqli_query($conn,$query);
  return $result;
}

//Listar tabla comercio_transacciones
function selectDatosComercioTran(){
  global $conn;
  $query = "SELECT * FROM comercio_transacciones";

  $result = mysqli_query($conn, $query);
  return $result;
}

//Obtiene comuna por id
function obtieneComunaPorID($id){
  global $conn;
  $query = "SELECT * FROM comunas WHERE id = ".$id."";

  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

  return $row;
}

function detalle_compra($orden){
  global $conn;
  $query = "SELECT nombre, cantidad_producto FROM productos_compras INNER JOIN producto ON id_producto = producto.id WHERE orden_compra = '".$orden."'";

  $result =  mysqli_query($conn, $query);  
  return $result;
}

?>