<?php require '../../controller/public/IniciarController.php';
$instanciaIniciarController= new IniciarController();
if ($_SESSION['rol']=="administrador" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
  $instanciaIniciarController->redireccionarBloqueo(); }
include 'includeCliente/header.php'; ?>
<title>Inicio Cliente</title>
</head>
<body>

<!------Inicio del slider automatico----->  
<div class="container-fluid">
  <div class="row">
    <div class="col px-0">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="carousel-img-1"></div>
            <div class="carousel-caption">
              <h2 class="text-light titulo-home">Instalacion de parabrisas</h2>
              <p class="text-light">Una instalacion uniforme, con gomas cambiadas, y verificado de filtraciones</p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-img-2"></div>
            <div class="carousel-caption">
              <h2 class="text-light titulo-home">Reparacion de cremalleras</h2>
              <p>Nuestras especialidad es la reparacion de cremalleras manuales y electricas</p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-img-3"></div>
            <div class="carousel-caption">
              <h2 class="text-light titulo-home">Mas de 15 años de experiencia</h2>
              <p>La experiencia de nuestros servicios da sastifaccion a nuestros clientes</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>
<!-----Final de slider automatico------>

<!-------Inicio de ventajas-------->
<section class="home-section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-sm-2 col-md-2">
        <div class="box text-center">
          <i class="circled-one"></i>
          <i class="four-icons-line-one fas fa-check fa-3x"></i>
          <h4 class="titulo-home">Servicio garantizado</h4>
          <p class="laterales-box">Te garantizamos un servicio eficaz, rapido y seguro, de hacer nuestra labor como es debido para sastifacerte.</p>
        </div>
      </div>
      <div class="col-sm-2 col-md-2">
        <div class="box text-center">
          <i class="circled-two"></i>
          <i class="four-icons-line-two fas fa-book-reader fa-3x"></i>
          <h4 class="titulo-home">Escoge tu servicio</h4>
          <p class="laterales-box">Una amplia variedad de servicios, ya sea si necesitas uno, o en conjunto de ellos para el perfecto estado del carro.</p>
        </div>
      </div>
      <div class="col-sm-2 col-md-2">
        <div class="box text-center">
          <i class="circled-three"></i>
          <i class="four-icons-line-three fas fa-user-graduate fa-3x"></i>
          <h4 class="titulo-home">Gente especializada</h4>
          <p class="laterales-box">Contamos con gente quien tiene mas de 15 años de experiencia prefesional, con una frecuencia de 2 clientes por dia.</p>
        </div>
      </div>
      <div class="col-sm-2 col-md-2">
        <div class="box text-center">
          <i class="circled-four"></i>
          <i class="four-icons-line-four fas fa-clipboard-list fa-3x"></i>
          <h4 class="titulo-home">Diagnostico</h4>
          <p class="laterales-box">Te comentamos en persona y te mostramos la parte defectuosa, y la posterior reparacion de tu problema.</p>
        </div>
      </div>
      <div class="col-sm-2 col-md-2">
        <div class="box text-center">
          <i class="circled-five"></i>
          <i class="five-icons-line-five fas fas fa-cogs fa-3x"></i>
          <h4 class="titulo-home">Configuraciones</h4>
          <p class="laterales-box">Hacemos las configuraciones ideales y optimas para tu cremalleras y tu manillas, con un servicio garantizado.</p>
        </div>
      </div>
      <div class="col-md-1"></div>
    </div>
  </div>
</section>
<!-------Final de ventajas------->    

<!--------Inicio de citas-------->
<header class="main-header-citas-cliente">
  <div class="background-overlay-citas-cliente text-white py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center justify-content-center align-self-center">
            <h1 class="cabe titulo-home" style="font-size: 42px;">¿Aun no has apartado tu cita?</h1>
            <p>Si quieres informarnos de cuando vas a venir exactamente, puedes ir a nuestro apartado de citas</p>
            <a href="../../Controller/cliente/HorariosController.php?accion=mostrar" class="btn btn-outline-primary btn-lg text-white">Apartar cita</a>
        </div>
        <div class="col-md-6">
            <img src="../../Frontend/img/iconos/listado.png" alt="picture the product" class="img-fluid d-none d-sm-block">
        </div>
      </div>
    </div>
  </div>
</header>
<!-----Final de citas------->        

<!----------inicio de servicios----------->

