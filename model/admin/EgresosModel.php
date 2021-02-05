<?php
require '../../config/conexion.php';
class EgresosModel{

	protected $id;
	protected $idusuario;
	protected $material;
	protected $cantidad;
	protected $cantidad_original;
	protected $gastado;


	//funcion para MOSTRAR todos los foto_url del sistema
	protected function mostrar(){
		$instanciarConexion=new Conexion();
		$datosUsuario=$instanciarConexion->db->prepare("SELECT * FROM egresos");
		$datosUsuario->execute();
		$usuarioObjeto=$datosUsuario->fetchAll(PDO::FETCH_OBJ); 	//metodo para transformarlo en objeto
		return $usuarioObjeto;
	}
	
	protected function mostrarMaterial(){
		$instanciarConexion=new Conexion();
		$datosUsuario=$instanciarConexion->db->prepare("SELECT * FROM materiales");
		$datosUsuario->execute();
		$objetoMaterial=$datosUsuario->fetchAll(PDO::FETCH_OBJ); 	//metodo para transformarlo en objeto
		return $objetoMaterial;
    }
    
	//funcion para INSERTAR un nuevo foto_url al sistema
	protected function agregar($idusuario,$material,$cantidad,$id,$cantidad_original){

		//asignacion de propiedades a una variable
        $instanciarConexion=new Conexion();
        $this->idusuario=$idusuario;
        $this->material=$material;
		$this->cantidad=$cantidad;
		$this->cantidad_original=$cantidad_original;
		$this->id=$id;

        $insertar=$instanciarConexion->db->prepare("INSERT INTO egresos (id_material,idusuario,material,cantidad,cantidad_original) VALUES (?, ?, ?, ?, ?)");
		$insertar->bindParam(1,$this->id);
		$insertar->bindParam(2,$this->idusuario);
        $insertar->bindParam(3,$this->material);
		$insertar->bindParam(4,$this->cantidad);
		$insertar->bindParam(5,$this->cantidad_original);
        $insertar->execute();
    }    

	//funcion para ELIMINAR algun cliente segun su id
	protected function eliminar(){
		$instanciarConexion=new Conexion();
		$delete=$instanciarConexion->db->prepare("DELETE FROM egresos WHERE id='$this->id'");
		$delete->execute();
	}

	//funcion para SELECCIONAR los datos del cliente por su id
	protected function actualizar(){
		$instanciarConexion=new Conexion();
		$actualizar=$instanciarConexion->db->prepare("SELECT * FROM egresos WHERE id='$this->id'");
		$actualizar->execute();
		$actualizarObjeto=$actualizar->fetchAll(PDO::FETCH_OBJ); 	//metodo para transformarlo en objeto
		return $actualizarObjeto;
	}

	//funcion para SELECCIONAR los datos del cliente por su id
	protected function verMaterial(){
		$instanciarConexion=new Conexion();
		$actualizar=$instanciarConexion->db->prepare("SELECT * FROM materiales WHERE id='$this->id'");
		$actualizar->execute();
		$objetoRetornado=$actualizar->fetchAll(PDO::FETCH_OBJ); 	//metodo para transformarlo en objeto
		return $objetoRetornado;
	}

	//funciona para ACTUALIZAR los datos del cliente segun su id
	protected function actualizarInsertar() {
		$instanciarConexion= new Conexion();
		$actualizacion=$instanciarConexion->db->prepare("UPDATE egresos SET idusuario='$this->idusuario', cantidad='$this->cantidad' WHERE id='$this->id'");
		$actualizacion->execute();
	}

	protected function restarStock() {
		$instanciarConexion= new Conexion();
		$actualizacion=$instanciarConexion->db->prepare("UPDATE materiales SET cantidad='$this->gastado' WHERE id='$this->id'");
		$actualizacion->execute();
	}
	
	protected function restaurarStock() {
		$instanciarConexion= new Conexion();
		$actualizacion=$instanciarConexion->db->prepare("UPDATE materiales SET cantidad='$this->renovado' WHERE id='$this->id_material'");
		$actualizacion->execute();
	}

	protected function DevolverStock() {
		$instanciarConexion= new Conexion();
		$actualizacion=$instanciarConexion->db->prepare("UPDATE materiales SET cantidad='$this->resultado' WHERE id='$this->id_material'");
		$actualizacion->execute();
	}

	protected function SumarStock() {
		$instanciarConexion= new Conexion();
		$actualizacion=$instanciarConexion->db->prepare("UPDATE materiales SET cantidad='$this->resultado' WHERE id='$this->id_material'");
		$actualizacion->execute();
	}
}
?>