<?php
require_once "../conexionDB/conexion.php";
session_start();
$resultados = $pdo->query("SELECT id_usuario FROM usuarios where usuario = '" . $_SESSION['iniciado'] . "'");
$iniciado = isset($_SESSION['iniciado'])? $_SESSION['iniciado']: false;
foreach ($resultados as $cliente):
echo    $cliente['id_usuario'];
endforeach;


