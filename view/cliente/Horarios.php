<?php include 'includeCliente/header.php'; ?>
<title>Citas</title>
</head>
<body class="bg-light">

<div class="container-fluid py-5 my-3">
  <h1 class="pt-2 titulo-home text-center">Citas</h1>
  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal"><i class="fas fa-plus-square"></i> Agregar</a>
  
  <div class="row">
    <?php foreach ($citaObjeto as $miCita) { ?>
    <div class="col-lg-3">
      <div class="card">
        <div class="card-body">
          <center>
            <img src="<?php echo $_SESSION['foto_url']; ?>" class="card-img rounded-circle w-100">
          </center>
          <div class="card-block px-3 pt-5">
            <p class="badge badge-dark">Servicio solicitado: </p><span> <?php echo $miCita->servicio; ?></span><br>
            <p class="badge badge-dark">Fecha de ida: </p><span> <?php echo $miCita->fecha; ?></span><br>
            <p class="badge badge-dark">Hora a ir:</p><span> <?php echo $miCita->hora; ?></span><br>
            <p class="badge badge-dark">Empleado:</p><span> <?php echo $miCita->empleado; ?></span><br>
            <center class="pt-1">
              <button class="btn btn-danger" onclick="eliminar(<?php echo $miCita->id; ?>,'<?php echo $miCita->idusuario; ?>');">Cancelar Cita</button>
            </center>
            <?php } ?>
           </div>
        </div>
      </div>
    </div>
    <div class="col-lg-9 col-md-3 col-sm-12 pb-3">
      <header class="main-header-apartar-citas">
        <div class="background-overlay-apartar-citas text-white py-5">
          <div class="container">
            <div class="row" style="margin-top: 100px;">
              <div class="col-md-12 text-center justify-content-center align-self-center">
                <h1 class="cabe titulo-home" style="font-size: 55px;">Solicita una cita</h1>
                <p class="pt-5">ven con nosotros y te ayudaremos con tu problema, ofreciendote algunos de nuestros servicio con nuestros mejores expertos en el area</p>
              </div>
            </div>
          </div>
        </div>
      </header>
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
              <h2 class="modal-title titulo-home">Nueva cita</h2>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form role="form" method="POST" id="cita" onsubmit="RegistrarCita(); return false">
              <div class="col-lg-12">
                <div class="modal-body mx-0 px-0">
                  <div class="form-group">
                    <input type="hidden" name="accion" value="agregar">
                    <select name='servicio' id="servicio" class='form-control'>
                      <option value="0">Problema</option>
                      <option value="Mal funcionamiento de la cremallera">Mal funcionamiento de la cremallera</option>
                      <option value="Filtracion conocida/desconocido por algun vidrios">Filtración conocida/desconocido por algun vidrios</option>
                      <option value="No sube ni baja el vidrio de las puertas">No sube ni baja el vidrio de las puertas</option>
                      <option value="Vidrios lateral, frontal, posterior, roto totalmente o parcialmente">Vidrios lateral, frontal, posterior, roto totalmente o parcialmente</option>
                      <option value="Cambio de gomas">Cambio de gomas</option>
                      <option value="Reparacion de las manilllas">Reparacion de las manilllas</option>
                      <option value="Cambio de las manillas">Cambio de las manillas</option>
                      <option value="Otros">Otros</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input  name="fecha" id="fecha" type="date" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                  </div>
                  <div class="form-group">
                    <select name='hora' id="hora" class='form-control'>
                      <option value="0">Horas</option>
                      <option value="8:00am - 9:00am">8:00am - 9:00am</option>
                      <option value="9:00am - 10:00am">9:00am - 10:00am</option>
                      <option value="10:00am - 11:00am">10:00am - 11:00am</option>
                      <option value="11:00am - 12:00pm">11:00am - 12:00pm</option>
                      <option value="1:00pm - 2:00pm">1:00pm - 2:00pm</option>
                      <option value="2:00pm - 3:00pm">2:00pm - 3:00pm</option>
                      <option value="2:00pm - 4:00pm">2:00pm - 4:00pm</option>
                      <option value="4:00pm - 5:00pm">4:00pm - 5:00pm</option>
                      <option value="5:00pm - 6:00pm">5:00pm - 6:00pm</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select name="empleado" id="empleado" class="form-control">
                      <option value="0">Empleado</option>
                      <?php foreach ($empleadoObjeto as $mostrarCiclo) { ?>
                        <option value="<?php echo $mostrarCiclo->idusuario; ?>"><?php echo $mostrarCiclo->idusuario; ?></option>
                      <?php } ?>
                    </select>        
                  </div>
                </div>
                <center>
                  <button type="submit" class="btn btn-success" button='agregar'><i class="fas fa-calendar-check"></i> Apartar</button>
                </center><br>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'includeCliente/footer.php'; ?>
<script src="../../view/cliente/scriptCliente/HorariosScript.js"></script>