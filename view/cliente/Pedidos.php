<?php include 'includeCliente/header.php'; ?>
<title>Pedidos</title>
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

<div class="container-fluid bg-light py-2">
  <h2 class="titulo-home pt-5">Productos</h2>
  <a href="#" class="btn btn-sm btn-info" onclick="Listado();">Mis Pedidos</a><hr>
  <div class="row">
     <?php foreach ($productoObjeto as $mostrarCiclo) { ?>
      <div class="col-lg-3 col-md-2 col-sm-12">
        <div class="card" style="padding-bottom: 20px;">
          <img src="<?php echo $mostrarCiclo->foto_url;  ?>" class="card-img-top">
          <div class="card-body">
            <div class="badge badge-danger" style="position: absolute;margin-top:-40px;font-size:30px;margin-left:79%;"><?php echo $mostrarCiclo->cantidad; ?></div>
            <h1 class="text-center titulo-home"><?php echo $mostrarCiclo->producto; ?></h1>
            <p>
              <?php echo $mostrarCiclo->descripcion; ?><br>
              <center>
                <img src="../../frontend/img/iconos/cop_bandera.png" width="30" class="mb-2"><?php echo $mostrarCiclo->precio; ?> / <img src="../../frontend/img/iconos/Usd_bandera.png" width="30" class="mb-2"><?php echo $usd=$mostrarCiclo->precio*$conver_final; ?><br>
              </center> 
            </p>
          </div>
          <button class="btn btn-success" onclick="solicitar(<?php echo $mostrarCiclo->id;?>)"><i class="fas fa-plus-square"></i> Agregar</button>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="modal fade" id="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="col-lg-12" id="cargarVista"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="modal fade" id="modalListado">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title titulo-home">Mis Pedidos</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>  
              <div class="modal-body mx-0 px-0">
                <div class="col-lg-12" id="cargarListado"></div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'includeCliente/footer.php'; ?>
<script src="../../view/cliente/scriptCliente/PedidosScript.js"></script>