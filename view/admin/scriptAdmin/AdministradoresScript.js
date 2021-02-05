function actualizar(id){
  $('#modal2').modal('show');
  $('#cargarVista').load('ComentariosGeneralController.php?accion=actualizar&id=' + id);
}

function eliminar(id,idusuario,foto_url) {
 Swal.fire({
  title: '¿Estas seguro?',
  text: "Se va a eliminar a "+idusuario+" de la lista de administradores",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: '<i class="fas fa-window-close"></i>' + ' Cancelar',
  confirmButtonText: '<i class="fas fa-check-circle"></i>' + ' Si, eliminar'
  }).then((result) => {
    if (result.value) {
      var url = 'ComentariosGeneralController.php?accion=eliminar&id='+id + "&foto_url=" + foto_url;
          location.href=url;
      Swal.fire(
        'Eliminado!',
        'Se ha eliminado sastifactoriamente',
        'success'
      )
    }
  })
}

function RegistrarAdministrador(){	
  $(document).ready(function() {
    $("#formulario").validate({
      rules: {
        correo: {
          required: true,
          email: true
        },
        telefono: {
          required: true,
          number: true,
          minlength: 10,
          maxlength: 15
        },
        password: {
          required: true,
          minlength: 5,
          maxlength: 15
        },    
        password2: {
          required: true,
          minlength: 5,
          maxlength: 15,
          equalTo: "#password"
        }
      },
      messages: {
        telefono: {
          required: "<span class='text-danger py-0 my-0' style='font-size:12px;'><i class='fas fa-info-circle'></i> Es obligatorio completar este campo</span>",
          number: "<span class='text-danger py-0 my-0' style='font-size:12px;'><i class='fas fa-info-circle'></i> Es obligatorio completar usar solo numeros</span>",
          minlength: "<span class='text-danger py-0 my-0' style='font-size:12px;'><i class='fas fa-info-circle'></i> Tiene que ser de un minimo de 10 caracterres</span>",maxlength: "<span class='text-danger py-0 my-0' style='font-size:12px;display:inline;'><i class='fas fa-info-circle'></i> Tiene que ser de un maximo de 15 caracterres</span>"
        },
        correo: {
          required: "<span class='text-danger py-0 my-0' style='font-size:12px;'><i class='fas fa-info-circle'></i> Es obligatorio completar este campo</span>",
          email: "<span class='text-danger py-0 my-0' style='font-size:12px;'><i class='fas fa-info-circle'></i> Introduce un correo electronico valido</span>"
        },
        password: {
          required: "<span class='text-danger py-0 my-0' style='font-size:12px;display:inline;'><i class='fas fa-info-circle'></i> Es obligatorio completar este campo</span>",
          minlength: "<span class='text-danger py-0 my-0' style='font-size:12px;display:inline;'><i class='fas fa-info-circle'></i> Tiene que ser de un minimo de 5 caracterres</span>",
          maxlength: "<span class='text-danger py-0 my-0' style='font-size:12px;display:inline;'><i class='fas fa-info-circle'></i> Tiene que ser de un maximo de 15 caracterres</span>"
        },
        password2: {
          required: "<span class='text-danger py-0 my-0' style='font-size:12px;padding:0px;,margin:0px;'><i class='fas fa-info-circle'></i> Es obligatorio completar este campo</span>",
          minlength: "<span class='text-danger py-0 my-0' style='font-size:12px;'><i class='fas fa-info-circle'></i> Tiene que ser de un minimo de 5 caracterres</span>",
          maxlength: "<span class='text-danger py-0 my-0' style='font-size:12px;display:inline;'><i class='fas fa-info-circle'></i> Tiene que ser de un maximo de 15 caracterres</span>",
          equalTo: "<span class='text-danger py-0 my-0' style='font-size:12px;'><i class='fas fa-info-circle'></i> Las contraseñas no son iguales</span>"
        }
      }
    });
  });

  $.post('AdministradoresController.php','&'+$("#formulario").serialize(),function(respuesta){
    if (respuesta=="completado"){
      window.location.href="AdministradoresController.php?accion=mostrar";
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