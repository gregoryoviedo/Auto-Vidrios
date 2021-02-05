<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Lista de ingresos',0,0,'C');
    // Salto de línea
    $this->Ln(20);

	$this->Cell(30, 10, 'Fecha', 1, 0, 'C', 0);
    $this->Cell(35, 10, 'Empleado', 1, 0, 'C', 0);
    $this->Cell(55, 10, 'Servicio', 1, 0, 'C', 0);
    $this->Cell(40, 10, 'Cliente', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Monto', 1, 1, 'C', 0);

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require "../config/conexion.php";
$instancirConexion= new Conexion();
$consulta = "SELECT * FROM ingresos";
$resultado = $instancirConexion->db->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

foreach ($resultado as $row) {
	$pdf->Cell(30, 10, $row['fecha'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['empleado'], 1, 0, 'C', 0);
    $pdf->Cell(55, 10, $row['servicio'], 1, 0, 'C', 0); 
    $pdf->Cell(40, 10, $row['cliente'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['monto'], 1, 1, 'C', 0);
}

$pdf->Output();

?>