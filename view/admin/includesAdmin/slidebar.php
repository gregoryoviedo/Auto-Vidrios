<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <title>Administrador</title>

  <!-- estilos css -->
  <link rel="shortcut icon" type="image/x-icon" href="../../frontend/img/fondos/favicon.ico">
  <link rel="stylesheet" type="text/css" href="../../frontend/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../frontend/css/style.css">
  <link rel="stylesheet" type="text/css" href="../../frontend/css/slidebar.css">
  <script type="text/javascript" src="../../frontend/js/sweetalert2.all.min.js"></script>

</head>
<!-------------------Encabezado que actua como boton de abrir y cerrar pestaña-------------------->

<body class="bg-light">
    <div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">Panel de control</a>
        <div id="close-sidebar">
          <span class="fas fa-angle-double-left"></span>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img src="<?php echo $_SESSION['foto_url']; ?>" class="img-fluid rounded-circle w-100">
        </div>
        <div class="user-info">
          <span class="user-name">
            <?php echo $_SESSION['idusuario']; ?>
          </span>
          <span class="user-role">Administrator</span>
          <a href="../../Controller/admin/PerfilController.php?accion=viewperfil" class="link-al-perfil"><i class="fas fa-id-card"></i> Ver Perfil</a>
        </div>
      </div>
      <!-- sidebar-header  -->

      <div class="sidebar-menu">
        <ul>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-users"></i> 
              <span>Cargos</span>      
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="../../Controller/admin/AdministradoresController.php?accion=mostrar"></i><i class="fas fa-user-tie"></i> Administrador</a>
                </li>
                <li>
                  <a href="../../Controller/admin/EmpleadosController.php?accion=mostrar"></i><i class="fas fa-hammer"></i> Empleado</a>
                </li>
                <li>
                  <a href="../../Controller/admin/ClienteAdminController.php?accion=mostrar"></i><i class="fas fa-user-circle"></i> Cliente</a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a href="../../Controller/admin/PreciosController.php?accion=view">
              <i class="fas fa-book-open"></i>
              <span>Mi Catalogo</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-paste"></i>
              <span>Auditorias</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="../../Controller/admin/AuditoriasController.php?accion=administrador">Auditorias Administrador</a>
                </li>
                <li>
                  <a href="../../Controller/admin/AuditoriasController.php?accion=empleado">Auditorias Empleado</a>
                </li>
                <li>
                  <a href="../../Controller/admin/AuditoriasController.php?accion=cliente">Auditorias Cliente</a>
                </li>
                <li>
                  <a href="../../Controller/admin/AuditoriasController.php?accion=economia">Auditorias Economicas</a>
                </li>
                <li>
                  <a href="../../Controller/admin/AuditoriasController.php?accion=catalogo">Auditorias Catalogo</a>
                </li>
                <li>
                  <a href="../../Controller/admin/AuditoriasController.php?accion=atencion">Auditorias atencion</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-chalkboard-teacher"></i>
              <span>Sesiones</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="../../Controller/admin/SesionesController.php?accion=cliente">Sesion Clientesr</a>
                </li>
                <li>
                  <a href="../../Controller/admin/SesionesController.php?accion=empleado">Sesiones Empleados</a>
                </li>
                <li>
                  <a href="../../Controller/admin/SesionesController.php?accion=administrador">Sesiones Administrador</a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a href="../../Controller/admin/DashboardController.php?accion=mostrar">
              <i class="fa fa-chart-line"></i>
              <span>Estadiscas</span>
            </a>
          </li>
          <li>
            <a href="../../Controller/admin/MaterialesController.php?accion=mostrar">
              <i class="fa fa-box-open"></i>
              <span>Materiales</span>
            </a>
          </li>
          <li>
            <a href="../../Controller/admin/IngresosController.php?accion=mostrar">
              <i class="fas fa-money-bill-alt"></i>
              <span>Ingresos</span>
            </a>
          </li>
          <li>
            <a href="../../Controller/admin/EgresosController.php?accion=mostrar">
              <i class="fas fa-sort-amount-down"></i>
              <span>Egresos</span>
            </a>
          </li>
          <li>
            <a href="../../Controller/admin/ContactanosMensajesController.php?accion=view">
              <i class="fas fa-envelope-open-text"></i>
              <span>Contactanos</span>
            </a>
          </li>
          <li>
            <a href="../../Controller/admin/ComentariosGeneralController.php?accion=mostrar">
              <i class="fas fa-comments"></i>
              <span>Comentarios</span>
            </a>
          </li>
          <li>
            <a href="../../Controller/admin/PedidosController.php?accion=mostrar">
              <i class="fas fa-file-alt"></i>
              <span>Pedidos</span>
            </a>
          </li>
          <li>
            <a href="../../Controller/admin/CitasController.php?accion=mostrar">
              <i class="fas fa-calendar-alt"></i>
              <span>Citas</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">  
      <a href="../../Controller/public/LoginController.php?accion=salir">
        <span class="fas fa-power-off"></span> Salir
      </a>
    </div>
  </nav>
  <main class="page-content bg-light">