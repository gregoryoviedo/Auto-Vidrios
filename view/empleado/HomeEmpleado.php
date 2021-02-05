<?php include 'includeEmpleado/header.php'; ?>
<title>Inicio</title>
</head>
<body class="bg-light">

<div class="container pt-5">
	<div class="row">
	<?php foreach ($objetoRetornado as $mostrarCiclo) { ?>
      <div class="col-lg-4 col-md-2 col-sm-12">
        <div class="card">
          <div class="card-body">
            <center>
              <img src="<?php echo $mostrarCiclo->foto_url;  ?>" class="img-fluid rounded-circle w-50">
            </center>
            <h1 class="text-center"><?php echo $mostrarCiclo->idusuario; ?></h1>
            <p>
              <p class="badge badge-dark">Cedula V-</p>
              <?php echo $mostrarCiclo->cedula; ?><br>
              <p class="badge badge-dark">Nombre:</p>
              <?php echo $mostrarCiclo->nombre; ?><br>
              <p class="badge badge-dark">Apellido:</p>
              <?php echo $mostrarCiclo->apellido; ?><br>
              <p class="badge badge-dark">Nro de telefono:</p>
              <?php echo $mostrarCiclo->telefono; ?><br>
              <p class="badge badge-dark">CorreoF:</p>
              <?php echo $mostrarCiclo->correo; ?><br>
            </p>
          </div>
        </div>
      </div>

<?php } ?>
</div>
</div>


<?php include 'includeEmpleado/footer.php'; ?>