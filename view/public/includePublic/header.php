<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
         
  <!-- estilos css -->
  <link rel="shortcut icon" type="image/x-icon" href="../../frontend/img/fondos/favicon.ico">
  <link rel="stylesheet" type="text/css" href="../../Frontend/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../Frontend/css/style.css">
  <script type="text/javascript" src="../../frontend/js/sweetalert2.all.min.js"></script>

<!------------Inicio de la barra de navegacion------------> 
  <header>
    <nav class="navbar navbar-expand-lg fixed-top bg-black">
      <a class="navbar-brand" href="#"></a>
      <img src="../../Frontend/img/iconos/logo.png" alt="" width="125" height="30" style="margin-left: 30px;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="fas fa-align-justify icon-nav"></span></button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto" style="font-size: 13px;">
          <li class="nav-item active">
            <a class="nav-link inicio-menu" href="../../view/public/HomePublic.php"><i class="fas fa-home"></i>  Inicio</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active menu-text" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-book-open"></i>  Servicios</a>
            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink" style="font-size: 13px;">
              <a class="dropdown-item bg-dark text-light" href="../../View/public/CremallerasPublic.php">Arreglo de cremalleras</a>
              <a class="dropdown-item bg-dark text-light" href="../../View/public/VidriosPublic.php">Colocacion de vidrios y gomas</a>
              <a class="dropdown-item bg-dark text-light" href="../../View/public/FiltracionPublic.php">Arreglo de filtración</a>
              <a class="dropdown-item bg-dark text-light" href="../../View/public/GuayaPublic.php">Instalación de guaya</a>
              <a class="dropdown-item bg-dark text-light" href="../../View/public/ManillasPublic.php">Reparación y montaje de manilla</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link menu-text" href="../../Controller/public/CatalogoController.php?accion=mostrar"><span class="fas fa-newspaper"></span>  Cátalogo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu-text" href="../../Controller/public/ContactanosController.php?accion=mostrar"><span class="fas fa-phone-alt"></span>  Contactanos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu-text" href="../../Controller/public/LoginController.php?accion=login"><span class="fas fa-user"></span>  Iniciar sesión</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>