
<?php
session_start();
require_once "../conexionDB/conexion.php";
$mensajes = [];
$iniciado = isset($_SESSION['iniciado'])? $_SESSION['iniciado']: false;
if ($iniciado){
    header("Location: ../main/MainIn.php");
    exit();
} elseif (!empty($_POST)){
    $nombre_usuario = isset($_POST['nombre'])? $_POST['nombre']: '';
    $contra = isset($_POST['contra'])? $_POST['contra']: '';
    $sql = ("SELECT * FROM usuario WHERE nombre = :nombre and contra = :contra");
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $nombre_usuario);
    $stmt->bindParam(':contra', $contra);
    $stmt->execute();
    // $resultado = $pdo ->query("SELECT * FROM usuarios WHERE apodo = '{$nombre_usuario}' and contraseña = '{$contra}'");
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($usuario===false){
        $mensajes[] = 'La combinación usuario/contraseña es incorrecta';
    } else {
        $_SESSION['id'] = $usuario['id_usuario'];
        $_SESSION['iniciado'] = true;
        header("Location: ../main/MainIn.php");
        exit;
    }
}
