<?php
require '../../model/admin/MaterialesModel.php';
require '../public/IniciarController.php';
$instanciaIniciarController= new IniciarController();
if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class MaterialesController extends MaterialesModel{

	//Funcion encarga de INSERTA un nuevo administrador
	public function verificarAgregar($material,$cantidad,$foto,$foto_url){
		$this->agregar($material,$cantidad,$foto,$foto_url);
		$this->redireccionarMostrar();
	}

	//Funcion encargada de TRAER los datos para posteriormente actualizar
	public function verificarActualizar($id) {
		$this->id=$id;
		$objetoRetornado=$this->actualizar();
		require '../../View/admin/EditarMateriales.php';
	}

	//Funcion encargada de ACTUALIZAR segun el ID que llego
	public function verificarActualizarInsertar($id,$material,$cantidad,$foto,$foto_url) {


			//metodo que hara el proceso de AGREGAR

			$this->id=$id;
			$this->material=$material;
			$this->cantidad=$cantidad;
			$this->foto=$foto;
			$this->foto_url=$foto_url;
			$this->actualizarInsertar($id);
			$this->redireccionarMostrar();

	}

	//funcion encargarda de ELIMINAR segun su ID
	public function verificarEliminar($id) {
		$this->id=$id;
		$this->eliminar();
		$this->redireccionarMostrar();
	}

	//Funcion encargada de cargar la VISTAS
	public function verificarMostrar(){
		$adminObjeto=$this->mostrar();
		require '../../view/admin/Materiales.php';
	}
	//Funcion de redireccionar para recargar la pagina
	public function redireccionarMostrar(){
		header("location: MaterialesController.php?accion=mostrar");
	}

}
/*===========================
CONDICIONALES DEL CONTROLADOR
=========================== */

//Condicional encarga de MOSTRAR la vista
if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
	$instanciaControlador=new MaterialesController();
	$instanciaControlador->verificarMostrar();
}

//Condicional encargada de AGREGAR y de VALIDAR los tipos de datos que llegan
if (isset($_POST['accion']) && $_POST['accion']=="agregar") {
	
	$instanciaControlador=new MaterialesController();
	$foto=$_FILES['imagen']['name'];
	$fototemporal=$_FILES['imagen']['tmp_name'];
	$foto_url="../../frontend/files/materiales/" .$foto;
	copy($fototemporal,$foto_url);
	$instanciaControlador->verificarAgregar($_POST['material'],$_POST['cantidad'],$foto,$foto_url);

}

//Condicional encargada de ELIMINAR segun su ID
if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
	$instanciaControlador=new MaterialesController();
	$id=$_GET['id'];
	$foto_url=$_GET['foto_url'];
	unlink($foto_url);
	$instanciaControlador->verificarEliminar($id);
}

//Condicional encargada de recoger los datos para ACTUALIZAR 
if (isset($_GET['accion']) && $_GET['accion']=="actualizar") {
	$instanciaControlador=new MaterialesController();
	$id=$_GET['id'];
	$instanciaControlador->verificarActualizar($id);
}

//Condicional encargada de ACTUALIZAR
if (isset($_POST['accion']) && $_POST['accion']=="actualizar") {
					
	$instanciaControlador=new MaterialesController();
	$fotoOriginal=$_POST['fotoOriginal'];
	$fotoOriginalUrl=$_POST['fotoOriginalUrl'];
	$foto=$_FILES['imagen']['name'];
	$fototemporal=$_FILES['imagen']['tmp_name'];
	$foto_url="../../frontend/files/materiales/" .$foto;
	if (empty($fototemporal)) {
		$foto=$fotoOriginal;
		$foto_url=$fotoOriginalUrl;
	}else{
		unlink($fotoOriginalUrl);
		copy($fototemporal,$foto_url);
	}
	$instanciaControlador->verificarActualizarInsertar(
		$_POST['id'],
		$_POST['material'],
		$_POST['cantidad'],
		$foto,
		$foto_url);


}
?>