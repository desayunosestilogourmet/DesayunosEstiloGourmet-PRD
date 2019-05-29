<?php
    include 'funciones/funciones.php';

    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $categoria = $_POST["categoria"];
    $detalle = $_POST["detalle"];
    $nameImagen = $_POST["nameImagen"];

    if(isset($nombre) && !empty($nombre)){
        if(strlen($nombre) <= 255){
            if(isset($precio) && !empty($precio)){
                if(strlen($precio) > 0){
                    if(is_numeric($precio)){
                        if(isset($stock) && !empty($stock)){
                            if(strlen($stock) > 0){
                                if(is_numeric($stock)){
                                    if($categoria > 0){
                                        if(subirIMG()){
                                            if(registrarProducto($nombre, $precio, $stock, $nameImagen, $categoria, $detalle)){

                                                echo "Se ha agregado el producto correctamente";
                                            }else{
                                                echo "Error al insertar en la Base de Datos";
                                            }
                                            
                                        }else{

                                        }

                                    }else{
                                        echo "Debe seleccionar una categoria";
                                    }

                                }else{
                                    echo "Debe ingresar un valor numerico com Stock";
                                }

                            }else{
                                echo "El campo Stock debe ser mayor que cero";
                            }

                        }else{
                            echo "El campo Sytock es obligatorio";
                        }

                    }else{
                        echo "Debe ingresar un valor numerico como precio";
                    }

                }else{
                    echo "El campo precio ser mayor que cero";
                }

            }else{
                echo "El campo precio es obligatorio";
            }

        }else{
            echo "El campo nombre debe tener un largo maximo de 255";
        }

    }else{
        echo "El campo nombre es obligatorio";
    }

    function subirIMG(){
        $ruta = '../img/productos/'; //Decalaramos una variable con la ruta en donde almacenaremos los archivos
        $respuesta = false;
       
        foreach ($_FILES as $key) //Iteramos el arreglo de archivos
        {
            if($key['error'] == UPLOAD_ERR_OK )//Si el archivo se paso correctamente Ccontinuamos 
                {
                    $NombreOriginal = $key['name'];//Obtenemos el nombre original del archivo
                    $temporal = $key['tmp_name']; //Obtenemos la ruta Original del archivo
                    $Destino = $ruta.$NombreOriginal;	//Creamos una ruta de destino con la variable ruta y el nombre original del archivo	
                    
                    move_uploaded_file($temporal, $Destino); //Movemos el archivo temporal a la ruta especificada
    
                    
                }
        
            if ($key['error']=='') //Si no existio ningun error, retornamos un mensaje por cada archivo subido
                {
                    $respuesta = true;
                }
            if ($key['error']!='')//Si existio algún error retornamos un el error por cada archivo.
                {
                    $respuesta = false; 
                }
        }
    
        return $respuesta;
    }

?>