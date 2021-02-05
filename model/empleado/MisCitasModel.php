<?php 
require '../../config/conexion.php';
class MisCitasModel{
	protected $id;
	protected $user;
	protected $servicio;
	protected $fecha;
	protected $hora;
    protected $empleado;

    protected function mostrarCita() {
        $instanciarConexion= new Conexion();
        $cita=$instanciarConexion->db->prepare("SELECT * FROM horarios WHERE empleado='$this->user'");
        $cita->execute();
        $citaObjeto=$cita->fetchAll(PDO::FETCH_OBJ);
        return $citaObjeto;
    }

    protected function eliminar() {
        $instanciarConexion= new Conexion();
        $cancelar=$instanciarConexion->db->prepare("DELETE FROM horarios WHERE id='$this->id'");
        $cancelar->execute();
    }

}

?>