<!--Pequeño encabezado con boton al catalogo-->
<section class="home-section-services bg-light">
  <div class="container bg-light">
    <div class="row">   
      <div class="col-lg-8">  
        <div class="cta-text">
          <h3 class="titulo-home" style="font-size: 40px;">¿Nuestro servicios?</h3>
            <p>Tenemos lo necesario para los vidrios de tu automovil, como con otros problemas relacionados</p>
        </div>
      </div>
      <div class="col-lg-4">
        <a href="../../Controller/cliente/CatalogoController.php?accion=mostrar" class="cta-btn btn btn-primary btn-lg text-white justify-content-center">Catalogo de servicios</a>  
      </div>
    </div>
  </div>
</section>
<!--Final del encabeado de boton al catalogo-->

<!--Items con imagenes y barra de progreso-->
<section >
  <div class="container-fluid bg-white">
    <div class="row">
      <div class="col-lg-4" style="margin-top: 15px;padding: 0;">
        <div class="mx-4">
          <img src="../../Frontend/img/servicios/cremalleras/crema.jpg" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-8 box-second">
        <div class="mx-3">
          <h2 class="line-effect-1 titulo-home">Cremalleras</h2>
          <p>Un mecanismo de cremallera es un dispositivo mecánico con dos engranajes, denominados "piñón" y "cremallera", que convierte un movimiento de rotación en un movimiento rectilíneo o viceversa. El engranaje circular denominado "piñón" engrana con una barra dentada denominada "cremallera", de forma que un giro aplicado al piñón causa el desplazamiento lineal de la cremallera.
          </p>
          <p>Aquí en Auto Vidrios Pueblo Nuevo tenemos todo lo necesario para la reparacion, mantenimiento, cambio, de cremmalera, ya estas sean manuales o electricas!</p>
          <div class="progress" style="height: 33px;">
            <div class="progress-bar bg-success progress-bar-striped" style="width: 87%;">Cremalleras electricas</div>
          </div><br>
          <div class="progress" style="height: 33px;">
            <div class="progress-bar bg-primary progress-bar-striped" style="width: 94%;">Cremalleras Manuales</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid bg-white">
    <div class="row">
      <div class="col-lg-8 box-second">
        <div class="mx-3">
          <h2 class="line-effect-2 titulo-home">Gomas</h2>
          <p>Son aquellas que estan entre la carroceria y el vidrios del carro, encargado de amortiguar el movimiento de estos para evitar el desbalance de este, ademas que tambien tiene como funcionalidad de evitar la total introduccion de agua, por la parte de las puertas estas como los anterior evitaba el constante contacto contra la carroceria y vidrios de la puerta.</p>
          <div class="progress" style="height: 33px;">
            <div class="progress-bar bg-info progress-bar-striped" style="width: 86%;">Gomas</div>
          </div><br>
          <div class="progress" style="height: 33px;">
            <div class="progress-bar bg-secondary progress-bar-striped" style="width: 82%;">Vidrios</div>
          </div><br>
          <div class="progress" style="height: 33px;">
            <div class="progress-bar bg-dark progress-bar-striped" style="width: 71%;">Filtración</div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 bg-white" style="margin-top: 15px;padding: 0;">
        <dir class="mr-4 bg-white" style="margin-left: -9px">
          <img src="../../Frontend/img/servicios/gomas/gomas.jpg" class="img-fluid">
        </dir>
      </div>
    </div>
  </div>
</section>
<!---Final de los servicios----->

<!------Inicio de las opiniones-------->      
<section class="bg-light text-center" style="padding: 10px 1px 40px 1px;">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="m-5">
          <i class="line-effect-servicios d-none d-sm-block"></i>
          <h3 class="titulo-home" style="font-size: 31px;"> Nuestros clientes comentan</h3>
          <p style="margin-top: 10px;">Aqui unos ejemplos de los expresan nuestros cliente por nuestros servicios de calidad</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!------Final de las opiniones-------->      

