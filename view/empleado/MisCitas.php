<?php include 'includeEmpleado/header.php'; ?>
<title>Mis citas</title>
</head>
<body class="bg-light">


<div class="container-fluid">
    <h1 class="pt-5 text-center titulo-home">Mis citas</h1>	
    <div class="row">
    <?php foreach ($citaObjeto as $miCita) { ?>
        <div class="col-lg-2 py-3">
            <div class="card">
                <div class="card-header">
                <p><?php echo $miCita->id; ?></p>	
                </div>
                <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p><?php echo $miCita->idusuario; ?></p>
                    <p><?php echo $miCita->servicio; ?></p>
                    <p><?php echo $miCita->fecha; ?></p>
                    <p><?php echo $miCita->hora; ?></p>
                </blockquote>
                <center class="pt-1">
                    <button class="btn btn-danger" onclick="eliminar(<?php echo $miCita->id; ?>,'<?php echo $miCita->idusuario; ?>');">Cancelar Cita</button>
                </center>
                </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include 'includeEmpleado/footer.php'; ?>
<script type="text/javascript">
function eliminar(id,idusuario) {
 Swal.fire({
  title: '¿estas seguro?',
  text: "Quieres cancelar tu cita con " + idusuario,
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText:'<i class="fas fa-window-close"></i>' + ' Cancelar',
  confirmButtonText: '<i class="fas fa-check-circle"></i>' + ' Si, eliminar'
  }).then((result) => {
    if (result.value) {
      var url = 'MisCitasController.php?accion=eliminar&id='+id;
          location.href=url;
      Swal.fire(
        'Cancelado!',
        'Se ha cancelado sastifactoriamente',
        'success'
      )
    }
  })
}
</script>