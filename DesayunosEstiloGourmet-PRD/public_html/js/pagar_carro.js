jQuery("#btn_enviar").click(function() {
  
    var nombre = document.getElementById("nombre_cliente").value;
    var correo = document.getElementById("correo_cliente").value;
    var comuna = document.getElementById("comuna").value;
    var direccion_delivery = document.getElementById("direccion_delivery").value;
    var fecha_delivery = document.getElementById("fecha_delivery").value;
    var mensaje = document.getElementById("mensaje").value;

    //validacion de fecha de delivery
    let today = new Date().toISOString().slice(0, 10);
    var fecha_validacion = new Date(today);
    fecha_validacion.setDate(fecha_validacion.getDate() + 2);


    if (nombre === "") {
        MensajeAlerta("El campo <label style='color:red'><strong>Nombre completo</strong></label> es obligatorio");
        return false;
    }

    if(!isSpace(nombre)){
        MensajeAlerta("Debe ingresar <label style='color:red'><strong>Nombre y Apellido</strong></label> separado por un espacio");
        return false;
    }

    if(correo === ""){
        MensajeAlerta("El campo <label style='color:red'><strong>Correo Electrónico</strong></label> es obligatorio");
        return false;
    }

    if(!isValidEmail(correo)){
        MensajeAlerta("El campo <label style='color:red'><strong>Correo Electrónico</strong></label> no es valido");
        return false;
    }

    if(comuna === "0"){
        MensajeAlerta("Debes seleccionar <label style='color:red'><strong>la comuna</strong></label> del delivery");
        return false;
    }

    if(direccion_delivery === ""){
        MensajeAlerta("La <label style='color:red'><strong>dirección del delivery</strong></label> es obligatoria");
        return false;
    }

    if(fecha_delivery === ""){
        MensajeAlerta("La <label style='color:red'><strong>fecha del delivery</strong></label> es obligatoria");
        return false;
    }

    if(fecha_delivery  >= fecha_validacion.toISOString().slice(0, 10)){
        
    }else{
        MensajeAlerta("Fecha <label style='color:red'><strong>no válida</strong></label> para delivery");
        return false;
    }

    if(mensaje === ""){
        MensajeAlerta("El <label style='color:red'><strong>mensaje</strong></label> es obligatorio");
        return false;
    }

    if(mensaje.length > 254){
        MensajeAlerta("El mensaje <label style='color:red'><strong>no puede tener mas de 255</strong></label> carácteres");
        return false;
    }

    /*dataForm.append('nombre', nombre);
    dataForm.append('correo', correo);
    dataForm.append('telefono', telefono);
    dataForm.append('cargo', cargo);
    dataForm.append('mensaje', mensaje);
    dataForm.append('name1', files_2[0].name);
    dataForm.append('name2', files_2[1].name);
    dataForm.append('recaptcha', recaptcha);

    jQuery.ajax({
        url: 'tcn_action.php',
        type: 'POST',
        data: dataForm,
        success: function (data) {
            if(data === "Se ha completado la postulación correctamente"){
                MensajeFinal(data+", Espere mientras es direccionado a la pagina principal");
                setTimeout(function nada() {
                    window.location.replace("index.php");
                  }, 2500);
            }
            
        },
        cache: false,
        contentType: false,
        processData: false
    });*/
});

function MensajeFinal(msg) {
    Swal.fire({
        position: "top",
        type: "success",
        html: msg,
        showConfirmButton: false,
        timer: 1500
    });
}

function MensajeError(msg) {
    Swal.fire({
        type: "error",
        title: "Upss...",
        html: msg
    });
}

function MensajeAlerta(msg) {
    Swal.fire({
        title: "Debe corregir lo siguiente",
        type: "info",
        html: msg,
        animation: false,
        customClass: "animated tada"
    })
}

function isValidEmail(correo) {
    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(correo);
}

function isSpace(variable){
    return /^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/.test(variable);
}

function isNumber(variable){
    return /^\d{9}$/.test(variable);
}