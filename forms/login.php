
<?php
session_start();
require_once "../conexionDB/conexion.php";

$usuario=$_POST["nombre"];
$password=$_POST["contra"];

$soportista = $pdo->query("SELECT * FROM usuarios WHERE usuario = '$usuario' AND contra = '$password' AND estado_id = 1");
$pdo->prepare($soportista);
if($soportista==true){
    $_SESSION['iniciado']=true;
    $_SESSION['iniciado']=$usuario;
    header("Location: ../main/MainIn.php");
    exit();
}elseif ($pdo===false){
    header("Location: ../views/admin.php");
}





