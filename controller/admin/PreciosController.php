<?php 
require '../../model/admin/PreciosModel.php';
require '../public/IniciarController.php';

//Verificacion de INICIO DE SESION
$instanciaIniciarController= new IniciarController();
if ($_SESSION['rol']=="cliente" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class PreciosController extends PreciosModel{

	//Funcion de cargar la VISTA
	public function ListaServicios() {
		$objeto = $this->buscarServicios();
		$productos=$this->buscarProducto();
		require '../../view/admin/Precios.php';
	}

	/*===================================
	Funcioness del apartado de SERVICIOS
	====================================*/

	//Funciona para AGREGAR un SERVICIO
	public function SaveInfoForModel($servicio,$descripcion,$precio,$foto,$foto_url) {
		$this->servicio=$servicio;
		$this->descripcion=$descripcion;
		$this->precio=$precio;
		$this->foto=$foto;
		$this->foto_url=$foto_url;
		$this->insertarServicio();
		$this->redireccionPrecios();
	}

	//Funcion para ELIMINAR un SERVICIO
	public function verificarBorrar($id) {
		$this->id=$id;
		$this->borrarServicio();
		$this->redireccionPrecios();
	}

	//Funcion para SELECCIONAR kis datos de editar
	public function verificarDatosEditar($id) {
		$this->id=$id;
		$objetoEditar=$this->seleccionarDatos();
		require '../../view/admin/EditarCatalogo.php';
	}

	//Funcionar para ACTUALIZAR un SERVICIO
	public function GuardarCambiosCatalogo($id,$servicio,$descripcion,$precio,$foto,$foto_url) {
		$this->id=$id;
		$this->servicio=$servicio;
		$this->descripcion=$descripcion;
		$this->precio=$precio;
		$this->foto=$foto;
		$this->foto_url=$foto_url;
		$this->ActualizarCatalogo();
		$this->redireccionPrecios();
	}

	/*=================================
	Funciones del apartado de PRODUCTOS
	=================================*/

	//Funciona para AGREGAR un PRODUCTO
	public function AgregarProducto($producto,$descripcion,$precio,$cantidad,$foto,$foto_url) {
		$this->producto=$producto;
		$this->descripcion=$descripcion;
		$this->precio=$precio;
		$this->cantidad=$cantidad;
		$this->foto=$foto;
		$this->foto_url=$foto_url;
		$this->insertarProducto();
		$this->redireccionPrecios();
	}
	
	//Funcion para ELIMINAR un PRODUCTO
	public function verificarBorrarProducto($id) {
		$this->id=$id;
		$this->borrarProducto();
		$this->redireccionPrecios();
	}

	//Funcion para SELECCIONAR kis datos de editar
	public function verificarDatosEditarProducto($id) {
		$this->id=$id;
		$objetoEditar=$this->seleccionarDatosProducto();
		require '../../view/admin/EditarProducto.php';
	}

	//Funcionar para ACTUALIZAR un PRODUCTO
	public function GuardarCambiosProducto($id,$producto,$descripcion,$precio,$cantidad,$foto,$foto_url) {
		$this->id=$id;
		$this->producto=$producto;
		$this->descripcion=$descripcion;
		$this->precio=$precio;
		$this->cantidad=$cantidad;
		$this->foto=$foto;
		$this->foto_url=$foto_url;
		$this->actualizarProducto();
		$this->redireccionPrecios();
	}

	//Funcion de direccionar a la vista
	public function redireccionPrecios() {
		header("location: PreciosController.php?accion=view");
	}
	
}

//Encargada de llamar a la vista
if (isset($_GET['accion']) && $_GET['accion']=="view") {
	$instanciaControlador= new PreciosController();
	$instanciaControlador->ListaServicios();
}

/*=====================================
Condicionales del apartado de SERVICIOS
======================================*/

//Condicional para AGREGAR un nuevo SERVICIO
if (isset($_POST['accion']) && $_POST['accion']=="insertar") {
	$instanciaControlador= new PreciosController();
	$foto=$_FILES['imagen']['name'];
	$fototemporal=$_FILES['imagen']['tmp_name'];
	$foto_url="../../frontend/files/servicios/" .$foto;
	copy($fototemporal,$foto_url);
	$instanciaControlador->SaveInfoForModel(
		$_POST['servicio'],
		$_POST['descripcion'],
		$_POST['precio'],
		$foto,
		$foto_url);
}

//Condicional para ELIMINAR un SERVICIO
if (isset($_GET['accion']) && $_GET['accion']=="borrar") {
	$instanciaControlador=new PreciosController();
	$eliminarFoto='../../frontend/files/servicios/'.$_GET['foto'];
	unlink($eliminarFoto);
	$instanciaControlador->verificarBorrar($_GET['id']);
}

//Condicional para traer la vista de editar
if (isset($_GET['accion']) && $_GET['accion']=="editar") {
	$instanciaControlador=new PreciosController();
	$instanciaControlador->verificarDatosEditar($_GET['id']);
}

//Condicional para ACTUALIZAR un SERVICIO
if (isset($_POST['accion']) && $_POST['accion']=="actualizar") {
	$instanciaControlador= new PreciosController();
	$fotoOriginal=$_POST['fotoOriginal'];
	$fotoOriginalUrl=$_POST['fotoOriginalUrl'];
	$foto=$_FILES['imagen']['name'];
	$fototemporal=$_FILES['imagen']['tmp_name'];
	$foto_url="../../frontend/files/servicios/" .$foto;
	if (empty($fototemporal)) {
		$foto=$fotoOriginal;
		$foto_url=$fotoOriginalUrl;
	}else{
		unlink($fotoOriginalUrl);
		copy($fototemporal,$foto_url);
	}

	$instanciaControlador->GuardarCambiosCatalogo(
		$_POST['id'],
		$_POST['servicio'],
		$_POST['descripcion'],
		$_POST['precio'],
		$foto,
		$foto_url);
}

/*=====================================
Condicionales del apartado de PRODUCTO
======================================*/

//condicional para AGREGAR un nuevo PRODUCTO
if (isset($_POST['accion']) && $_POST['accion']=="insertarProducto") {
	$instanciaControlador= new PreciosController();
	$foto=$_FILES['imagen']['name'];
	$fototemporal=$_FILES['imagen']['tmp_name'];
	$foto_url="../../frontend/files/productos/" .$foto;
	copy($fototemporal,$foto_url);
	$instanciaControlador->AgregarProducto(
		$_POST['producto'],
		$_POST['descripcion'],
		$_POST['precio'],
		$_POST['cantidad'],
		$foto,
		$foto_url);
}

//Condicional para ELIMINAR un PRODUCTO
if (isset($_GET['accion']) && $_GET['accion']=="borrarProducto") {
	$instanciaControlador=new PreciosController();
	$eliminarFoto='../../frontend/files/productos/'.$_GET['foto'];
	unlink($eliminarFoto);
	$instanciaControlador->verificarBorrarProducto($_GET['id']);
}

//Condicional para traer la vista de editar
if (isset($_GET['accion']) && $_GET['accion']=="editarProducto") {
	$instanciaControlador=new PreciosController();
	$instanciaControlador->verificarDatosEditarProducto($_GET['id']);
}

//Condicional para ACTUALIZAR un PRODUCTO
if (isset($_POST['accion']) && $_POST['accion']=="actualizarProducto") {
	$instanciaControlador= new PreciosController();
	$fotoOriginal=$_POST['fotoOriginal'];
	$fotoOriginalUrl=$_POST['fotoOriginalUrl'];
	$foto=$_FILES['imagen']['name'];
	$fototemporal=$_FILES['imagen']['tmp_name'];
	$foto_url="../../frontend/files/productos/" .$foto;
	if (empty($fototemporal)) {
		$foto=$fotoOriginal;
		$foto_url=$fotoOriginalUrl;
	}else{
		unlink($fotoOriginalUrl);
		copy($fototemporal,$foto_url);
	}

	$instanciaControlador->GuardarCambiosProducto(
		$_POST['id'],
		$_POST['producto'],
		$_POST['descripcion'],
		$_POST['precio'],
		$_POST['cantidad'],
		$foto,
		$foto_url);
}

?>