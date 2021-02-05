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
    $this->Cell(70,10,'Lista de comentarios',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(20, 10, 'Usuario', 1, 0, 'C', 0);
	$this->Cell(70, 10, 'Nombre completo', 1, 0, 'C', 0);
    $this->Cell(100, 10, 'Correo', 1, 1, 'C', 0);

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
$consulta = "SELECT * FROM comentarios";
$resultado = $instancirConexion->db->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

foreach ($resultado as $row) {
	$pdf->Cell(20, 10, $row['idusuario'], 1, 0, 'C', 0);
	$pdf->Cell(70, 10, $row['comentario'], 1, 0, 'C', 0);
    $pdf->Cell(100, 10, $row['fecha'], 1, 1, 'C', 0);

}

$pdf->Output();

?>