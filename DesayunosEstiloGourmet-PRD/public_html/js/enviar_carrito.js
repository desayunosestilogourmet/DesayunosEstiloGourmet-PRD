//funcion que ejecuta el submit 
function enviarFormulario(){
    
    if($('input[name="terms"]').is(":checked")){
        jQuery.ajax({
            url: 'validar_stock_carrito.php',
            type: 'POST',
            success: function(data){
                if(data == '0'){
                    document.getElementById('form_cart').submit();
                    return true;
                }else{
                    MensajeAlerta(data);
                    return false;
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });

        
       
    }else{
        MensajeAlerta('Debe aceptar los Términos y condiciones para poder continuar');
        return false;
    } 
}

function MensajeAlerta(msg) {
    Swal.fire({
        title: "Atención",
        type: "info",
        html: msg,
        animation: false,
        customClass: "animated tada"
    })
}


