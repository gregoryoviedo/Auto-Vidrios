<?php
require '../../config/conexion.php';

class HomeEmpleadoModel{

	protected $id;
	protected $idusuario;

	
	protected function mostrar(){
		$instanciarConexion=new Conexion();
		$query=$instanciarConexion->db->prepare("SELECT * FROM empleados WHERE idusuario='$this->user'");
		$query->execute();
		$objetoRetornado=$query->fetchAll(PDO::FETCH_OBJ);
		return $objetoRetornado;
	}

	protected function ultimasCitas(){
		$instanciarConexion=new Conexion();
		$query=$instanciarConexion->db->prepare("SELECT * FROM horarios ORDER BY id DESC");
		$query->execute();
		$ultimasCitas=$query->fetchAll(PDO::FETCH_OBJ);
		return $ultimasCitas;
	}

}
?>