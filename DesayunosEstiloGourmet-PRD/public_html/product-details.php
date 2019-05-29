<?php 
include 'funciones/funciones.php';

$id_producto = $_POST["id_producto"];
$resp =  verDetalleProducto($id_producto);
$row = mysqli_fetch_array($resp);

function name($paso){
    return str_replace(array("\r\n","\r","\n"), "<br />", $paso);
}
  

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Detalle producto - Desayunos estilo gourmet</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/icono.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/animate.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>


    <style>
        .sinstock{
            color: red;
            font-size: 12px;
        }
    
    </style>

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.php"><img src="img/core-img/logo_deg.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

         <!-- Header Area Start -->
         <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="index.php"><img src="img/core-img/logo_deg.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul id="exampleAccordion">
                    <li class="active"><a href="index.php">Categorías</a></li>
                    <li><a href="categorias/para-ella.php">Para Ella</a></li>
                    <li><a href="categorias/para-el.php">Para Él</a></li>
                    <li><a href="categorias/cumpleanos.php">Cumpleaños</a></li>
                    <li><a href="categorias/nacimientos.php">Nacimientos</a></li>
                    <li>
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">Feliz día</a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents">
                            <li >
                                <a href="categorias/dia-padre.php">Día del padre</a>
                            </li>
                            <li>
                                <a href="categorias/dia-madre.php">Día de la madre</a>
                            </li>
                            <li>
                                <a href="categorias/san-valentin.php">San valentín</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="categorias/armar-pedido.php">Arma tu pedido</a></li>
                    <li><a href="categorias/promociones.php">Promociones</a></li>
                </ul>
            </nav>
            <!-- Button Group
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Discount%</a>
                <a href="#" class="btn amado-btn active">New this week</a>
            </div> 
            -->
            <hr>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="informaciones.php" class="cart-nav"><img src="img/info-yellow.png" alt=""> Informaciones</a>
            </div> 
        </header>
        <!-- Header Area End -->

        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="mt-3 ml-20">
                <h2 class="titulo-cursivo">Detalle del producto</h2>
                <p>Revisa aquí el detalle de los productos</p>
            </div>
        <!--BREAD CRUMBS POR CATEGORIA-->
        <?php if($row["categoria"] == 1){ ?>
                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                    <li class="breadcrumb-item"><a href="categorias/para-ella.php">Para Ellas</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $row["nombre"];?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                <?php }else if($row["categoria"] == 2){ ?>
                    <div class="row">
                            <div class="col-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                        <li class="breadcrumb-item"><a href="categorias/para-el.php">Para Él</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $row["nombre"];?></li>
                                    </ol>
                                </nav>
                            </div>
                    </div>
                <?php }else if($row["categoria"] == 3){ ?>
                    <div class="row">
                            <div class="col-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                        <li class="breadcrumb-item"><a href="categorias/cumpleanos.php">Cumpleaños</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $row["nombre"];?></li>
                                    </ol>
                                </nav>
                            </div>
                    </div>
                <?php }else if($row["categoria"] == 4){ ?>
                    <div class="row">
                            <div class="col-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                        <li class="breadcrumb-item"><a href="categorias/nacimientos.php">Nacimientos</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $row["nombre"];?></li>
                                    </ol>
                                </nav>
                            </div>
                    </div>
                <?php }else if($row["categoria"] == 5){ ?>
                    <div class="row">
                            <div class="col-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                        <li class="breadcrumb-item"><a href="categorias/dia-padre.php">Día del padre</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $row["nombre"];?></li>
                                    </ol>
                                </nav>
                            </div>
                    </div>
                <?php }else if($row["categoria"] == 6){ ?>
                    <div class="row">
                            <div class="col-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                        <li class="breadcrumb-item"><a href="categorias/dia-madre.php">Día de la madre</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $row["nombre"];?></li>
                                    </ol>
                                </nav>
                            </div>
                    </div>
                <?php }else if($row["categoria"] == 7){ ?>
                    <div class="row">
                            <div class="col-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                        <li class="breadcrumb-item"><a href="categorias/san-valentin.php">San valentín</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $row["nombre"];?></li>
                                    </ol>
                                </nav>
                            </div>
                    </div>
                <?php }else if($row["categoria"] == 8){ ?>
                    <div class="row">
                            <div class="col-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                        <li class="breadcrumb-item"><a href="categorias/armar-pedido.php">Arma tu pedido</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $row["nombre"];?></li>
                                    </ol>
                                </nav>
                            </div>
                    </div>
                <?php }else if($row["categoria"] == 9){ ?>
                    <div class="row">
                            <div class="col-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                        <li class="breadcrumb-item"><a href="categorias/promociones.php">Promociones</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $row["nombre"];?></li>
                                    </ol>
                                </nav>
                            </div>
                    </div>
                <?php } ?>          

                <!--BREAD CRUMBS POR CATEGORIA-->
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <a class="gallery_img" href="img/productos/<?php echo $row['imagen']; ?>">
                            <img class="d-block w-100" src="img/productos/<?php echo $row['imagen']; ?>" alt="First slide">
                        </a>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price"><?php echo "$ ".number_format($row['precio'], 0, '', '.');?></p>
                                <a href="#">
                                    <h6><?php echo $row["nombre"];?></h6>
                                </a>
                               
                                <!-- Avaiable -->
                                <?php if($row["stock"] > 0){ ?>
                                <p class="avaibility"><i class="fa fa-circle"></i> En stock</p>
                                <?php }else if($row["stock"] == 0){ ?>
                                    <p class="avaibility"><i class="fa fa-circle" style="color: red;"></i> Sin stock</p>
                                <?php } ?>
                            </div>

                            <div class="short_overview my-5">
                                <p>
                                    <ul>
                                        <?php echo name($row["detalle"]);?>
                                    </ul>
                                </p>
                            </div>

                            <!-- Add to Cart Form -->
                            <form class="cart clearfix" method="POST" action="product-details-action.php">
                                <div class="cart-btn d-flex mb-50">
                                    <?php if ($row['stock'] > 0){ ?>
                                        <div id="tooltip">
                                            <p>Cantidad (*)</p>
                                            <span id="tooltiptext">Stock máximo <?php echo $row['stock']; ?></span>
                                        </div>
                                        
                                        <div class="quantity">
                                            <span class="qty-minus" onclick="menos(<?php echo $row['stock']; ?>)"><i class="fa fa-minus" aria-hidden="true" style="color: red;"></i></span>
                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="<?php echo $row['stock']; ?>" name="quantity" value="1">
                                            <span class="qty-plus" onclick="mas(<?php echo $row['stock']; ?>)"><i class="fa fa-plus" aria-hidden="true" style="color:rgb(31, 226, 13)"></i></span>
                                        </div>
                                    <?php }else if($row['stock'] == 0){ ?>
                                        <div id="tooltip">
                                            <p>Cantidad (*)</p>
                                            <span id="tooltiptext">Sin stock</span>
                                        </div>
                                        
                                        <div class="quantity">
                                            <!-- <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span> -->
                                            <input readonly type="number" class="qty-text" id="qty" step="1" min="1" max="1" name="quantity" value="0">
                                            <!-- <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span> -->
                                        </div>
                                    <?php } ?>
                                </div>
                                <?php if($row['stock'] == 0){ ?>
                                    <div id="tooltipBD">
                                        <button type="submit" name="addtocart" value="5" class="btn amado-btn" disabled>Añadir al carro</button>
                                        <span id="tooltiptextBD">No se puede agregar producto si no hay stock</span>
                                    </div>
                                <?php }else if($row['stock'] > 0){ ?>
                                    <button type="submit" name="addtocart" value="5" class="btn amado-btn">Añadir al carro</button>
                                <?php } ?>
                                <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $row["id"];?>">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix mt-25">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area resolucion-img-footer">
                        <!-- Logo -->
                            <div class="avatar-footer">
                                    <div class="footer-logo">
                                        <a href="index.php"><img class="img-footer" src="img/core-img/dgtrans.png"  alt="Logo Desayunos estilo gourmet"></a>
                                    </div>
                            </div>
                            <br>
                            <br>          
                            <!-- Social Button -->
                                <a id="href-footer" target="_blank" href="https://www.instagram.com/estilo_gourmet_/?hl=es-la"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a id="href-footer" target="_blank" style="margin-left: 50px;" href="https://www.facebook.com/Regaladesayunosconestilo"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <!-- Social Button -->
                    
                    </div>
                </div>
              <!-- Single Widget Area -->
              <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                            <!-- Footer Menu -->
                            <div class="footer_menu">
                                <nav class="navbar navbar-expand-lg justify-content-end">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                    <div class="collapse navbar-collapse" id="footerNavContent">
                                        <div class="info-cliente">
                                            <p>
                                                Atención al cliente <br>
                                                Lunes a viernes 9:00 a 18:00 hrs - 
                                                Sábados 9:00 a 12:00 hrs.<br>
                                                <i class="fa fa-phone" aria-hidden="true">
                                                    <a id="href-footer" href="tel:+56930981530"> +56 9 3098 1530</a>
                                                </i>
                                                <br>
                                                <i class="fa fa-envelope" aria-hidden="true">
                                                    <a id="href-footer" href="mailto:ventas@desayunosestilogourmet.cl" target="_top">ventas@desayunosestilogourmet.cl</a>
                                                </i>
												<br>
												<i class="fa fa-envelope" aria-hidden="true">
                                                    <a id="href-footer" href="mailto:soporte@desayunosestilogourmet.cl" target="_top">soporte@desayunosestilogourmet.cl</a>
                                                </i>
                                            </p>
                                        </div>
                                    </div>
                                </nav>
                         </div>    
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <div style="background-color: #252525; text-align: center">
             <!-- Copywrite Text -->
            <span class="copywrite" style="color:gray">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a style="color:gray" href="https://colorlib.com" target="_blank">Colorlib</a>. Desarrollado por <a style="color:white" href="https://www.f1puntoexe.cl" target="_blank">F1.exe</a> 
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </span>
    </div>

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <script src="js/mas&menos.js"></script>

</body>

</html>