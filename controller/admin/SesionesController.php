<?php 
require '../../model/admin/SesionesModel.php';
require '../public/IniciarController.php';

$instanciaIniciarController= new IniciarController();
if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class SesionesController extends SesionesModel{

    public function verificarMostrarCliente() {
        $objetoRetornadoCliente=$this->mostrarClientes();
        require '../../view/admin/SesionesClientes.php';
    }

    public function verificarMostrarEmpleado() {
        $objetoRetornadoEmpleado=$this->mostrarEmpleado();
        require '../../view/admin/SesionesEmpleados.php';
    }

    public function verificarMostrarAdministrador() {
        $objetoRetornadoAdministrador=$this->mostrarAdministradores();
        require '../../view/admin/SesionesAdministrador.php';
    }

}

if (isset($_GET['accion']) && $_GET['accion']=="cliente") {
	$instanciaController=new SesionesController();
	$instanciaController->verificarMostrarCliente();
}

if (isset($_GET['accion']) && $_GET['accion']=="empleado") {
	$instanciaController=new SesionesController();
	$instanciaController->verificarMostrarEmpleado();
}

if (isset($_GET['accion']) && $_GET['accion']=="administrador") {
	$instanciaController=new SesionesController();
	$instanciaController->verificarMostrarAdministrador();
}

 ?>