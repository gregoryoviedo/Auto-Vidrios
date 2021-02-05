function solicitar(id){
    $('#modal').modal('show');
    $('#cargarVista').load('PedidosController.php?accion=pedir&id=' + id);
}

function Listado(){
    $('#modalListado').modal('show');
    $('#cargarListado').load('PedidosController.php?accion=listado');
}

function eliminar(id,cantidad,cantidad_original,id_producto) {
    Swal.fire({
    title: '¿Estas seguro?',
    text: "Se va a cancelar su pedido",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: '<i class="fas fa-window-close"></i>' + ' Cancelar',
    confirmButtonText: '<i class="fas fa-check-circle"></i>' + ' Si, eliminar'
    }).then((result) => {
    if (result.value) {
        var url = 'PedidosController.php?accion=eliminar&id='+id + "&cantidad=" + cantidad + '&cantidad_original=' + cantidad_original + '&id_producto=' + id_producto;
            location.href=url;
        Swal.fire(
        'Eliminado!',
        'Se ha eliminado sastifactoriamente',
        'success'
        )
    }
    })
}

function RegistrarPedido(){	
    $(document).ready(function() {
      $("#pedido").validate({
        rules: {
          cantidad: {
            required: true,
            number: true
          },
          busqueda: {
            required: true
          }
        },
        messages: {
            busqueda: {
                required: "<span class='text-danger py-0 my-0' style='font-size:12px;padding:0px;,margin:0px;'><i class='fas fa-info-circle'></i> Es obligatorio completar este campo</span>",
                },
            cantidad : {
                required: "<span class='text-danger py-0 my-0' style='font-size:12px;'><i class='fas fa-info-circle'></i> Es obligatorio completar este campo</span>",
                number: "<span class='text-danger py-0 my-0' style='font-size:12px;'><i class='fas fa-info-circle'></i> Es obligatorio completar usar solo numeros</span>"
            }
        }
      });
    });
  
    $.post('PedidosController.php','&'+$("#pedido").serialize(),function(respuesta){
      if (respuesta=="completado"){
        window.location.href="PedidosController.php?accion=mostrar";
      }else{
        Swal.fire({
          position: 'top',
          icon: 'error',
          title: (respuesta),
          showConfirmButton: false,
          timer: 1500
        })
      }
    });			   
}