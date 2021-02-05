function RegistrarMensaje(){	
  $(document).ready(function() {
    $("#formulario").validate({
      rules: {
        nombre: {
          required: true,
          minlength: 3
        },
        correo: {
          required: true,
          email: true
        },
        asunto: {
          required: true,
          minlength: 5
        },    
        mensaje: {
          required: true,
          minlength: 10
        }
      },
      messages: {
        nombre: {
          required: "<p class='text-danger pt-0 mt-0' style='font-size:13px;'><i class='fas fa-info-circle'></i> Es obligatorio rellenar este campo</p>",
          minlength: "<p class='text-danger pt-0 mt-0'><i class='fas fa-info-circle'></i> Tiene que ser de un minimo de 3 caracterres</p>"
        },
        correo: {
          required: "<p class='text-danger pt-0 mt-0' style='font-size:13px;'><i class='fas fa-info-circle'></i> Es obligatorio rellenar este campo</p>",
          email: "<p class='text-danger pt-0 mt-0' style='font-size:13px;'><i class='fas fa-info-circle'></i> Introduce un correo electronico valido</p>"
        },
        asunto: {
          required: "<p class='text-danger pt-0 mt-0' style='font-size:13px;'><i class='fas fa-info-circle'></i> Es obligatorio rellenar este campo</p>",
          minlength: "<p class='text-danger pt-0 mt-0' style='font-size:13px;'><i class='fas fa-info-circle'></i> Tiene que ser de un minimo de 5 caracterres</p>"
        },      
        mensaje: {
          required: "<p class='text-danger pt-0 mt-0' style='font-size:13px;'><i class='fas fa-info-circle'></i> Es obligatorio rellenar este campo</p>",
          minlength: "<p class='text-danger pt-0 mt-0' style='font-size:13px;'><i class='fas fa-info-circle'></i> Tiene que ser de un minimo de 10 caracterres</p>"
        }
      }
    });
  });

  $.post('ContactanosController.php','&'+$("#formulario").serialize(),function(respuesta){
     if (respuesta=="completado")
     window.location.href = "ContactanosController.php?accion=mostrar";	
       else
        Swal.fire({
          position: 'top',
          icon: 'error',
          title: (respuesta),
          showConfirmButton: false,
          timer: 1500
        })
       });			   
}