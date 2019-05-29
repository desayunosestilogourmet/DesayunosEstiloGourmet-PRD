function mas(stock){
    var valor = document.getElementById('qty').value;

    if(valor < stock){
        suma = parseInt(valor)+1;
        document.getElementById('qty').value = suma;
        //alert("Se suma por que el valor es menor o igual a estock "+suma);
    }else{
        MensajeAlerta("<label style='color:red'><strong>No se puede </strong></label> agregar más de "+stock+" productos");
    }

}

function menos(stock){
    var valor = document.getElementById('qty').value;

    if(valor > 1){
        if(valor <= stock){
            suma = parseInt(valor)-1;
            document.getElementById('qty').value = suma;
            //alert("Se suma por que el valor es menor o igual a estock "+suma);
        }else{
            // alert("no se puede quitar mas ");
        }
    }else{
        MensajeAlerta("La cantidad mínima de productos a agregar <label style='color:red'><strong>debe ser</strong></label> al menos 1");
        // alert("El valor debe ser mayor que 1 para quitar productos");
    }
    
}

// function formatNumber(num) {
//     return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
// }

function masCart(stock, id_p, id){
    
    
    var valor = document.getElementById('qty_'+id).value;
    var precio = document.getElementById('precio_'+id).value;
    var monto = document.getElementById('monto_total').value;
    

    if(valor < stock){
        suma = parseInt(valor)+1;
        total = parseInt(monto) + parseInt(precio);
        document.getElementById('qty_'+id).value = suma;
        document.getElementById('ee').innerHTML = "$ "+Intl.NumberFormat().format(total);
        document.getElementById('monto_total').value = total;
        // console.log(Intl.NumberFormat().format(total));

        $.post("actualizarCantidad.php", {
            id_producto: id_p,
            cantidad: suma
        })
    }else{
        MensajeAlerta("<label style='color:red'><strong>No se puede </strong></label> agregar más de "+stock+" productos");
    }

}

function menosCart(stock, id_p, id){
    var valor = document.getElementById('qty_'+id).value;
    var precio = document.getElementById('precio_'+id).value;
    var monto = document.getElementById('monto_total').value;


    if(valor > 1){
        if(valor <= stock){
            resta = parseInt(valor)-1;
            total = parseInt(monto) - parseInt(precio);
            document.getElementById('qty_'+id).value = resta;
            document.getElementById('ee').innerHTML = "$ "+Intl.NumberFormat().format(total);
            document.getElementById('monto_total').value = total;

            
            $.post("actualizarCantidad.php", {
                id_producto: id_p,
                cantidad: resta
            })
        }else{
            MensajeAlerta("La cantidad agregada <label style='color:red'><strong>supera el máximo de stock ["+stock+"]</strong></label>, la cantidad de productos se igualará al stock máximo");
            // alert("No puede llevas mas de "+stock+" productos");
            document.getElementById('qty_'+id).value = stock;
            total = (monto - (parseInt(valor) * parseInt(precio))) + (parseInt(stock) * parseInt(precio));
            document.getElementById('ee').innerHTML = "$ "+Intl.NumberFormat().format(total);
            document.getElementById('monto_total').value = total;
        }
    }else{
        MensajeAlerta("La cantidad mínima de productos a agregar <label style='color:red'><strong>debe ser</strong></label> al menos 1");
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