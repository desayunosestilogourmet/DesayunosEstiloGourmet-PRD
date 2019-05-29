<?php
session_start();
include 'funciones/funciones.php';

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($usuario) && isset($clave)){
    if(!empty($usuario) && !empty($clave)){
      if(validaUsuario($usuario)){
        if(validaClave($usuario, $clave)){

          //AL MOMENTO DE LA PERSONA LOGUERASE DEBEMOS COMENZAR A CAPTURAR EL TIEMPO DE ACTIVIDAD DE ESTA MANERA
          $_SESSION['start'] = time();

          //Y FIJAMOS EL TIEMPO DE EXPIRACION DE LA SESION, EL 60 DEBE MANTENERSE YA QUE AL PONER CUALQUIER NUMERO *60 NOS DARA SU VALOR EN MINUTOS
          $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);

          //VARIABLE PARA TENER LA SESION DEL USUARIO
          $_SESSION["session_usuario"] = $usuario;
          echo "0";
          //header("location: index.php");
        }else{
          echo "1";
          //$mensaje = "Clave incorrecta";
          //header("location: login.php?mensaje=$mensaje");
        }
      }else{
        echo "2";
        //$mensaje = "Usuario no registrado o invalido";
        //header("location: login.php?mensaje=$mensaje");
      }
    }else{
      echo "3";
      //$mensaje = "ERROR!! Datos vacios";
      //header("location: login.php?mensaje=$mensaje");
    }
  }else{
    echo "4";
    //$mensaje = "ERROR!! Datos indefinidos o NULL";
    //header("location: login.php?mensaje=$mensaje");
  }
}else{
  echo "5";
  //$mensaje = "ERROR!! Method form incorrecto";
  //header("location: login.php?mensaje=$mensaje");
}

?>
