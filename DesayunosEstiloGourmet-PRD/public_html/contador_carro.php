<?php
session_start();
$cantidad_productos =  count($_SESSION["carrito_compras"]);
echo $cantidad_productos;



?>