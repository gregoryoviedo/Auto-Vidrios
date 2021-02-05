<?php include 'includeEmpleado/header.php'; ?>
<title>Pedidos</title>
</head>
<body class="bg-light">
<!-------Aqui es el unicio de el listados de los clientes registrados-------->
<h1 class="text-center titulo-home pt-5">  Lista de Pedidos</h1>

<div class="container-fluid">
  <div class="py-2">
    <a href="../../reportes/PedidosReporte.php" class="btn btn-info" target="_blank"><i class="fas fa-file-pdf"></i> Generar PDF</a>
  </div>
  <div class="row">
    <!--Recorrido con php de cada ADMINISTRADOR del sistema-->
    <?php
    foreach ($objetoPedido as $mostrarCiclo) { ?>

      <div class="col-lg-3 col-md-2 col-sm-12">
        <div class="card">
          <div class="card-body">
            <center>
              <img src="<?php echo $mostrarCiclo->foto_url;  ?>" class="img-fluid rounded-circle w-50">
            </center>
            <h1 class="text-center titulo-home"><?php echo $mostrarCiclo->idusuario; ?></h1>
            <p>
              <p class="badge badge-dark">Producto:</p>
              <?php echo $mostrarCiclo->producto; ?><br>
              <p class="badge badge-dark">cantidad:</p>
              <?php echo $mostrarCiclo->cantidad; ?><br>
              <p class="badge badge-dark">total:</p>
              <?php echo $mostrarCiclo->total; ?><br>
              <p class="badge badge-dark">busqueda:</p>
              <?php echo $mostrarCiclo->busqueda; ?><br>
              <p class="badge badge-dark">solicitado:</p>
              <?php echo $mostrarCiclo->solicitado; ?><br>
            </p>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php include 'includeEmpleado/footer.php'; ?>
