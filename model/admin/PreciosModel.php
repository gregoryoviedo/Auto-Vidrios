<?php 
require '../../config/conexion.php';

class PreciosModel{

	protected $id;
	protected $servicio;
	protected $descripcion;
	protected $precio;
	protected $cantidad;
	protected $foto;
	protected $foto_url;

	/*===================================
	Funcioness del apartado de SERVICIOS
	====================================*/

	//Funcion de AGREGAR un nuevo SERVICIO a la base de datos
	protected function insertarServicio() {
		$instanciarConexion= new Conexion();

		$sql="INSERT INTO servicios (servicio, descripcion, precio, foto, foto_url) VALUES (?, ?, ?, ?, ?)";
		$insertar=$instanciarConexion->db->prepare($sql);
		$insertar->bindParam(1,$this->servicio);
		$insertar->bindParam(2,$this->descripcion);
		$insertar->bindParam(3,$this->precio);
		$insertar->bindParam(4,$this->foto);
		$insertar->bindParam(5,$this->foto_url);
		$insertar->execute();
	}

	//Funcion de LISTAR los SERVICIOS
	protected function buscarServicios() {
		$instanciarConexion= new Conexion();
		$mostrar=$instanciarConexion->db->prepare("SELECT * FROM servicios");
		$mostrar->execute();
		$objeto=$mostrar->fetchAll(PDO::FETCH_OBJ);
		return $objeto;
	}

	//Funcion para BORRAR un SERVICIO
	protected function borrarServicio() {
		$instanciarConexion= new Conexion();
		$sql="DELETE FROM servicios WHERE id='$this->id'";
		$borrar=$instanciarConexion->db->prepare($sql);
		$borrar->execute();
	}

	//Funcion para SELECCIONAR los datos para EDITAR
	protected function seleccionarDatos() {
		$instanciarConexion=new Conexion();
		$sql="SELECT * FROM servicios WHERE id='$this->id'";
		$datos=$instanciarConexion->db->prepare($sql);
		$datos->execute();
		$objetoEditar=$datos->fetchAll(PDO::FETCH_OBJ);
		return $objetoEditar;
	}

	//Funcion para ACTUALIZAR los datos de un SERVICIO
	protected function ActualizarCatalogo() {
		$instanciarConexion=new Conexion();
		$sql="UPDATE servicios SET servicio='$this->servicio', descripcion='$this->descripcion', precio='$this->precio', foto='$this->foto', foto_url='$this->foto_url' WHERE id='$this->id'";
		$actualizar=$instanciarConexion->db->prepare($sql);
		$actualizar->execute();
	}

	/*=================================
	Funciones del apartado de PRODUCTOS
	=================================*/

	//Funcion de AGREGAR un nuevo PRODUCTO a la base de datos
	protected function insertarProducto() {
		$instanciarConexion= new Conexion();
		$sql="INSERT INTO productos (producto, descripcion, precio, cantidad, foto, foto_url) VALUES (?, ?, ?, ?, ?, ?)";
		$insertar=$instanciarConexion->db->prepare($sql);
		$insertar->bindParam(1,$this->producto);
		$insertar->bindParam(2,$this->descripcion);
		$insertar->bindParam(3,$this->precio);
		$insertar->bindParam(4,$this->cantidad);
		$insertar->bindParam(5,$this->foto);
		$insertar->bindParam(6,$this->foto_url);
		$insertar->execute();
	}

	//Funcion de LISTAR los PRODUCTO
	protected function buscarProducto() {
		$instanciarConexion= new Conexion();
		$mostrar=$instanciarConexion->db->prepare("SELECT * FROM productos");
		$mostrar->execute();
		$productos=$mostrar->fetchAll(PDO::FETCH_OBJ);
		return $productos;
	}

	//Funcion para BORRAR un PRODUCTO
	protected function borrarProducto() {
		$instanciarConexion= new Conexion();
		$sql="DELETE FROM productos WHERE id='$this->id'";
		$borrar=$instanciarConexion->db->prepare($sql);
		$borrar->execute();
	}

	//Funcion para SELECCIONAR los datos para EDITAR
	protected function seleccionarDatosProducto() {
		$instanciarConexion=new Conexion();
		$sql="SELECT * FROM productos WHERE id='$this->id'";
		$datos=$instanciarConexion->db->prepare($sql);
		$datos->execute();
		$objetoEditar=$datos->fetchAll(PDO::FETCH_OBJ);
		return $objetoEditar;
	}

	//Funcion para ACTUALIZAR los datos de un PRODUCTO
	protected function ActualizarProducto() {
		$instanciarConexion=new Conexion();
		$sql="UPDATE productos SET producto='$this->producto', descripcion='$this->descripcion', precio='$this->precio', cantidad='$this->cantidad', foto='$this->foto', foto_url='$this->foto_url' WHERE id='$this->id'";
		$actualizar=$instanciarConexion->db->prepare($sql);
		$actualizar->execute();
	}
}

?>