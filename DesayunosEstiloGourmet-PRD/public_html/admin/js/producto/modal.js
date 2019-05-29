function modal(mensaje, titulo){
    Swal({
        title: '<h1 style="color:blue;">'+titulo+'</h1>',
        html: mensaje,
        imageUrl: '../img/core-img/logo_deg.png',
        imageWidth: 400,
        imageHeight: 200,
        imageAlt: 'Custom image',
        animation: false
      });
}

function modalEliminar(id){
  Swal.fire({
    title: '¿Estás seguro que deseas eliminar este producto?',
    text: "¡Atención, una vez eliminado el producto, no se podrá recuperar!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, deseo eliminar el producto',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    
    if (result.value) {
      var dataForm = new FormData();
      dataForm.append('idDel', id);
      jQuery.ajax({
        url: 'eliminarProducto_action.php',
        type: 'POST',
        data: dataForm,
        success: function (data) {
            if(data === "Se ha eliminado el producto correctamente"){
              Swal.fire(
                '¡Eliminado!',
                data+', Espere mientras se actualiza la pagina',
                'success'
              )
                
              setTimeout(function nada() {
                window.location.replace("listarProductos.php");
              }, 2500);
            }else{
              Swal.fire(
                '¡Eliminado!',
                'Ha ocurrido un error, '+data,
                'error'
              )
            }
            
        },
        cache: false,
        contentType: false,
        processData: false
      });
      // Swal.fire(
      //   '¡Eliminado!',
      //   'El producto se ha eliminado correctamente',
      //   'success'
      // )
    }
  });
}