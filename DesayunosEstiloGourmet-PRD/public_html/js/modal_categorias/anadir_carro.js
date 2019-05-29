//funcion para formatear el precio a formato de moneda
function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}

function modal(nombre_producto, precio,id,imagen){
    Swal({
        title: '<h3 style="color:#0E9700;">Agregado al carrito!</h3>',
        html: '<table style="width:100%;">'+
                '<tr>'+
                    '<td>Producto:</td>'+
                    '<td>'+nombre_producto+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Precio:</td>'+
                    '<td>$ '+formatNumber(precio)+'</td>'+
                '</tr>'+
            '</table>'+
            '<br>'+
            '<div style="text-align:center;">'+
                '<td colspan="2"><a href="../cart.php"><button class="btn btn-primary">Revisar el carrito</button></a><td>'+
                '<hr>'+
                '<a href="javascript:void(0)" onclick="Swal.close();">o siguir comprando</a>'+
            '</div>',
        imageUrl: '/desayunosestilogourmet/img/productos/'+imagen,
        imageWidth: 200,
        imageHeight: 200,
        imageAlt: 'Producto Desayuno Estilo Gourmet',
        animation: false,
        showCloseButton: true,
        showConfirmButton: false
      });
}


//este modal se lista solo en el index, ya que las categorias estan otro directorio al momento de utilizar 
//el modal de arriba no se puede llagar a las imagenes del producto ya que no estan en la misma altura de carpetas
function modalIndex(nombre_producto, precio,id,imagen){

    //se envia el id del producto por post para agregarlo al carrito    
    $.post("../../product-details-action.php",{
        id_producto:id
    });

    // //se envia el id del producto por post para agregarlo al carrito    
    // $.post("/Proyectos/desayunosestilogourmet/product-details-action.php",{
    //     id_producto:id
    // });

    //se envia el id del producto por post para agregarlo al carrito    
    $.post("../../contador_carro.php",function(response){
        document.getElementById("cantidad_productos").innerHTML =  response;
    });


    //se envia el id del producto por post para agregarlo al carrito    
    // $.post("/Proyectos/desayunosestilogourmet/contador_carro.php",function(response){
    //     document.getElementById("cantidad_productos").innerHTML =  response;
    // });

    
   
    Swal({
        title: '<h3 style="color:#0E9700;">Agregado al carro!</h3>',
        html: '<table style="width:100%;">'+
                '<tr>'+
                    '<td>Producto:</td>'+
                    '<td>'+nombre_producto+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Precio:</td>'+
                    '<td>$ '+formatNumber(precio)+'</td>'+
                '</tr>'+
            '</table>'+
            '<br>'+
            
            '<div class="container" style="text-align:center;">'+
                '<div class="container-fluid full-width">'+
                    '<div class="row-fluid">'+

                        '<a href="javascript:void(0)" onclick="Swal.close();"><button style="display:inline-block; margin-top:5px;  width: 190px;" class="btn btn-primary">Seguir comprando</button></a>&nbsp;&nbsp;'+
                        '<a href="../../cart.php"><button style="display:inline-block; color:white; margin-top:5px;" class="btn btn-warning">Revisar el carro</button></a>'+
                        //'<a href="/Proyectos/desayunosestilogourmet/cart.php"><button style="display:inline-block; color:white; margin-top:5px;" class="btn btn-warning">Revisar el carro</button></a>'+
                        
                    '</div>'+
                '</div>'+
            '</div>'+        

                '<hr>'+
                '<a href="javascript:void(0)">Desayunos Estilo Gourmet</a>',
            
        imageUrl: '../../img/productos/'+imagen,
        //imageUrl: '/Proyectos/desayunosestilogourmet/img/productos/'+imagen,
        imageWidth: 200,
        imageHeight: 200,
        imageAlt: 'Producto Desayuno Estilo Gourmet',
        animation: false,
        showCloseButton: true,
        showConfirmButton: false
      });
}

