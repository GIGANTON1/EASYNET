<?php
require('fpdf.php');
require_once "../conexionDB/conexion.php";
session_start();
$iniciado = isset($_SESSION['iniciado'])? $_SESSION['iniciado']: false;
$resultados = $pdo->query("SELECT 
bitacora.nombre_cliente, bitacora.contacto_soporte,
bitacora.motivo, bitacora.solucion, bitacora.fecha, bitacora.estado_soporte_id, tipo_soporte.soporte, usuarios.usuario, estado_soporte.estado_soporte
FROM easy_net.bitacora
inner join easy_net.tipo_soporte on easy_net.bitacora.tipo_soporte_id = easy_net.tipo_soporte.id_soporte
inner join easy_net.usuarios on easy_net.bitacora.usuarios_id = easy_net.usuarios.id_usuario 
inner join easy_net.estado_soporte on easy_net.bitacora.estado_soporte_id = easy_net.estado_soporte.id_estado_soporte where usuario = '" . $_SESSION['iniciado'] . "'  ORDER BY FECHA DESC");

// $resultados = $pdo->query("SELECT 
// bitacora.nombre_cliente, bitacora.contacto_soporte,
// bitacora.motivo, bitacora.solucion, bitacora.fecha, bitacora.estado_soporte_id, tipo_soporte.soporte, usuarios.usuario
// FROM easy_net.bitacora
// inner join easy_net.tipo_soporte on easy_net.bitacora.tipo_soporte_id = easy_net.tipo_soporte.id_soporte
// inner join easy_net.usuarios on easy_net.bitacora.usuarios_id = easy_net.usuarios.id_usuario where usuario = '" . $_SESSION['iniciado'] . "' order by fecha DESC");


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
        $this->Cell(120,30,'Soporte General EasyNet',0,0,'');
        $ahora = date("d-m-Y H:i");
        date_default_timezone_set("America/Mexico_City");
        $this->SetFont('Arial','B',12);
        $this->Cell(-68,45,$ahora,0,0,'C');
        $this->SetFont('Arial','B',12);
        $this->Cell(-1,45,'Fecha y Hora:',0,0,'C');
        //Altura de la tabla, no lo toques
        $this->Ln(45);
        $this->SetFont('Arial','B',10);
        $this->Cell(35, 7, 'Empresa', 1, 0, 'C', 0);
        $this->Cell(22, 7, 'Contacto', 1, 0, 'C', 0);
        $this->Cell(125, 7, 'Motivo', 1, 0, 'C', 0);
        // $this->Cell(65, 7, 'Solucion/Motivo', 1, 0, 'C', 0);
        $this->Cell(20, 7, 'Soporte', 1, 0, 'C', 0);
        $this->Cell(20, 7, 'Soportista', 1, 0, 'C', 0);
        $this->Cell(20, 7, 'Fecha', 1, 0, 'C', 0);

        $this->Cell(30, 7, 'Estado Soporte', 1, 1, 'C', 0);

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
$pdf->SetFont('helvetica','',8);


/*TABLA DE CLIENTES*/
while ($row = $resultados->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Cell(35, 7, $row['nombre_cliente'], 1, 0, 'L', 0);
    $pdf->Cell(22, 7, $row['contacto_soporte'], 1, 0, 'C', 0);
    $pdf->Cell(125, 7, utf8_decode($row['motivo']), 1, 0, 'L  ', 0);
    // $pdf->Cell(65, 7, $row['solucion'], 1, 0, 'C', 0);
    $pdf->Cell(20, 7, $row['soporte'], 1, 0, 'C', 0);
    $pdf->Cell(20, 7, $row['usuario'], 1, 0, 'C', 0);
    $pdf->Cell(20, 7, $row['fecha'], 1, 0, 'C', 0);
    $pdf->Cell(30, 7, $row['estado_soporte'], 1, 1, 'C', 0);
}
$pdf->Output();
?>
