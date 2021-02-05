<?php
require '../../config/conexion.php';

class ComentariosModel{

	public $id;
	public $idusuario;
	public $foto;
	public $foto_url;
	public $comentario;
	
	public function __construct(){
		
	}

	public function agregar($idusuario,$foto_url,$comentario){
		$this->idusuario=$idusuario;
		$this->foto_url=$foto_url;
		$this->comentario=$comentario;

		$instanciarConexion=new Conexion();
		$insertar=$instanciarConexion->db->prepare("INSERT INTO comentarios(idusuario,foto_url,comentario) VALUES (?, ?, ?)");
		$insertar->bindParam(1,$this->idusuario);
		$insertar->bindParam(2,$this->foto_url);
		$insertar->bindParam(3,$this->comentario);
		$insertar->execute();
	}

	public function mostrar(){
		$instanciarConexion=new Conexion();
		$comentarios=$instanciarConexion->db->prepare("SELECT * FROM comentarios");
		$comentarios->execute();
		$objetoComentarios=$comentarios->fetchAll(PDO::FETCH_OBJ);
		return $objetoComentarios;
	}

	public function eliminar(){
		$instanciarConexion=new Conexion();
		$delete=$instanciarConexion->db->prepare("DELETE FROM comentarios WHERE id='$this->id'");
		$delete->execute();
	}
	
	public function actualizar(){
		$instanciarConexion=new Conexion();
		$actualizar=$instanciarConexion->db->prepare("SELECT * FROM comentarios WHERE id='$this->id'");
		$actualizar->execute();
		$actualizacion=$actualizar->fetchAll(PDO::FETCH_OBJ);
		return $actualizacion;
	}

	public function actualizarInsertar() {
		$instanciarConexion= new Conexion();
		$actualizacion=$instanciarConexion->db->prepare("UPDATE comentarios SET comentario='$this->comentario' WHERE id='$this->id'");
		$actualizacion->execute();
	}
}
?>