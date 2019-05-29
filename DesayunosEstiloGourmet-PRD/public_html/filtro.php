<?php
    session_start();

    $filtro = $_POST["filtro"];
    $location = $_POST["location"];

    switch ($location) {
        case 'para-ella.php':
            $_SESSION["ubicacion"] = 1;
            break;
        case 'para-el.php':
            $_SESSION["ubicacion"] = 2;
            break;
        case 'cumpleanos.php':
            $_SESSION["ubicacion"] = 3;
            break;
        case 'nacimientos.php':
            $_SESSION["ubicacion"] = 4;
            break;
        case 'dia-padre.php':
            $_SESSION["ubicacion"] = 5;
            break;
        case 'dia-madre.php':
            $_SESSION["ubicacion"] = 6;
            break;
        case 'san-valentin.php':
            $_SESSION["ubicacion"] = 7;
            break;
        case 'armar-pedido.php':
            $_SESSION["ubicacion"] = 8;
            break;
        case 'promociones.php':
            $_SESSION["ubicacion"] = 9;
            break;
        case 'index.php':
            $_SESSION["ubicacion"] = 10;
            break;    
    }

    
    $_SESSION["filtro"] = $filtro;
    echo 'ok';
    
?>