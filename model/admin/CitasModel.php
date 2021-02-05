<?php
require '../../config/conexion.php';
class CitasModel{

	public $id;
	public $idusuario;
	public $servicio;
	public $fecha;
	public $hora;
	
	public function __construct(){
		
	}

	public function mostrar(){
		$instanciarConexion=new Conexion();
		$datosUsuario=$instanciarConexion->db->prepare("SELECT * FROM horarios ORDER BY fecha ASC, hora DESC");
		$datosUsuario->execute();
		$usuarioObjeto=$datosUsuario->fetchAll(PDO::FETCH_OBJ);
		return $usuarioObjeto;
	}

	public function eliminar(){
		$instanciarConexion=new Conexion();
		$delete=$instanciarConexion->db->prepare("DELETE FROM horarios WHERE id='$this->id'");
		$delete->execute();
	}

}
?>