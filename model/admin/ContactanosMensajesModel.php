<?php
require '../../config/conexion.php';

class ContactanosMensajesModel{

	public $id;
	public $nombre;
	public $correo;
	public $asunto;
	public $mensaje;
	public $fecha;
	
	public function __construct(){
		
	}


	public function mostrar(){
		$instanciarConexion=new Conexion();
		$mostrarMensaje=$instanciarConexion->db->prepare("SELECT * FROM contactanos");
		$mostrarMensaje->execute();
		$mensajeObjeto=$mostrarMensaje->fetchAll(PDO::FETCH_OBJ);
		return $mensajeObjeto;
	}

	public function eliminar(){
		$instanciarConexion=new Conexion();
		$delete=$instanciarConexion->db->prepare("DELETE FROM contactanos WHERE id='$this->id'");
		$delete->execute();
	}

	public function verMas(){
		$instanciarConexion=new Conexion();
		$verMas=$instanciarConexion->db->prepare("SELECT * FROM contactanos WHERE id='$this->id'");
		$verMas->execute();
		$unicoObjeto=$verMas->fetchAll(PDO::FETCH_OBJ);
		return $unicoObjeto;
	}
	
}
?>