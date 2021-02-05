<?php
require '../../config/conexion.php';

class PedidosModel{

	protected $id;
	protected $idusuario;

	
	protected function mostrar(){
		$instanciarConexion=new Conexion();
		$query=$instanciarConexion->db->prepare("SELECT * FROM pedidos ORDER BY busqueda ASC");
		$query->execute();
		$objetoPedido=$query->fetchAll(PDO::FETCH_OBJ);
		return $objetoPedido;
	}

	protected function eliminar(){
		$instanciarConexion=new Conexion();
		$delete=$instanciarConexion->db->prepare("DELETE FROM pedidos WHERE id='$this->id'");
		$delete->execute();
	}

	protected function rellenarStock(){
		$instanciarConexion=new Conexion();
		$actualizarStock=$instanciarConexion->db->prepare("UPDATE productos SET cantidad='$this->devolverStock' WHERE id='$this->id_producto'");
		$actualizarStock->execute();
	}

}
?>