jQuery("#agregar").click(function (e) {
    e.preventDefault();
    //var formData = new FormData(this);
    var nombre = document.getElementById("nombre").value;
    var precio = document.getElementById("precio").value;
    var stock = document.getElementById("stock").value;
    var inputState = document.getElementById("inputState");
    var categoria = inputState.options[inputState.selectedIndex].value;
    var detalle = document.getElementById("detalle").value;
    var dataForm = new FormData();

    var customFileLang = document.getElementById("nameImagen");
    var files_2 = customFileLang.files;

    //alert("Nombre => "+nombre+" - Precio => "+precio+" - Stock => "+stock+" - Categoria => "+categoria+" - Detalle => "+detalle+" - IMG => "+customFileLang.files[0].name+" - Largo => "+files_2.length);
  
    if (nombre === "") {
        MensajeAlerta("El campo <label style='color:red'><strong>Nombre del Producto</strong></label> es obligatorio");
        return false;
    }

    if(nombre.length > 255){
        MensajeAlerta("El campo <label style='color:red'><strong>Nombre del Producto</strong></label> ha superado el largo maximo<br> este tiene un largo de "+nombre.length+" y debe tener como maximo 255");
        return false;
    }

    if(precio === ""){
        MensajeAlerta("El campo <label style='color:red'><strong>Precio</strong></label> es obligatorio");
        return false;
    }

    if(precio < 1){
        MensajeAlerta("El valor del campo <label style='color:red'><strong>Precio</strong></label> debe ser mayor que 0");
        return false;
    }

    if(isNaN(precio)){
        MensajeAlerta("El campo <label style='color:red'><strong>Precio</strong></label> es de tipo numerico");
        return false;
    }

    if(stock === ""){
        MensajeAlerta("El campo <label style='color:red'><strong>Stock</strong></label> es obligatorio");
        return false;
    }

    if(isNaN(stock)){
        MensajeAlerta("El campo <label style='color:red'><strong>Stock</strong></label> es de tipo numerico");
        return false;
    }

    if(stock < 1){
        MensajeAlerta("El valor del campo <label style='color:red'><strong>Stock</strong></label> debe ser mayor que 0");
        return false;
    }

    if(categoria == 0){
        MensajeAlerta("Debe seleccionar una categoria distinta de <label style='color:red'><strong>Seleccione una Categoria</strong></label>");
        return false;
    }

    if(files_2.length == 1){
        for (i = 0; i < files_2.length; i++) {
            if (/\.(jpg|jpeg)$/i.test(customFileLang.files[i].name)) {
                dataForm.append('archivo' + i, files_2[i]);
            } else {
                MensajeError("El archivos no contiene el formato correcto, los formatos permitidos son : <br> <label style='color:red'><strong>[ .JPG / .JPEG ]</strong></label>");
                return false;
            }
        }
    }else{
        MensajeError("Debe subir dolo 1 archivo, usted esta subiendo " + files_2.length + " archivos");
        return false;
    }

    if(detalle === ""){
        MensajeAlerta("El campo <label style='color:red'><strong>Detalles</strong></label> es obligatorio");
        return false;
    }

    if(detalle.length > 500){
        MensajeAlerta("El campo <label style='color:red'><strong>Detalle del Producto</strong></label> ha superado el largo maximo<br> este tiene un largo de "+detalle.length+" y debe tener como maximo 500");
        return false;
    }

    dataForm.append('nombre', nombre);
    dataForm.append('precio', precio);
    dataForm.append('stock', stock);
    dataForm.append('categoria', categoria);
    dataForm.append('detalle', detalle);
    dataForm.append('nameImagen', files_2[0].name);

    jQuery.ajax({
        url: 'agregarProducto_action.php',
        type: 'POST',
        data: dataForm,
        success: function (data) {
            if(data === "Se ha agregado el producto correctamente"){
                MensajeFinal(data+", Espere mientras es direccionado a la pagina principal");
                setTimeout(function nada() {
                    window.location.replace("listarProductos.php");
                  }, 2500);
            }else{
                MensajeAlerta(data+", Ha ocurrido un error");
            }
            
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

function MensajeFinal(msg) {
    Swal.fire({
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