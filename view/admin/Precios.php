<?php include 'includesAdmin/slidebar.php'; ?>
  <h1 class="text-center titulo-home"><i class="fas fa-book-open"></i> Catalogo</h1>
<!--Codigo para consumir la API de conversion--->
<?php 
  $url="https://api.cambio.today/v1/full/COP/json?key=4976|0r7CX45N0q_TicN45KFgooM1RGVP5F7J";
  $json=file_get_contents($url);
  $datos=json_decode($json, true);
  $conv=$datos['result'];
  $conver_final=$conv['conversion'][135]['rate'];
?>
<!--Fin del codigo para consumir la API--->

<div class="container-fluid bg-light">
<a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalServicio"><i class="fas fa-plus-square"></i> Agregar servicio</a>
  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalProducto"><i class="fas fa-plus-square"></i> Agregar producto</a>
  <a href="../../reportes/ProductosReporte.php" class="btn btn-info" target="_blank"><i class="fas fa-file-pdf"></i> Generar PDF producto</a>
  <a href="../../reportes/ServiciosReporte.php" class="btn btn-info" target="_blank"><i class="fas fa-file-pdf"></i> Generar PDF servicio</a>
<h2 class="titulo-home">Lista de catalogos de servicios</h2><hr>
  <?php foreach ($objeto as $mostrarCiclo) { ?>
  <div class="card bg-white my-2">
    <div class="row ">
  	  <div class="col-md-3 col-lg-3">  	
  		  <img src="<?php echo $mostrarCiclo->foto_url; ?>" class="img-fluid w-100">
  		</div>
  		<div class="col-md-9 px-3 col-lg-9">
    		<div class="card-block px-3">
    			<h4 class="titulo-home pt-4"><?php echo $mostrarCiclo->servicio; ?></h4>
          <span class="badge badge-dark mr-1">Descripcion</span><span class="card-text mt-1 pb-1"><?php echo $mostrarCiclo->descripcion; ?></span><br>
          <span class="badge badge-dark mr-1">Precio en Pesos COP</span><span><img src="../../frontend/img/iconos/cop_bandera.png" width="20" class="mt-1 pb-1"><?php echo $mostrarCiclo->precio; ?></span><br>
          <span class="badge badge-dark mr-1">Precio en Dolares USD</span><span><img src="../../frontend/img/iconos/Usd_bandera.png" width="20" class="mt-1 pb-1"><?php echo $usd=$mostrarCiclo->precio*$conver_final; ?></span><br>
    			<div class="float-right">
    			  <a href="#" class="btn btn-sm btn-danger" onclick="borrarServicio(<?php echo $mostrarCiclo->id; ?>,'<?php echo $mostrarCiclo->foto_url; ?>','<?php echo $mostrarCiclo->servicio; ?>')"><i class="fas fa-trash-alt"></i> Eliminar</a>
    			  <a href="#" class="btn btn-sm btn-warning" onclick="actualizarServicio(<?php echo $mostrarCiclo->id; ?>)"><i class="fas fa-edit"></i> Editar</a>
    			</div>
    		</div>
      </div>
    </div>
  </div>
	<?php } ?>
</div>

<div class="container-fluid py-3 bg-light">
<h2 class="titulo-home">Lista de catalogos de productos</h2><hr>
  <?php foreach ($productos as $mostrarProducto) { ?>
  <div class="card bg-white my-2">
    <div class="row ">
      <div class="col-md-3 col-lg-3">
        <img src="<?php echo $mostrarProducto->foto_url; ?>" class="w-100">
      </div>
      <div class="col-md-9 px-3 col-lg-9">
        <div class="card-block px-3">
          <h4 class="titulo-home pt-2"><?php echo $mostrarProducto->producto; ?></h4>
          <span class="badge badge-dark mr-1">Descripcion</span><span class="card-text mt-1 pb-1"><?php echo $mostrarProducto->descripcion; ?></span><br>
          <span class="badge badge-dark mr-1">Precio en Pesos COP</span><span><img src="../../frontend/img/iconos/cop_bandera.png" width="20" class="mt-1 pb-1"><?php echo $mostrarProducto->precio; ?></span><br>
          <span class="badge badge-dark mr-1">Precio en Dolares USD</span><span><img src="../../frontend/img/iconos/Usd_bandera.png" width="20" class="mt-1 pb-1"><?php echo $usd=$mostrarProducto->precio*$conver_final; ?></span><br>
          <span class="badge badge-dark mr-1">Cantidad</span><span class="card-text mt-1 pb-1"><?php echo $mostrarProducto->cantidad; ?></span><br>
          <div class="float-right">
            <a href="#" class="btn btn-sm btn-danger" onclick="borrarProducto(<?php echo $mostrarProducto->id; ?>,'<?php echo $mostrarProducto->foto; ?>','<?php echo $mostrarProducto->producto; ?>')"><i class="fas fa-trash-alt"></i> Eliminar</a>
            <a href="#" class="btn btn-sm btn-warning" onclick="editarProducto(<?php echo $mostrarProducto->id; ?>)"><i class="fas fa-edit"></i> Editar</a>
          </div>         
        </div>
      </div>
    </div>
  </div>
	<?php } ?>
