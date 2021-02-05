<?php require '../../controller/public/IniciarController.php';
$instanciaIniciarController= new IniciarController();
if ($_SESSION['idusuario']=="cliente") {
  $instanciaIniciarController->redireccionarBloqueo(); }
include 'includeCliente/header.php'; ?>
<title>Vidrios</title>
</head>
<body>
<!--Cabeza del servicio-->
<header class="header-page-vidrios">
  <div class="background-overlay-header-page-vidrios text-white py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center justify-content-center align-self-center py-5">
          <h1 class="cabezera-servicios titulo-home text-center">Vidrios</h1>
          <i class="line-emcabezado-servicios d-none d-sm-block d-md-block"></i>
          <p class="cabezera-servicios-parrafo">Esta pieza puede estar ubicada en los laterales de nuestro automovil, en el frente, y en la parte posterior, encargada de encerrar el espacio del audio pero sin impedir la posibilidad de poder seguir observando a traves de ellos</p>
          <a href="../../controller/cliente/CatalogoController.php?accion=mostrar" class="btn btn-outline-secondary">Catalogo</a>
        </div>
      </div>
    </div>
  </div>
</header>
<!--Items con imagenes y barra de progreso-->
<section style="padding-bottom:70px;background: #fff;padding-top: 70px;">
  <div class="container-fluid bg-white">
    <div class="row">
      <div class="col-lg-3 bg-white" style="margin-top: 15px;padding: 0;">
        <img src="../../Frontend/img/servicios/vidrios/Parabrisas.png" class="img-fluid mt-5" width="400">
      </div>
      <div class="col-lg-9 box-second" >
        <div class="mx-4">
          <h2 class="titulo-home" style="font-size: 43px;">Vidrios</h2>
          <p>son denominaciones de la superficie transparente que se utiliza en automoción para permitir la visibilidad, obtener aerodinámica y proteger a los ocupantes de los elementos (viento, lluvia, polvo, insectos). Aunque durante muchos años fueron fabricados de vidrio templado, los actuales parabrisas de vidrio laminado. que constan de dos hojas de vidrio con una capa de policarbonato laminado de seguridad entre ellas<</p>
          <p>Aquí en Auto Vidrios Pueblo Nuevo tenemos para la instalacion de un nuevo parabrisas con la total experienza de hacer un trabajo de gran calidad, para asegurarnos de que quedes conforme y sastifecho con nuestro servicio</p>
          <div class="row">
            <div class="col-lg-3">
              <i class="fas fa-car" style="font-size: 100px;margin-bottom: 20px;color: black;"></i>
              <strong style="position: absolute;padding-top: 40px;padding-left: 5px;">Soluciones para cualquier tipo de auto</strong>
            </div>
            <div class="col-lg-3">
              <i class="fas fa-check-double" style="font-size: 100px;margin-bottom: 20px;color: black;"></i>
              <strong style="position: absolute;padding-top: 40px;padding-left: 5px;">Buen servicio 100% garantizado</strong>
            </div>
            <div class="col-lg-3">
              <i class="fas fa-cog" style="font-size: 100px;margin-bottom: 20px;color: black;"></i>
              <strong style="position: absolute;padding-top: 40px;padding-left: 5px;">Te lo configuramos correctamente</strong>
            </div>
            <div class="col-lg-3">
              <i class="fas fa-car-crash" style="font-size: 100px;margin-bottom: 20px;color: black;"></i>
              <strong style="position: absolute;padding-top: 40px;padding-left: 5px;">Reparamos tus averias</strong>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Cabeza del servicio de cremallera electrica-->
<header class="header-page-gomas">
  <div class="background-overlay-header-page-gomas text-white py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
           <img src="../../Frontend/img/servicios/gomas/GomaEnTira.png" class="img-fluid" width="400">
        </div>
        <div class="col-lg-7">
          <h2 class="titulo-home" style="font-size: 43px;padding-top: 50px;">Gomas</h2>
          <p>Gracias a estas tiras de gomas que se expanden por varios centimentros, el carro elimina toda aquella posibilidad de poder poseer una filtracion a largo plazos y ademas tambien amortigua las vibraciones del cristal</p>
        </div>
      </div>
    </div>
  </div>