<!--Carousel de comentarios del Home--->
<div class="container-fluid bg-light">
  <div class="row" >
    <div class="col" style="padding: 0;">
      <div id="demo" class="carousel slide fondo-continuo" data-ride="carousel">
        <!--Indicadores-->
        <ul class="carousel-indicators">
          <li data-target="demo" data-slide-to="0" class="active"></li>
          <li data-target="demo" data-slide-to="1"></li>
        </ul>
        <!--Imagenes y contenido-->
        <div class="carousel-inner">
          <!--Primera paginacion del carousel--->
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-3" style="padding-top: 20px;padding-left: 20px;padding-right: 20px;">
                <div class="block-text rel zmin">
                  <p>Fui a Auto Vidrios Pueblo Nuevo por un problema de filtraciones en la puertas del conductor, quizas debido por las recientes lluvias, por lo que acudi a ir al establecimiento y la verdad quede muy sastifecho con el muy buen servicio que ofrecen y su hospitalidad.</p>
                  <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                </div>
                <div class="person-text rel text-light">
                  <img src="../../frontend/img/people/profile-1.jpg" alt="" class="person img-circle" />
                  <a>Anderson</a>
                </div>
              </div>
              <div class="col-md-3 d-none d-sm-block" style="padding-top: 20px;padding-left: 20px;padding-right: 20px;">
                <div class="block-text rel zmin">                    
                  <p>Ultimamente me habia costado mucho subir y bajar el vidrio del asiento del conductor, por lo que decidi ir a solucionar el problemas una buenas vez por todas, y la verdad que he quedado encantado con el bien servicio que llegan a ofrecer en el negocio de Auto Vidrios Pueblo Nuevo.</p>
                  <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                </div>
                <div class="person-text rel text-light">
                  <img src="../../frontend/img/people/profile-2.jpg" alt="" class="person img-circle" />
                  <a>Camila</a>
                </div>
              </div>    
              <div class="col-md-3 d-none d-sm-block" style="padding-top: 20px;padding-left: 20px;padding-right: 20px;">
                <div class="block-text rel zmin">                    
                  <p>Hace un mes el vidrios trasero de mi carro se rompio debido a una tormenta que hubo por donde vivo, a los pocos dias fue a comprar el vidrio, pero no tenia quien me los instalara, a lo que fui a Auto Vidrios Pueblo Nuevo, un servicio eficaz y rapido, quede bastante sastifecha.</p>
                  <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                </div>
                <div class="person-text rel text-light">
                  <img src="../../frontend/img/people/profile-3.jpg" alt="" class="person img-circle" />
                  <a>Julian</a>
                </div>
              </div>
              <div class="col-md-3 d-none d-sm-block" style="padding-top: 20px;padding-left: 20px;padding-right: 20px;">
                 <div class="block-text rel zmin">                    
                  <p>Tras un largo viaje tras hacer la entrega de un cargamento de papas al estado Zulia, empeze a notar que mi vidrio no funcionaba como debia, le daba al boton y la verdad le costaba, al final gracias a Auto Virios Pueblo Nuevo descubri que era el motor de la cremallera del vidrios.</p>
                  <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                 </div>
                <div class="person-text rel text-light">
                  <img src="../../frontend/img/people/profile-4.jpg" alt="" class="person img-circle" />
                  <a>Henry</a>
                </div>
              </div> 
            </div>              
          </div>    
          <!--Segunda paginacion del carousel-->
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-3 col-sm-1" style="padding-top: 20px;padding-left: 20px;padding-right: 20px;">
                <div class="block-text rel zmin">
                  <p>La verdad es fue al negocio por solo cambiar las manellas de las puertas por unas que tenia alli guardadas hace tiempo, y en el proceso de cambio el empleado me mostro claramente como la guaya ya le quedaba poco para romperse, por lo que aproveche y la reemplace.</p>
                  <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                </div>
                <div class="person-text rel text-light">
                  <img src="../../frontend/img/people/profile-5.jpg" alt="" class="person img-circle" />
                  <a>Sarai</a>
                </div>
              </div>
              <div class="col-md-3 d-none d-sm-block" style="padding-top: 20px;padding-left: 20px;padding-right: 20px;">
                <div class="block-text rel zmin">
                  <p>Habia estado con diversas filtraciones por varias semanas en el auto de mi esposa, a pesar de todos los intentos de solucionarlo por mi misma cuanta falle, por lo que decidÃ­ acudir a unos profesionales como los son la gente de Auto Vidrios Pueblo Nuevo y sin duda fue mi mejor opcion.</p>
                  <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                </div>
                <div class="person-text rel text-light">
                  <img src="../../frontend/img/people/profile-6.jpg" alt="" class="person img-circle" />
                  <a>Lourdes</a>
                </div>
              </div>
              <div class="col-md-3 d-none d-sm-block" style="padding-top: 20px;padding-left: 20px;padding-right: 20px;">
                <div class="block-text rel zmin">
                  <p>Hace unas unos meses opte por comprar una Toyota, el vendedor me dijo que el unico problema que tenia es que loz vidrios estaban algo mas duros, ya habia tenido experiencia con Auto Vidrios Pueblo Nuevo, por lo que decido acudir con ellos de nuevo para la solucion de mi problema.</p>
                  <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                </div>
                <div class="person-text rel text-light">
                  <img src="../../frontend/img/people/profile-7.jpg" alt="" class="person img-circle" />
                  <a>Carolina</a>
                </div>
              </div>
              <div class="col-md-3 d-none d-sm-block" style="padding-top: 20px;padding-left: 20px;padding-right: 20px;">
                <div class="block-text rel zmin">
                  <p>Aqui va mi historia, en mi trayecto cotidiano para ir a mi empresa Maravilla-JS, observe que las gomas de los vidrios ya se estaban mal, algunas ya se caian solas, y eso explica las recientes filtraciones de agua, mi vecino ya me habia recomendado este negocio.</p>
                  <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                </div>
                <div class="person-text rel text-light">
                  <img src="../../frontend/img/people/profile-8.jpg" alt="" class="person img-circle" />
                  <a>Fabian</a>
                </div>
              </div>
            </div>              
          </div>
        </div>
  	  </div>
    </div>
  </div>
