<?php 
require '../../model/admin/AuditoriasModel.php';
require '../public/IniciarController.php';

$instanciaIniciarController= new IniciarController();
if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class AuditoriasController extends AuditoriasModel{

    public function verificarMostrarCliente() {
        $objetoRetornadoCliente=$this->mostrarClientes();
        require '../../view/admin/AuditoriasClientes.php';
    }

    public function verificarMostrarEmpleado() {
        $objetoRetornadoEmpleado=$this->mostrarEmpleado();
        require '../../view/admin/AuditoriasEmpleados.php';
    }

    public function verificarMostrarAdministrador() {
        $objetoRetornadoAdministradores=$this->mostrarAdministrador();
        require '../../view/admin/AuditoriasAdministradores.php';
	}
	
	public function verificarMostrarCatalogo() {
        $objetoRetornadocatalogo=$this->mostrarCatalogo();
        require '../../view/admin/AuditoriasCatalogo.php';
	}
	
	public function verificarMostrarEconomia() {
        $objetoRetornadoEconomia=$this->mostrarEconomia();
        require '../../view/admin/AuditoriasEconomica.php';
	}
	
	public function verificarMostrarAtencion() {
        $objetoRetornadoAtencion=$this->mostrarAtencion();
        require '../../view/admin/AuditoriasAtencion.php';
    }
}

if (isset($_GET['accion']) && $_GET['accion']=="cliente") {
	$instanciaController=new AuditoriasController();
	$instanciaController->verificarMostrarCliente();
}

if (isset($_GET['accion']) && $_GET['accion']=="empleado") {
	$instanciaController=new AuditoriasController();
	$instanciaController->verificarMostrarEmpleado();
}

if (isset($_GET['accion']) && $_GET['accion']=="administrador") {
	$instanciaController=new AuditoriasController();
	$instanciaController->verificarMostrarAdministrador();
}

if (isset($_GET['accion']) && $_GET['accion']=="atencion") {
	$instanciaController=new AuditoriasController();
	$instanciaController->verificarMostrarAtencion();
}

if (isset($_GET['accion']) && $_GET['accion']=="economia") {
	$instanciaController=new AuditoriasController();
	$instanciaController->verificarMostrarEconomia();
}

if (isset($_GET['accion']) && $_GET['accion']=="catalogo") {
	$instanciaController=new AuditoriasController();
	$instanciaController->verificarMostrarCatalogo();
}

 ?>