<?php include 'includeCliente/header.php'; ?>
<title>Catalogo</title>
</head>
<body>

<!--Codigo para consumir la API de conversion--->
<?php 
  $url="https://api.cambio.today/v1/full/COP/json?key=4976|0r7CX45N0q_TicN45KFgooM1RGVP5F7J";
  $json=file_get_contents($url);
  $datos=json_decode($json, true);
  $conv=$datos['result'];
  $conver_final=$conv['conversion'][135]['rate'];
?>
<!--Fin del codigo para consumir la API--->

<!--Listado de servicios--->
<div class="container-fluid bg-light">
  <h1 class="text-justify-center titulo-home text-center" style="padding-top: 50px;">Catalogo de servicios y productos</h1>
  <h2 class="titulo-home">Servicios</h2><hr>
  <div class="row">  
    <?php foreach ($objeto as $mostrarCiclo) { ?>
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card" style="padding-bottom: 20px;">
          <img src="<?php echo $mostrarCiclo->foto_url;  ?>" class="card-img-top">
          <div class="card-body">
            <h2 class="text-center titulo-home"><?php echo $mostrarCiclo->servicio; ?></h2>
            <?php echo $mostrarCiclo->descripcion; ?><br>
            <div class="pt-4" style="font-size: 25px;">
              <center>
                <img src="../../frontend/img/iconos/cop_bandera.png" width="30" class="mb-2"><?php echo $mostrarCiclo->precio; ?> / <img src="../../frontend/img/iconos/Usd_bandera.png" width="30" class="mb-2"><?php echo $usd=$mostrarCiclo->precio*$conver_final; ?><br>
              </center>     
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<!--Fin del listado de servicios--->

<!--Listado de productos--->
<div class="container-fluid bg-light">
  <h2 class="titulo-home">Productos</h2><hr>
  <div class="row">
    <?php foreach ($productos as $mostrarCiclo) { ?>
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card" style="padding-bottom: 20px;">
          <img src="<?php echo $mostrarCiclo->foto_url;  ?>" class="card-img-top">
          <div class="card-body">
            <h2 class="text-center titulo-home"><?php echo $mostrarCiclo->producto; ?></h2>
            <?php echo $mostrarCiclo->descripcion; ?><br>
            <div class="pt-4" style="font-size: 25px;">
              <center>
                <img src="../../frontend/img/iconos/cop_bandera.png" width="30" class="mb-2"><?php echo $mostrarCiclo->precio; ?> / <img src="../../frontend/img/iconos/Usd_bandera.png" width="30" class="mb-2"><?php echo $usd=$mostrarCiclo->precio*$conver_final; ?><br>
              </center> 
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<!--Fin del listado de productos--->

<?php include 'includeCliente/footer.php'; ?>