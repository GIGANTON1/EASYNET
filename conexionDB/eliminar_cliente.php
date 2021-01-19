<?php
require '../conexionDB/conexion.php';
$sql =$pdo->query("DELETE FROM cliente WHERE id_cliente='" . $_GET["id_cliente"] . "'");
header("Location: ../views/clientes.php");
?>