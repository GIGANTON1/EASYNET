<?php
require('fpdf.php');
require_once "../conexionDB/conexion.php";
$resultados = $pdo->query("SELECT * FROM cliente");
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../imgs/logo_easynet.png',10,8,22);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(40,10,'EASY NET',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    // $this->Cell(65, 10, "Cliente", 1, 0, 'L', 0);
    // $this->Cell(40, 10, "R.T.N.", 1, 0, 'C', 0);
    // $this->Cell(90, 10, utf8_decode("Dirección"), 1, 1, 'C', 0);
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


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',7);

while ($row = $resultados->fetch(PDO::FETCH_ASSOC)) {
  $pdf->Cell(35, 7, $row['nombre_cliente'], 1, 0, 'L', 0);
  $pdf->Cell(18, 7, $row['rtn'], 1, 0, 'C', 0);
  $pdf->Cell(55, 7, $row['direccion'], 1, 0, 'C', 0);
  $pdf->Cell(25, 7, $row['contacto'], 1, 0, 'C', 0);
  $pdf->Cell(13, 7, $row['telefono'], 1, 0, 'C', 0);
  $pdf->Cell(45, 7, $row['correo'], 1, 1, 'C', 0);
  // code...
}



$pdf->Output();
?>