</div>
<!----Final de las opiniones----->

<!-----Inicio del porque nosotros------>
<section class="py-5 bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="m-5">
        <i class="line-effect-servicios d-none d-sm-block"></i>
        <h3 class="titulo-home" style="font-size: 30px;">¿Porque nuestros servicios?</h3>
        <p style="margin-top: 10px;">Existen varios motivos por el cual deberia confiar en nuestros servicios, ya solo empezando que contamos con mas de 15 años en servicio, atentiendo clientes diaramente, y solucionando sus problemas, vamos descubre mas aqui abajo</p>
      </div>
    </div>
  </div>
</section>
<!-----Final de porque nosotros------>

<!-----Inicio de Cards de servicios------>
<section class="home-section">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-md-3">
        <div class="box text-center py-0 mz-0">
          <img src="../../Frontend/img/servicios/cremalleras/motor.jpg" class="img-fluid">
          <i class="circled-uno-end"></i>
          <i class="tres-icons-1 fas fa-bolt fa-3x"></i>
          <h4 class="titulo-home">Motor</h4>
          <p class="laterales-box">Contamos con los recursos suficientes para poder resolver los problemas de las cremalleras de tu carro.</p>
        </div>
      </div>
      <div class="col-sm-4 col-md-3">
        <div class="box text-center py-0 mz-0">
          <img src="../../Frontend/img/servicios/manillas/manillareparada.jpg" class="img-fluid">
          <i class="circled-dos-end"></i>
          <i class="tres-icons-2 fas fas fa-cogs fa-3x"></i>
          <h4 class="titulo-home">Manillas</h4>
          <p class="laterales-box">Te brindamos la posibilidad de poder montar tus manillas personalizadas (mientras nos otorge el ejemplar).</p>
        </div>
      </div>
      <div class="col-sm-4 col-md-3">
        <div class="box text-center py-0 mz-0">
          <img src="../../Frontend/img/servicios/cremalleras/puerta.jpg" class="img-fluid">
          <i class="circled-tres-end"></i>
          <i class="tres-icons-3 fas fa-car-alt fa-3x"></i>
          <h4 class="titulo-home">Guaya</h4>
          <p class="laterales-box">Tenemos los conocimientos, experiencia y personal para el cambio, renovacion de la guaya que su puerta</p>
        </div>
      </div>
      <div class="col-sm-4 col-md-3">
        <div class="box text-center py-0 mz-0">
          <img src="../../Frontend/img/servicios/cremalleras/puerta.jpg" class="img-fluid">
          <i class="circled-tres-end"></i>
          <i class="tres-icons-3 fas fa-car-alt fa-3x"></i>
          <h4 class="titulo-home">Guaya</h4>
          <p class="laterales-box">Tenemos los conocimientos, experiencia y personal para el cambio, renovacion de la guaya que su puerta</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!---Final de Cards de sercicios---->  

<?php include 'includeCliente/footer.php'; ?>
</body>
</html>