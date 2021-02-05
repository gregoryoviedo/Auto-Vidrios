<?php
require '../../model/cliente/PedidosModel.php';
require '../public/IniciarController.php';
$instanciaIniciarController= new IniciarController();
if ($_SESSION['rol']=="administrador" OR $_SESSION['rol']=="empleado" OR empty($_SESSION['idusuario'])) {
	$instanciaIniciarController->redireccionarBloqueo();
}

class PedidosController extends PedidosModel{

	//Funcion encarga de INSERTA un nuevo administrador
	public function verificarAgregar($idusuario,$producto,$foto_url,$busqueda,$total,$cantidad,$id,$stock,$cantidad_original){
		$this->agregar($idusuario,$producto,$foto_url,$busqueda,$total,$cantidad,$cantidad_original,$id);
		$this->id=$id;
		$this->stock=$stock;
		$this->actualizarStock($id);
		echo "completado";
	}

	//funcion encargarda de ELIMINAR segun su ID
	public function verificarEliminar($id,$devolverStock,$id_producto) {
		$this->id=$id;
		$this->eliminar();
		$this->devolverStock=$devolverStock;
		$this->id_producto=$id_producto;
		$this->rellenarStock($devolverStock,$id_producto);
		$this->redireccionarMostrar();
	}

	//Funcion encargada de cargar la VISTAS
	public function verificarMostrar(){
		$productoObjeto=$this->mostrar();
		require '../../view/cliente/Pedidos.php';
	}
	//Funcion de redireccionar para recargar la pagina
	public function redireccionarMostrar(){
		header("location: PedidosController.php?accion=mostrar");
	}

	public function verificarSolicitud($id) {
		$this->id=$id;
		$productoModal=$this->solicitud();
		require '../../View/cliente/SolicitarProducto.php';
	}

	public function verificarListado($user){
		$this->user=$user;
		$objetoRetornado=$this->listado($user);
		require '../../view/cliente/MisPedidos.php';
	}

}
/*===========================
CONDICIONALES DEL CONTROLADOR
=========================== */

//Condicional encarga de MOSTRAR la vista
if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
	$instanciaControlador=new PedidosController();
	$instanciaControlador->verificarMostrar();
}

if (isset($_GET['accion']) && $_GET['accion']=="listado") {
	$instanciaControlador=new PedidosController();
	$user=$_SESSION['idusuario'];
	$instanciaControlador->verificarListado($user);
}

//Condicional encargada de AGREGAR y de VALIDAR los tipos de datos que llegan
if (isset($_POST['accion']) && $_POST['accion']=="agregar") {
	if ($_POST['busqueda'] !="" And $_POST['busqueda'] !=" " && $_POST['busqueda'][0] != " " && $_POST['cantidad'] !="" And $_POST['cantidad'] !=" " && $_POST['cantidad'][0] != " ") {
		$instanciaController= new PedidosController();
		$idusuario=$_SESSION['idusuario'];
		$producto=$_POST['producto'];
		$cantidad=$_POST['cantidad'];
		$foto_url=$_SESSION['foto_url'];
		$busqueda=$_POST['busqueda'];
		$precio=$_POST['precio'];
		$cantidad_original=$_POST['cantidad_original'];
		$id=$_POST['id'];
		$total=$precio * $cantidad;
		$stock=$cantidad_original-$cantidad;
		$hoy = date("Y-m-d");
		if ($hoy <= $busqueda) {
			if ($cantidad > $cantidad_original) {
			echo "Solo esta disponible ".$cantidad_original." ".$producto;
			}else {
				$instanciaController->verificarAgregar($idusuario,$producto,$foto_url,$busqueda,$total,$cantidad,$id,$stock,$cantidad_original);
			}
		}else{
			echo "Fecha invalida";
		}
	}else{
		echo "Existen campos en blanco";
	}
	
}

//Condicional encargada de ELIMINAR segun su ID
if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
	$instanciaControlador=new PedidosController();
	$id=$_GET['id'];
	$cantidad=$_GET['cantidad'];
	$cantidad_original=$_GET['cantidad_original'];
	$id_producto=$_GET['id_producto'];
	$devolverStock=$cantidad_original+$cantidad;
	$instanciaControlador->verificarEliminar($id,$devolverStock,$id_producto);
}

//Condicional encargada de recoger los datos para SOLICITAR 
if (isset($_GET['accion']) && $_GET['accion']=="pedir") {
	$instanciaControlador=new PedidosController();
	$id=$_GET['id'];
	$instanciaControlador->verificarSolicitud($id);
}
?>