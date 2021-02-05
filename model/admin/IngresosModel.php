<?php
require '../../config/conexion.php';
class IngresosModel{

	protected $id;
	protected $idusuario;
	protected $empleado;
	protected $servicio;
	protected $descripcion;
	protected $cliente;
	protected $monto;

	//funcion para MOSTRAR todos los cliente del sistema
	protected function mostrar(){
		$instanciarConexion=new Conexion();
		$datosUsuario=$instanciarConexion->db->prepare("SELECT * FROM ingresos");
		$datosUsuario->execute();
		$usuarioObjeto=$datosUsuario->fetchAll(PDO::FETCH_OBJ); 	//metodo para transformarlo en objeto
		return $usuarioObjeto;
    }
    
    protected function traerEmpleado(){
		$instanciarConexion=new Conexion();
		$datosUsuario=$instanciarConexion->db->prepare("SELECT idusuario FROM empleados");
		$datosUsuario->execute();
		$objetoEmpleado=$datosUsuario->fetchAll(PDO::FETCH_OBJ); 	//metodo para transformarlo en objeto
		return $objetoEmpleado;
    }
    
    protected function traerServicio(){
		$instanciarConexion=new Conexion();
		$datosUsuario=$instanciarConexion->db->prepare("SELECT servicio FROM servicios");
		$datosUsuario->execute();
		$objetoServicio=$datosUsuario->fetchAll(PDO::FETCH_OBJ); 	//metodo para transformarlo en objeto
		return $objetoServicio;
	}

	//funcion para INSERTAR un nuevo cliente al sistema
	protected function agregar($idusuario,$empleado,$servicio,$descripcion,$cliente,$monto){

		//asignacion de propiedades a una variable
        $instanciarConexion=new Conexion();
        $this->idusuario=$idusuario;
        $this->empleado=$empleado;
        $this->servicio=$servicio;
		$this->descripcion=$descripcion;
		$this->cliente=$cliente;
        $this->monto=$monto;
        

        $insertar=$instanciarConexion->db->prepare("INSERT INTO ingresos (idusuario,empleado,servicio,descripcion,cliente,monto) VALUES (?, ?, ?, ?, ?, ?)");
        $insertar->bindParam(1,$this->idusuario);
        $insertar->bindParam(2,$this->empleado);
        $insertar->bindParam(3,$this->servicio);
        $insertar->bindParam(4,$this->descripcion);
        $insertar->bindParam(5,$this->cliente);
        $insertar->bindParam(6,$this->monto);
        $insertar->execute();
    }    

	//funcion para ELIMINAR algun cliente segun su id
	protected function eliminar(){
		$instanciarConexion=new Conexion();
		$delete=$instanciarConexion->db->prepare("DELETE FROM ingresos WHERE id='$this->id'");
		$delete->execute();
	}

	//funcion para SELECCIONAR los datos del cliente por su id
	protected function actualizar(){
		$instanciarConexion=new Conexion();
		$actualizar=$instanciarConexion->db->prepare("SELECT * FROM ingresos WHERE id='$this->id'");
		$actualizar->execute();
		$actualizarObjeto=$actualizar->fetchAll(PDO::FETCH_OBJ); 	//metodo para transformarlo en objeto
		return $actualizarObjeto;
	}

	//funciona para ACTUALIZAR los datos del cliente segun su id
	protected function actualizarInsertar() {
		$instanciarConexion= new Conexion();
		$actualizacion=$instanciarConexion->db->prepare("UPDATE ingresos SET idusuario='$this->idusuario', empleado='$this->empleado', servicio='$this->servicio', descripcion='$this->descripcion', cliente='$this->cliente', monto='$this->monto' WHERE id='$this->id'");
		$actualizacion->execute();
	}
}
?>