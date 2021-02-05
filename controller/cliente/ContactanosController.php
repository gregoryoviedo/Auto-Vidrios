<?php 
require '../../model/public/ContactanosModel.php';
require '../public/IniciarController.php';
$instanciaIniciarController= new IniciarController();

if ($_SESSION['rol']=="administrador" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class ContactanosController extends ContactanosModel {

	public function verificarAgregar($nombre,$correo,$asunto,$mensaje){
		$this->agregar($nombre,$correo,$asunto,$mensaje);
	}

	public function mostrar() {
		require '../../view/Cliente/Contactanos.php';
	}

}

	//condicional encargarda de agarrar los datos de CONTACTANOS para AGREGAR
	if (isset($_POST['accion']) && $_POST['accion']=="agregar") {
		if (isset($_POST['nombre']) &&isset($_POST['correo']) &&isset($_POST['asunto']) &&isset($_POST['mensaje'])) {
			$instanciaControlador=new ContactanosController();
			$instanciaControlador->verificarAgregar($_POST['nombre'],$_POST['correo'],$_POST['asunto'],$_POST['mensaje']);
		}
	}

	if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
		$instanciaControlador=new ContactanosController();
		$instanciaControlador->mostrar();
	}

?>