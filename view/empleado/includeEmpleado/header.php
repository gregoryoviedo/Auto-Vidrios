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
            <a class="nav-link inicio-menu" href="../../controller/empleado/HomeEmpleadoController.php?accion=home"><i class="fas fa-home"></i>  Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu-text" href="../../Controller/empleado/MisCitasController.php?accion=mostrar"><span class="fas fa-clipboard-list"></span>  Citas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu-text" href="../../Controller/empleado/PedidosController.php?accion=empleado"><i class="fas fa-box"></i> Pedidos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active menu-text" href="#" id="navbarDropdownMenuPerfil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
              <img src="<?php echo $_SESSION['foto_url']; ?>" style="width: 15px;height: 15px;border-radius: 100%;">
              <?php echo $_SESSION['idusuario']; ?>
              <i class="fas fa-chevron-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdownMenuPerfil">
              <a class="dropdown-item bg-dark menu-text" href="../../Controller/public/LoginController.php?accion=salir" style="font-size: 13px;"></i>Cerrar sesión</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>