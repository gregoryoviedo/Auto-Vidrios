<?php foreach ($productoModal as $mostrarCiclo) {} ?>
<!--Codigo para consumir la API de conversion--->
<?php 
  $url="https://api.cambio.today/v1/full/COP/json?key=4976|0r7CX45N0q_TicN45KFgooM1RGVP5F7J";
  $json=file_get_contents($url);
  $datos=json_decode($json, true);
  $conv=$datos['result'];
  $conver_final=$conv['conversion'][135]['rate'];
?>
<!--Fin del codigo para consumir la API--->
<div class="modal-header">
  <h2 class="modal-title titulo-home"><?php echo $mostrarCiclo->producto; ?></h2>
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<form role="form" method="POST" enctype="multipart/form-data" id="pedido"  onsubmit="RegistrarPedido(); return false">        
  <div class="modal-body mx-0 px-0">
    <div class="form-group">
      <input type="hidden" name="accion" value="agregar">
      <input type="hidden" name="id" value="<?php echo $mostrarCiclo->id; ?>">
      <input type="hidden" name="precio" value="<?php echo $mostrarCiclo->precio; ?>">
      <input type="hidden" name="producto" value="<?php echo $mostrarCiclo->producto; ?>">
      <input type="hidden" name="cantidad_original" value="<?php echo $mostrarCiclo->cantidad; ?>">
      <input  name="busqueda" type="date" class="form-control" min="<?php echo date('Y-m-d'); ?>" id="busqueda">
    </div>
    <div class="form-group">
      <input  name="cantidad" type="number" placeholder="cantidad" class="form-control" id="cantidad">
    </div>
    <center>
      <img src="../../frontend/img/iconos/cop_bandera.png" width="30" class="mb-2"><?php echo $mostrarCiclo->precio; ?> / <img src="../../frontend/img/iconos/Usd_bandera.png" width="30" class="mb-2"><?php echo $usd=$mostrarCiclo->precio*$conver_final; ?><br>
    </center> 
    <center>
      <button type="submit" class="btn btn-success" button='agregar'><i class="fas fa-calendar-check"></i> Solicitar</button>
      <button type="button" class="btn btn-danger" button='agregar' data-dismiss="modal" aria-hidden="true"><i class="fas fa-window-close"></i> Cancelar</button>
    </center>
  </div>
</form>