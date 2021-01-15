<?php
require_once "../conexionDB/conexion.php";

 if ($_POST){
     $usuario = $_POST['usuario'];
     $contra = $_POST['contraseña'];

     $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contra = '$contra'";
     $pdo = $sql;
     $resultado = $pdo->query(ex);

 }
?>