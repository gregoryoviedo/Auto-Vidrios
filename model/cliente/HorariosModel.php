<?php
require '../../config/conexion.php';
class HorariosModel{
	protected $idusuario;
	protected $servicio;
	protected $fecha;
	protected $hora;
    protected $empleado;

    //consulta sql de la valicacion del IDUSUARIO
	protected function validarServicio($servicio) {
        $instanciarConexion=new Conexion();
        $this->servicio=$servicio;
		$resultados=$instanciarConexion->db->prepare("SELECT servicio FROM horarios WHERE servicio='$servicio'");
		$resultados->execute();
		$validacionServicio=$resultados->fetchAll(PDO::FETCH_OBJ); 	//metodo para transformarlo en objeto
		return $validacionServicio;
    }
    
     //consulta sql de la valicacion del IDUSUARIO
	protected function validarFecha($fecha) {
        $instanciarConexion=new Conexion();
        $this->fecha=$fecha;
		$resultados=$instanciarConexion->db->prepare("SELECT fecha FROM horarios WHERE fecha='$fecha'");
		$resultados->execute();
		$validacionFecha=$resultados->fetchAll(PDO::FETCH_OBJ); 	//metodo para transformarlo en objeto
		return $validacionFecha;
    }
    
     //consulta sql de la valicacion del IDUSUARIO
	protected function validarHora($hora) {
        $instanciarConexion=new Conexion();
        $this->hora=$hora;
		$resultados=$instanciarConexion->db->prepare("SELECT hora FROM horarios WHERE hora='$hora'");
		$resultados->execute();
		$validacionHora=$resultados->fetchAll(PDO::FETCH_OBJ); 	//metodo para transformarlo en objeto
		return $validacionHora;
    }
    
     //consulta sql de la valicacion del IDUSUARIO
	protected function validarEmpleado($empleado) {
        $instanciarConexion=new Conexion();
        $this->empleado=$empleado;
		$resultados=$instanciarConexion->db->prepare("SELECT empleado FROM horarios WHERE empleado='$empleado'");
		$resultados->execute();
		$validacionEmpleado=$resultados->fetchAll(PDO::FETCH_OBJ); 	//metodo para transformarlo en objeto
		return $validacionEmpleado;
	}

	protected function agregar($idusuario,$servicio,$fecha,$hora,$empleado){

        $this->idusuario=$idusuario;
        $this->servicio=$servicio;
        $this->fecha=$fecha;
        $this->hora=$hora;
        $this->empleado=$empleado;

        $instanciarConexion=new Conexion();
        $insertar=$instanciarConexion->db->prepare("INSERT INTO horarios (idusuario,servicio,fecha,hora,empleado) VALUES (?, ?, ?, ?, ?)");
        $insertar->bindParam(1,$this->idusuario);
        $insertar->bindParam(2,$this->servicio);
        $insertar->bindParam(3,$this->fecha);
        $insertar->bindParam(4,$this->hora);
        $insertar->bindParam(5,$this->empleado);
        $insertar->execute();
    }

    protected function mostrarEmpleado(){
        $instanciarConexion= new Conexion();
        $mostrarEmpleado=$instanciarConexion->db->prepare('SELECT idusuario FROM empleados WHERE rol="empleado"');
        $mostrarEmpleado->execute();
        $empleadoObjeto=$mostrarEmpleado->fetchAll(PDO::FETCH_OBJ);
        return $empleadoObjeto;
    }

    protected function mostrarCita() {
        $instanciarConexion= new Conexion();
        $cita=$instanciarConexion->db->prepare("SELECT * FROM horarios WHERE idusuario='$this->user'");
        $cita->execute();
        $citaObjeto=$cita->fetchAll(PDO::FETCH_OBJ);
        return $citaObjeto;
    }

    protected function eliminar() {
        $instanciarConexion= new Conexion();
        $cancelar=$instanciarConexion->db->prepare("DELETE FROM horarios WHERE id='$this->id'");
        $cancelar->execute();
    }

    protected function disponibilidad(){
        $instanciarConexion= new Conexion();
        $sql=$instanciarConexion->db->prepare("SELECT fecha, hora, empleado FROM horarios WHERE fecha='$this->fecha', hora='$this->hora', empleado='$this->empleado'");
        $sql->execute();
        $validarDisponibilidad=$sql->fetchAll(PDO::FETCH_OBJ);
        return $validarDisponibilidad;
    }

}

?>
