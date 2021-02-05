<?php 
require '../../model/public/CatalogoModel.php';
require '../public/IniciarController.php';
$instanciaIniciarController= new IniciarController();

if ($_SESSION['rol']=="administrador" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class CatalogoController extends CatalogoModel{

	public function ListaServicios() {
		$objeto = $this->catalogoMostrar();
		$productos=$this->mostrarProductos();
		require '../../view/cliente/CatalogoCliente.php';
	}

}

if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
	$instanciaControlador= new CatalogoController();
	$instanciaControlador->ListaServicios();
}

?>