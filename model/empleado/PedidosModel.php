<?php
require '../../config/conexion.php';

class PedidosModel{

	protected $id;
	protected $idusuario;

	
	protected function mostrar(){
		$instanciarConexion=new Conexion();
		$query=$instanciarConexion->db->prepare("SELECT * FROM pedidos");
		$query->execute();
		$objetoPedido=$query->fetchAll(PDO::FETCH_OBJ);
		return $objetoPedido;
	}

}
?>