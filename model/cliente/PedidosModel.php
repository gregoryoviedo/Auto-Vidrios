<?php
require '../../config/conexion.php';

class PedidosModel{

	protected $id;
	protected $idusuario;
	protected $producto;
	protected $precio;
	protected $cantidad;
	protected $total;
	protected $foto_url;
	protected $busqueda;
	protected $cantidad_original;
	
	protected function agregar($idusuario,$producto,$foto_url,$busqueda,$total,$cantidad,$cantidad_original,$id){
		
		$this->idusuario=$idusuario;
		$this->producto=$producto;
		$this->foto_url=$foto_url;
		$this->cantidad=$cantidad;
		$this->total=$total;
		$this->busqueda=$busqueda;
		$this->cantidad_original=$cantidad_original;
		$this->id=$id;

		$instanciarConexion=new Conexion();
		$insertar=$instanciarConexion->db->prepare("INSERT INTO pedidos (id_producto,idusuario,producto,foto_url,cantidad_original,cantidad,total,busqueda) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		$insertar->bindParam(1,$this->id);
		$insertar->bindParam(2,$this->idusuario);
		$insertar->bindParam(3,$this->producto);
		$insertar->bindParam(4,$this->foto_url);
		$insertar->bindParam(5,$this->cantidad_original);
		$insertar->bindParam(6,$this->cantidad);
		$insertar->bindParam(7,$this->total);
		$insertar->bindParam(8,$this->busqueda);
		$insertar->execute();
	}

	protected function actualizarStock(){
		$instanciarConexion=new Conexion();
		$actualizarStock=$instanciarConexion->db->prepare("UPDATE productos SET cantidad='$this->stock' WHERE id='$this->id'");
		$actualizarStock->execute();
	}

	protected function mostrar(){
		$instanciarConexion=new Conexion();
		$query=$instanciarConexion->db->prepare("SELECT * FROM productos");
		$query->execute();
		$productoObjeto=$query->fetchAll(PDO::FETCH_OBJ);
		return $productoObjeto;
	}

	protected function listado(){
		$instanciarConexion=new Conexion();
		$query=$instanciarConexion->db->prepare("SELECT * FROM pedidos WHERE idusuario='$this->user'");
		$query->execute();
		$objetoRetornado=$query->fetchAll(PDO::FETCH_OBJ);
		return $objetoRetornado;
	}

	protected function solicitud(){
		$instanciarConexion=new Conexion();
		$producto=$instanciarConexion->db->prepare("SELECT * FROM productos WHERE id='$this->id'");
		$producto->execute();
		$productoModal=$producto->fetchAll(PDO::FETCH_OBJ);
		return $productoModal;
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