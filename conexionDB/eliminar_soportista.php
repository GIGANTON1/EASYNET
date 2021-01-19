<?php
require '../conexionDB/conexion.php';
$sql =$pdo->query("DELETE FROM usuarios WHERE id_usuario='" . $_GET["id_usuario"] . "'");
header("Location: ../views/soportistas.php");
?>