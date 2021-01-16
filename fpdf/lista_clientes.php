<?php
require('fpdf.php');
require_once "../conexionDB/conexion.php";
$resultados = $pdo->query("SELECT * FROM cliente");
class PDF extends FPDF
{
    function cabeceraHorizontal($cabecera)
    {
        $this->SetXY(10, 70);
        $this->SetFont('Arial','B',10);
        foreach($cabecera as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(24,7, utf8_decode($fila),1, 0 , 'L' );
        }
    }

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
    $this->Cell(25,40,'Lista de Clientes',0,0,'C');
    //Altura de la tabla, no lo toques
    $this->Ln(50);

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
$pdf->SetFont('helvetica','',10);
$cabecera = array('Nombre Cliente', 'R.T.N.', 'Dirección', 'Contacto', 'Teléfono', 'Correo');
$pdf->cabeceraHorizontal($cabecera);
/*TABLA DE CLIENTES*/
while ($row = $resultados->fetch(PDO::FETCH_ASSOC)) {
  $pdf->Cell(50, 7, $row['nombre_cliente'], 1, 0, 'L', 0);
  $pdf->Cell(35, 7, $row['rtn'], 1, 0, 'C', 0);
  $pdf->Cell(90, 7, $row['direccion'], 1, 0, 'C', 0);
  $pdf->Cell(30, 7, $row['contacto'], 1, 0, 'C', 0);
  $pdf->Cell(22, 7, $row['telefono'], 1, 0, 'C', 0);
  $pdf->Cell(48, 7, $row['correo'], 1, 1, 'C', 0);
}
$pdf->Output();
?>