</header>
<!---Cards de motivos para que cambiar--->
<div class="container-fluid bg-light py-5">
  <div class="row">
    <div class="col-lg-1"></div>
      <div class="col-lg-2">   
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title text-center icono-cards-servicios"><i class="fas fa-info-circle"></i></h5>
            <h6 class="card-subtitle mb-2 text-muted text-center titulo-home" style="font-size: 27px;"><b>Desgaste</b></h6>
            <p class="card-text text-justify">Por el constantes desgaste de las partes internas del mecanismo por el uso tras uso, acortando su vida util</p>
          </div>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title text-center icono-cards-servicios"><i class="fas fa-info-circle"></i></h5>
            <h6 class="card-subtitle mb-2 text-muted text-center titulo-home" style="font-size: 27px;"><b>Desprendimiento</b></h6>
            <p class="card-text text-justify">Guaya a punto de quiebre, haciendo que despues de desprendimiento de esta sea totalmente inutilizable</p>
          </div>
        </div>
      </div>
      <div class="col-lg-2">   
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title text-center icono-cards-servicios"><i class="fas fa-info-circle"></i></h5>
            <h6 class="card-subtitle mb-2 text-muted text-center titulo-home" style="font-size: 27px;"><b>Fallas</b></h6>
            <p class="card-text text-justify">Fallas en el motor por falta de aceite o de algun residuo que se haya introducido</p>
          </div>
        </div>
      </div>
      <div class="col-lg-2">   
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title text-center icono-cards-servicios"><i class="fas fa-info-circle"></i></h5>
            <h6 class="card-subtitle mb-2 text-muted text-center titulo-home" style="font-size: 27px;"><b>Desalinamiento</b></h6>
            <p class="card-text text-justify">Desalinamiento de la cremalleras, lo que causa que se tenga que aplica mas fuerzae</p>
          </div>
        </div>
      </div>
      <div class="col-lg-2">   
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title text-center icono-cards-servicios"><i class="fas fa-info-circle"></i></h5>
            <h6 class="card-subtitle mb-2 text-muted text-center titulo-home" style="font-size: 27px;"><b>Mecanismo</b></h6>
            <p class="card-text text-justify">El mecanismo en general puede dejar de funcionar por varios factores externos o internos</p>
          </div>
        </div>
      </div>

    <div class="col-lg-1"></div>
  </div>
</div>
<!---Final de los servicios----->
<div class="container-fluid bg-light" style="padding-bottom: 30px;">
  <div class="row">
    <div class="col-lg-10">
      <div class="front-section  mx-4">
        <h2 class="titulo-home">¿Motivos del el porque nosotros?</h2>
        <hr class="left">
        <p>Existen varios motivos por el cual deberia confiar en nuestros servicios, ya solo empezando que contamos con mas de 15 años en servicio, atentiendo clientes diaramente, y solucionando sus problemas, vamos descubre mas aqui abajo</p>
        <div class="front-options">
          <div class="row">
            <div class="col-md-6">
              <div class="border-icon"><figure class="icon-center"><img src="../../frontend/img/iconos/collaboration.png" alt=""></figure></div>
              <h4 class="titulo-home">Experiencia</h4>
              <p>Tenemos mas de 15 años en servicio, tratando casi a diario este tipo de problemas</p>
            </div>
            <div class="col-md-6">
              <div class="border-icon"><figure class="icon-center"><img src="../../frontend/img/iconos/deal.png" alt=""></figure></div>
              <h4 class="titulo-home">Buen trato</h4>
              <p>No soo es importante ayudarte, sino que tu estadia en el establecimiento sea de tu agrado</p>
            </div>
            <div class="col-md-6">
              <div class="border-icon"><figure class="icon-center"><img src="../../frontend/img/iconos/creative.png" alt=""></figure></div>
              <h4 class="titulo-home">Maneras eficientes</h4>
              <p>Distintas maneras de resolver tu problema, ya que si o si queremos resolverlo</p>
            </div>
            <div class="col-md-6">
              <div class="border-icon"><figure class="icon-center"><img src="../../frontend/img/iconos/document.png" alt=""></figure></div>
              <h4 class="titulo-home">Mas conocimiento</h4>
              <p>Tambien abarcamos mas de un servicio, sera faicl ver otro problema inmediatamente</p>
            </div>
          </div>  
        </div>
      </div>
    </div>
    <div class="col-lg-2 front-left">
      <div class="row hover-effects image-hover">
        <div class="mx-3 pt-5">
          <div class="col-md-12">
          <div class="image-box">
            <figure><img src="../../frontend/img/servicios/gomas/gomas.jpg" width="150" /></figure>
          </div>
        </div>
        <div class="col-md-12">
          <div class="image-box">
            <figure><img src="../../frontend/img/servicios/vidrios/frontal.jpg" width="150" /></figure>
          </div>
        </div>
        </div>      
      </div>
    </div>
  </div>
</div>   

<?php include 'includeCliente/footer.php'; ?>