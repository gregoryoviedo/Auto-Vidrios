<?php include 'includeCliente/header.php'; ?>
<title>Perfil</title>
</head>
<body>

<div class="container-fluid py-5 px-5 bg-light">	
  <div class="card bg-white py-3">
  	<h2 class="titulo-home text-center">Informacion personal</h2>
    <div class="row ">
	<?php foreach ($objetoRetornado as $mostrarCiclo) { ?>
	  <div class="col-md-3 col-lg-3">
		<img src="<?php echo $mostrarCiclo->foto_url; ?>" class="img-fluid rounded-circle w-100">
		</div>
		<div class="col-md-9 px-3 col-lg-9">
		<div class="card-block px-3">
			<h2 class="card-title"><?php echo $mostrarCiclo->idusuario; ?></h2>
			<div class="input-group py-3">
			    <div class="input-group-prepend">
			      <div class="input-group-text titulo-home" id="btnGroupAddon2">Cedula</div>
			    </div>
			    <p class="card-text form-control"><?php echo $mostrarCiclo->cedula; ?></p>
			</div>
			<div class="input-group py-3">
			    <div class="input-group-prepend">
			      <div class="input-group-text titulo-home" id="btnGroupAddon2">Nombre</div>
			    </div>
			    <p class="card-text form-control"><?php echo $mostrarCiclo->nombre; ?></p>
			</div>
			<div class="input-group py-3">
			    <div class="input-group-prepend">
			      <div class="input-group-text titulo-home" id="btnGroupAddon2">Apellido</div>
			    </div>
			    <p class="card-text form-control"><?php echo $mostrarCiclo->apellido; ?></p>
			</div>
			<div class="input-group py-3">
			    <div class="input-group-prepend">
			      <div class="input-group-text titulo-home" id="btnGroupAddon2">Correo</div>
			    </div>
			    <p class="card-text form-control"><?php echo $mostrarCiclo->correo; ?></p>
			</div>
			<div class="input-group py-3">
			    <div class="input-group-prepend">
			      <div class="input-group-text titulo-home" id="btnGroupAddon2">Telefono</div>
			    </div>
			    <p class="card-text form-control"><?php echo $mostrarCiclo->telefono; ?></p>
			</div>
			<div class="input-group py-3">
			    <div class="input-group-prepend">
			      <div class="input-group-text titulo-home" id="btnGroupAddon2">fecha</div>
			    </div>
			    <p class="card-text form-control"><?php echo $mostrarCiclo->day." de ".$mostrarCiclo->month." de ".$mostrarCiclo->year; ?></p>
			</div>
			<div class="input-group py-3">
			    <div class="input-group-prepend">
			      <div class="input-group-text titulo-home" id="btnGroupAddon2">Sexo</div>
			    </div>
			    <p class="card-text form-control"><?php echo $mostrarCiclo->sexo; ?></p>
			</div>
			<div class="float-right">
				<a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal">Cambiar contraseña</a>
				<a href="#" class="btn btn-sm btn-warning" onclick="actualizar(<?php echo $mostrarCiclo->id; ?>)">Editar</a>
			</div>
		</div>
	  </div>
	  <?php } ?>
    </div>
  </div>
</div>

<!---Modal encargada de carga la VISTA de editar segun el id--->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="modal fade" id="modal2">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title titulo-home">Editar perfil</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
			<form role="form" action="PerfilController.php" method="POST" enctype="multipart/form-data">
				<div class="modal-body mx-0 px-0">
					<div class="col-lg-12" id="cargarVista"></div>
				</div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  

<div class="container">
  <div class="row">
    <div class="col">
      <div class="modal fade" id="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title">Cambiar contraseña</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form role="form" action="PerfilController.php" method="POST" enctype="multipart/form-data">
              <div class="col-lg-12">
              	<?php foreach ($objetoRetornado as $mostrarCiclo) {} ?>
              	<div class="form-group">
              		<label>Actual contraseña</label>
              		<input type="hidden" name="accion" value="canbio">
  					<input type="text" name="antigua" class="form-control">
              	</div>
              	<div class="form-group">
              		<label>Nueva contraseña</label>
  					<input type="text" name="nueva" class="form-control">
              	</div>
              	<div class="form-group">
              		<label>Confirmar contraseña</label>
  					<input type="text" name="nueva2" class="form-control">
              	</div>
              </div>
              <center>
              	<button type="submit" class="btn btn-success">Cambiar</button>
              </center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  

<?php include 'includeCliente/footer.php'; ?>

<script>
function actualizar(id){
      $('#modal2').modal('show');
      $('#cargarVista').load('PerfilController.php?accion=actualizar&id=' + id);
  }

</script>