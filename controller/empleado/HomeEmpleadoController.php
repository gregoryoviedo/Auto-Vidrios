<?php
require '../../model/empleado/HomeEmpleadoModel.php';
require '../public/IniciarController.php';
$instanciaIniciarController= new IniciarController();
if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="administrador" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class HomeEmpleadoController extends HomeEmpleadoModel{

	//Funcion encargada de cargar la VISTAS
	public function verificarMostrarEmpleado($user){
        $this->user=$user;
		$objetoRetornado=$this->mostrar($user);
		$ultimasCitas=$this->ultimasCitas($user);
		require '../../view/empleado/HomeEmpleado.php';
	}
	//Funcion de redireccionar para recargar la pagina
	public function redireccionarMostrar(){
		header("location: HomeEmpleadoController.php?accion=home");
	}

}
/*===========================
CONDICIONALES DEL CONTROLADOR
=========================== */

//Condicional encarga de MOSTRAR la vista a los EMPLEADOS
if (isset($_GET['accion']) && $_GET['accion']=="home") {
    $instanciaControlador=new HomeEmpleadoController();
    $user=$_SESSION['idusuario'];
	$instanciaControlador->verificarMostrarEmpleado($user);
}

?>
