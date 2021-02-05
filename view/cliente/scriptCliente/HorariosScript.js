function eliminar(id,idusuario) {
    Swal.fire({
     title: '¿'+idusuario+' estas seguro?',
     text: "Quieres cancelar tu cita",
     icon: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     cancelButtonText:'<i class="fas fa-window-close"></i>' + ' Cancelar',
     confirmButtonText: '<i class="fas fa-check-circle"></i>' + ' Si, eliminar'
     }).then((result) => {
       if (result.value) {
         var url = 'HorariosController.php?accion=eliminar&id='+id;
             location.href=url;
         Swal.fire(
           'Cancelado!',
           'Se ha cancelado sastifactoriamente',
           'success'
         )
       }
     })
   }

function RegistrarCita(){	
    $(document).ready(function() {
      $("#cita").validate({
        rules: {
          servicio: {
            required: true
          },
          fecha: {
            required: true
          },
          hora: {
            required: true
          },    
          empleado: {
            required: true
          }
        },
        messages: {
            servicio: {
            required: "<span class='text-danger py-0 my-0' style='font-size:12px;'><i class='fas fa-info-circle'></i> Es obligatorio completar este campo</span>"
          },
          fecha: {
            required: "<span class='text-danger py-0 my-0' style='font-size:12px;'><i class='fas fa-info-circle'></i> Es obligatorio completar este campo</span>"
          },
          hora: {
            required: "<span class='text-danger py-0 my-0' style='font-size:12px;display:inline;'><i class='fas fa-info-circle'></i> Es obligatorio completar este campo</span>"
          },
          empleado: {
            required: "<span class='text-danger py-0 my-0' style='font-size:12px;padding:0px;,margin:0px;'><i class='fas fa-info-circle'></i> Es obligatorio completar este campo</span>"
          }
        }
      });
    });
  
    $.post('HorariosController.php','&'+$("#cita").serialize(),function(respuesta){
      if (respuesta=="completado"){
        window.location.href="HorariosController.php?accion=mostrar";
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