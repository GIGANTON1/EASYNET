<?php
require('fpdf.php');
require_once "../conexionDB/conexion.php";
$resultados = $pdo->query("SELECT * FROM cliente");
class PDF extends FPDF
{

// Cabecera de página
function Header()
{
    /* Logo*/
    $this->Image('../imgs/logo_nuevo.png',10,6,100);
    /* Arial bold 15 */
    $this->SetFont('Arial','B',24);
    /*Movernos a la derecha*/
    $this->Cell(125);
    /* titulo del pdf*/
    $this->Cell(120,30,'Lista de Clientes EasyNet',0,0,'');
    $ahora = date("d-m-Y H:i");
    date_default_timezone_set("America/Mexico_City");
    $this->SetFont('Arial','B',12);
    $this->Cell(-68,45,$ahora,0,0,'C');
    $this->SetFont('Arial','B',12);
    $this->Cell(-1,45,'Fecha y Hora:',0,0,'C');
    //Altura de la tabla, no lo toques
    $this->Ln(45);
    $this->SetFont('Arial','B',12);
     $this->Cell(45, 7, 'Empresa', 1, 0, 'C', 0);
  $this->Cell(35, 7, 'R.T.N.', 1, 0, 'C', 0);
  $this->Cell(95, 7, 'Direccion', 1, 0, 'C', 0);
  $this->Cell(30, 7, 'Contacto', 1, 0, 'C', 0);
  $this->Cell(22, 7, 'Telefono', 1, 0, 'C', 0);
  $this->Cell(48, 7, 'Correo', 1, 1, 'C', 0);

}
//Column titles

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


$pdf = new PDF('L');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('helvetica','',9);


/*TABLA DE CLIENTES*/
while ($row = $resultados->fetch(PDO::FETCH_ASSOC)) {
  $pdf->Cell(45, 7, $row['nombre_cliente'], 1, 0, 'L', 0);
  $pdf->Cell(35, 7, $row['rtn'], 1, 0, 'C', 0);
  $pdf->Cell(95, 7, $row['direccion'], 1, 0, 'C', 0);
  $pdf->Cell(30, 7, $row['contacto'], 1, 0, 'C', 0);
  $pdf->Cell(22, 7, $row['telefono'], 1, 0, 'C', 0);
  $pdf->Cell(48, 7, $row['correo'], 1, 1, 'C', 0);
}
$pdf->Output();
?>
