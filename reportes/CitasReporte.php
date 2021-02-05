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
    $this->Cell(70,10,'Lista de citas',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(20, 10, 'Usuario', 1, 0, 'C', 0);
	$this->Cell(70, 10, 'Servicios', 1, 0, 'C', 0);
    $this->Cell(20, 10, 'Fecha', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Hora', 1, 0, 'C', 0);
    $this->Cell(50, 10, 'Empleado', 1, 1, 'C', 0);

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
$consulta = "SELECT * FROM horarios";
$resultado = $instancirConexion->db->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

foreach ($resultado as $row) {
	$pdf->Cell(20, 10, $row['idusuario'], 1, 0, 'C', 0);
	$pdf->Cell(70, 10, $row['servicio'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['fecha'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['hora'], 1, 0, 'C', 0);
    $pdf->Cell(50, 10, $row['empleado'], 1, 1, 'C', 0);

}

$pdf->Output();

?>