<?php 
require '../../config/conexion.php';

class CatalogoModel{
	protected $id;
	protected $servicio;
	protected $descripcion;
	protected $precio;
	protected $foto;
	protected $foto_url;

	protected function catalogoMostrar() {
		$instanciarConexion= new Conexion();
		$mostrar=$instanciarConexion->db->prepare("SELECT * FROM servicios");
		$mostrar->execute();
		$objeto=$mostrar->fetchAll(PDO::FETCH_OBJ);
		return $objeto;
	}

	protected function mostrarProductos() {
		$instanciarConexion= new Conexion();
		$mostrar=$instanciarConexion->db->prepare("SELECT * FROM productos");
		$mostrar->execute();
		$productos=$mostrar->fetchAll(PDO::FETCH_OBJ);
		return $productos;
	}

}
?>