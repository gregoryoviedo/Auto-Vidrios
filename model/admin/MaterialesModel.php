<?php
require '../../config/conexion.php';

class MaterialesModel{

	public $id;
	public $material;
	public $cantidad;
	public $foto;
	public $foto_url;
	

	protected function agregar($material,$cantidad,$foto,$foto_url){
		
		$this->material=$material;
		$this->cantidad=$cantidad;
		$this->foto=$foto;
		$this->foto_url=$foto_url;

	
		$instanciarConexion=new Conexion();
		$newPassword=password_hash($this->password, PASSWORD_DEFAULT);
		$insertar=$instanciarConexion->db->prepare("INSERT INTO materiales (material,cantidad,foto,foto_url) VALUES (?, ?, ?, ?)");
		$insertar->bindParam(1,$this->material);
		$insertar->bindParam(2,$this->cantidad);
		$insertar->bindParam(3,$this->foto);
		$insertar->bindParam(4,$this->foto_url);
		$insertar->execute();
	}

	protected function mostrar(){
		$instanciarConexion=new Conexion();
		$datosAdmin=$instanciarConexion->db->prepare("SELECT * FROM materiales");
		$datosAdmin->execute();
		$adminObjeto=$datosAdmin->fetchAll(PDO::FETCH_OBJ);
		return $adminObjeto;
	}

	protected function eliminar(){
		$instanciarConexion=new Conexion();
		$delete=$instanciarConexion->db->prepare("DELETE FROM materiales WHERE id='$this->id'");
		$delete->execute();
	}
	
	protected function actualizar(){
		$instanciarConexion=new Conexion();
		$actualizar=$instanciarConexion->db->prepare("SELECT * FROM materiales WHERE id='$this->id'");
		$actualizar->execute();
		$actualizarObjeto=$actualizar->fetchAll(PDO::FETCH_OBJ);
		return $actualizarObjeto;
	}

	protected function actualizarInsertar() {
		$instanciarConexion= new Conexion();
		$actualizacion=$instanciarConexion->db->prepare("UPDATE materiales SET material='$this->material', cantidad='$this->cantidad', foto='$this->foto', foto_url='$this->foto_url' WHERE id='$this->id'");
		$actualizacion->execute();
	}
}
?>