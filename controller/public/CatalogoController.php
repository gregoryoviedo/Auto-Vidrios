<?php 
require '../../model/public/CatalogoModel.php';

class CatalogoController extends CatalogoModel{

	public function ListaServicios() {
		$objeto = $this->catalogoMostrar();
		$productos=$this->mostrarProductos();
		require '../../view/public/CatalogoPublic.php';
	}

}

if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
	$instanciaControlador= new CatalogoController();
	$instanciaControlador->ListaServicios();
}

?>