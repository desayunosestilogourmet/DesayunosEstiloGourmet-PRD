<?php
    include 'funciones/funciones.php';

    $idDel = $_POST['idDel'];

    if(eliminaProducto($idDel)){
        echo "Se ha eliminado el producto correctamente";
    }else{
        echo "Error al eliminar el producto";
    }
?>