</div>

<div class="container">
  <div class="row">
    <div class="col"> 
      <div class="modal fade" id="modalServicio">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title titulo-home">Insetar un nuevo servicio</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form action="PreciosController.php" method="POST" enctype="multipart/form-data">
              <div class="col-lg-12">
                <div class="modal-body mx-0 px-0">
                  <div class="form-group">
                    <input type="hidden" name="accion" value="insertar">
                    <input type="text" name="servicio" placeholder="Ingrese su servicio" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="text" name="descripcion" placeholder="Ingrese una descripcion" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="number" name="precio" placeholder="Ingrese el precio" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="file" name="imagen" class="form-control-file" accept=".jpg , .png , .gif">
                  </div>
                </div>
                <center>
                  <button class="btn btn-success"><i class="fas fa-calendar-check"></i> Registrar</button>
                </center><br>
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
      <div class="modal fade" id="modalProducto">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title titulo-home">Insetar un nuevo producto</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form action="PreciosController.php" method="POST" enctype="multipart/form-data">
              <div class="col-lg-12">
                <div class="modal-body mx-0 px-0">
                  <div class="form-group">
                    <input type="hidden" name="accion" value="insertarProducto">
                    <input type="text" name="producto" placeholder="Ingrese su producto" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="text" name="descripcion" placeholder="Ingrese una descripcion" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="number" name="precio" placeholder="Ingrese el precio" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="number" name="cantidad" placeholder="Ingrese el cantidad" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="file" name="imagen" accept=".jpg , .png , .gif">
                  </div>
                </div>
                <center>
                 <button class="btn btn-success"><i class="fas fa-calendar-check"></i> Registrar</button>
                </center><br>
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
      <div class="modal fade" id="modalEditar">
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
      <div class="modal fade" id="modalEditarProducto">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="col-lg-12" id="cargarVistaProducto"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include 'includesAdmin/footer.php'; ?>

<script type="text/javascript">
function actualizarServicio(id){
  $('#modalEditar').modal('show');
  $('#cargarVista').load('PreciosController.php?accion=editar&id=' + id);
}

function borrarServicio(id,foto_url,servicio) {
 Swal.fire({
  title: '¿Estas seguro?',
  text: "Quieres eliminar " +servicio+ " de los servicios",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Cancelar',
  confirmButtonText: 'Si, eliminar'
  }).then((result) => {
    if (result.value) {
      var url = 'PreciosController.php?accion=borrar&id='+id + "&foto_url=" + foto_url;
          location.href=url;
      Swal.fire(
        'Eliminado!',
        'Se ha eliminado sastifactoriamente',
        'success'
      )
    }
  })
}

function editarProducto(id){
  $('#modalEditarProducto').modal('show');
  $('#cargarVistaProducto').load('PreciosController.php?accion=editarProducto&id=' + id);
}

function borrarProducto(id,foto_url,producto) {
 Swal.fire({
  title: '¿Estas seguro?',
  text: "Quieres eliminar " +producto+ " de los productos",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Cancelar',
  confirmButtonText: 'Si, eliminar'
  }).then((result) => {
    if (result.value) {
      var url = 'PreciosController.php?accion=borrarProducto&id='+id + "&foto_url=" + foto_url;
          location.href=url;
      Swal.fire(
        'Eliminado!',
        'Se ha eliminado sastifactoriamente',
        'success'
      )
    }
  })
}
</script>