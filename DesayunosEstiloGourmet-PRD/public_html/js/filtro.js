function filtro(valor){
    var filtro = $(valor).data('value');
    var location = $(valor).data('location');
    var pagina = $(valor).data('pagina');;
    
    var dataForm = new FormData();
    dataForm.append('filtro', filtro);
    dataForm.append('location', location);

    jQuery.ajax({
        url: '../filtro.php',
        type: 'POST',
        data: dataForm,
        success: function (data) {
            if(data === "ok"){

                if(pagina > 0){
                    window.location.replace(location+'?page='+pagina);
                }else{
                    window.location.replace(location);
                }
            }
            
        },
        cache: false,
        contentType: false,
        processData: false
    })
}