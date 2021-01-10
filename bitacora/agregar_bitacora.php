<?php
require '../conexionDB/conexion.php';
if (!empty($_POST)) {
    $nombre = $_POST['cliente'];
    $contacto = $_POST['contacto_soporte'];
    $motivo = $_POST['motivo'];
    $solucion = $_POST['solucion'];
    $soporte = $_POST['soporte'];

    if (empty($nombre) ||empty($contacto) || empty($motivo) || empty($solucion)) {
        $mensajes[] = "Todos los campos son obligatorios";
    }
    $ingreso = 0;
    if (empty($mensajes)) {
        $ingreso = ("INSERT INTO bitacora"
            . " (nombre_cliente, contacto_soporte, motivo, solucion, soporte)"
            . " VALUES ('$nombre','$contacto', '$motivo', '$solucion', '$soporte')");
    }
    if ($ingreso >= 1) {
        $mensajes[] = "";
    } else {
        $mensajes[] = "Hubo un error al agregar la nueva bitacora.";
    }
}
?>
