
<?php
session_start();
require_once "conexion.php";
$iniciado = isset($_SESSION['iniciado'])? $_SESSION['iniciado']: false;
if (!$iniciado) {
    header("Location: ../forms/login.html");
    exit();
}
?>