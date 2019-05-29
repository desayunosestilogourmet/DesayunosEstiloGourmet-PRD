//funcion para eliminar producto del carro
$('.btn').click(function(){

    var id_producto = $(this).attr('data-id');
    $(this).parentsUntil('.table-content').remove();
    $.post("eliminar_producto.php",{
        Id:id_producto
    },function(response){

        if(response == '0'){
            
            
            
            
        }

    });

});