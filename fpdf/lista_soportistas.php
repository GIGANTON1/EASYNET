<?php
require('fpdf.php');
require_once "../conexionDB/conexion.php";
$resultados = $pdo->query("SELECT usuarios.usuario, cargos.cargos, estado_usuario.estado FROM easy_net.usuarios 
    inner join easy_net.cargos on easy_net.usuarios.cargos_id = easy_net.cargos.id_cargos
    inner join easy_net.estado_usuario on easy_net.usuarios.estado_id = easy_net.estado_usuario.id_estado");
$ahora = date("Y-m-d H:i:s");
date_default_timezone_set("America/Mexico_City");
$ahora = date("Y-m-d H:i:s");

class PDF extends FPDF

{
    function cabeceraHorizontal($cabecera)
    {
        $this->SetXY(10, 70);
        $this->SetFont('Arial','B',10);
        }

// Cabecera de página
function Header()
{

    /* Logo*/
    $this->Image('../imgs/logo_nuevo.png',10,6,100);
    /* Arial bold 15 */
    $this->SetFont('Arial','B',18);
    /*Movernos a la derecha*/
    $this->Cell(130);
    /* titulo del pdf*/
    $this->Cell(25,30,'Lista de Soportistas EasyNet',0,0,'C');
    $ahora = date("d-m-Y H:i");
    date_default_timezone_set("America/Mexico_City");
    $this->SetFont('Arial','B',12);
    $this->Cell(-1,45,$ahora,0,0,'C');
    $this->SetFont('Arial','B',12);
    $this->Cell(-66,45,'Fecha y Hora:',0,0,'C');
    //Altura de la tabla, no lo toques
    $this->Ln(38);
    $this->SetFont('Arial','B',12);
  $this->Cell(60, 7, 'Nombre del Soportista', 1, 0, 'L', 0);
  $this->Cell(65, 7, 'Cargo', 1, 0, 'C', 0);
  $this->Cell(60, 7, 'Estado', 1, 1, 'C', 0);

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


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('helvetica','',12);
/*TABLA DE CLIENTES*/
while ($row = $resultados->fetch(PDO::FETCH_ASSOC)) {
  $pdf->Cell(60, 7, $row['usuario'], 1, 0, 'L', 0);
  $pdf->Cell(65, 7, $row['cargos'], 1, 0, 'C', 0);
  $pdf->Cell(60, 7, $row['estado'], 1, 1, 'C', 0);
}
$pdf->Output();
?>
