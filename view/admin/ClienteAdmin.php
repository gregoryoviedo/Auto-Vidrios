<?php include 'includesAdmin/slidebar.php'; ?>

<!-----Aqui es el unicio de el listados de los clientes registrados----->
<h1 class="text-center titulo-home"><span class="fas fa-user-circle"></span>  Lista de Clientes</h1>

<div class="container-fluid bg-light">
  <div class="row">
    <div class="col-12">
      <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal"><i class="fas fa-plus-square"></i> Agregar</a>
      <a href="../../reportes/ClientesReporte.php" class="btn btn-info" target="_blank"><i class="fas fa-file-pdf"></i> Generar PDF</a>
        <div class="table-responsive bg-white" style="font-size: 12px;">
          <table class="table table">
            <thead class="bg-black text-light text-center titulo-home" style="font-size: 15px;">
              <tr>
                <th>Id</th>
                <th>Usuario</th>
                <th>Cedula</th> 
                <th>Nombre</th> 
                <th>Apellido</th> 
                <th>Correo</th> 
                <th>Telefono</th> 
                <th>Nacimiento</th> 
                <th>Genero</th> 
                <th>Creado</th>
                <th>Acciones</th>   
              </tr>
            </thead>
          <tbody> 
            <?php
              foreach ($objetoRetornado as $mostrarCiclo) { ?>
              <tr>
                <td><?php echo $mostrarCiclo->id; ?></td>
                <td><?php echo $mostrarCiclo->idusuario; ?></td>
                <td><?php echo $mostrarCiclo->cedula; ?></td>
                <td><?php echo $mostrarCiclo->nombre; ?></td>
                <td><?php echo $mostrarCiclo->apellido; ?></td>
                <td><?php echo $mostrarCiclo->correo; ?></td>
                <td><?php echo $mostrarCiclo->telefono; ?></td>
                <td><?php echo $mostrarCiclo->day." de " .$mostrarCiclo->month." de ".$mostrarCiclo->year; ?></td>
                <td><?php echo $mostrarCiclo->sexo; ?></td>
                <td><?php echo $mostrarCiclo->creacion; ?></td>
                <td>
                <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $mostrarCiclo->id; ?>,'<?php echo $mostrarCiclo->idusuario; ?>','<?php echo $mostrarCiclo->foto_url; ?>')"><i class="fas fa-trash-alt"></i></button>
                <button class="btn btn-warning btn-sm" onclick="actualizar(<?php echo $mostrarCiclo->id;?>)"><i class="fas fa-edit"></i></button>
                </td>
              </tr>
            <?php } ?>     
          </tbody>  
        </table>
      </div>
    </div>
  </div> 
</div> 
<!------Final del listado de clientes-------->

<!-----REgistro de nuevo usuario------->
<div class="container">
  <div class="row">
    <div class="col">   
      <div class="modal fade" id="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title titulo-home">Nuevo Cliente</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form role="form" method="POST" onsubmit="RegistrarCliente(); return false" id="formulario">
              <div class="col-lg-12">
                <div class="modal-body mx-0 px-0">
                  <div class="form-inline campo-general">
                    <input type="hidden" name="accion" value="agregar">
                    <input  name="idusuario" placeholder="Nombre de usuario" class="form-control col-lg-8 col-sm-8">
                    <input  name="cedula" type="number" placeholder="Cedula" class="form-control col-lg-4 col-sm-4">
                  </div>
                  <div class="form-inline campo-general">        
                    <input  name="nombre" placeholder="Nombre" class="form-control col-lg-6 col-sm-6"> 
                    <input  name="apellido" placeholder="Apellido" class="form-control col-lg-6 col-sm-6">  
                  </div>
                  <div class="form-group">
                    <input  name="correo" id="correo" type="email" placeholder="Correo electrónico" class="form-control">
                  </div>
                  <div class="form-group">
                    <input  name="telefono" id="telefono" type="number" placeholder="Teléfono" class="form-control">
                  </div>
                  <div class="form-inline campo-general-date" >  
                    <select name="day" class='form-control col-lg-4 col-sm-4'>
                      <option>Dia</option>
                      <?php 
                        for($dia=1; $dia<=31; $dia++){
                          echo '<option value="'.$dia.'">'.$dia.'</option>';
                        }
                      ?>
                    </select>
                    <select name="month" class='form-control col-lg-4 col-sm-4'>   
                      <option>Mes</option><option value="Enero">Enero</option><option value="Febrero">Febrero</option><option value="Marzo">Marzo</option><option value="Abril">Abril</option><option value="Mayo">Mayo</option><option value="Junio">Junio</option><option value="Julio">Julio</option><option value="Agosto">Agosto</option><option value="Septiembre">Septiembre</option><option value="Octubre">Octubre</option><option value="Noviembre">Noviembre</option><option value="Diciembre">Diciembre</option>
                    </select>
                    <select name='year' class="form-control col-lg-4 col-sm-4">
                      <option>Año</option>
                      <?php 
                        $year = date("Y");
                        for ($i=1920; $i<=$year; $i++){
                          echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <select name='sexo' class='form-control'>
                      <option value="">Género</option>  
                      <option value="Femenino">Femenino</option>
                      <option value="Masculino">Masculino</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input  name="password" id="password" type="password" placeholder="Contraseña" class="form-control">
                  </div>                 
                  <div class="formboostrap-group">
                    <input  name="password2" id="password2" type="password" placeholder="Confirmar contraseña" class="form-control">
                  </div>
                </div>
                <center>
                  <button type="submit" class="btn btn-success" button='agregar'><i class="fas fa-calendar-check"></i> Registrar</button>
                  <button type="button" class="btn btn-danger" button='agregar' data-dismiss="modal" aria-hidden="true"><i class="fas fa-window-close"></i> Cancelar</button>
                </center><br>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> 
  </div> 
</div> 
<!-----Final de registro de un nuevo usuario------>  

<!-----Inicio del Modal para editar un usuario------>
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
<!-----Final del Modal para editar un usuario------>

<?php include 'includesAdmin/footer.php'; ?>
<script type="text/javascript" src="../../view/admin/scriptAdmin/ClienteAdminScript.js"></script>