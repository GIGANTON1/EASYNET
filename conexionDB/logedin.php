<?php
session_start();
require_once "conexion.php";
$mensajes = [];
$iniciado = isset($_SESSION['iniciado'])? $_SESSION['iniciado']: false;
if ($iniciado){
    header("Location: index1.php");
    exit();
} elseif (!empty($_POST)){
    $nombre_usuario = isset($_POST['nombre'])? $_POST['nombre']: '';
    $contra = isset($_POST['contra'])? $_POST['contra']: '';
    $sql = ("SELECT * FROM usuarios WHERE usuario = :nombre and contra = :contra");
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $nombre_usuario);
    $stmt->bindParam(':contra', $contra);
    $stmt->execute();
   // $resultado = $pdo ->query("SELECT * FROM usuarios WHERE apodo = '{$nombre_usuario}' and contraseña = '{$contra}'");
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($usuario===false){
        echo "<script>
        alert('Error al iniciar Sesion Guapo');
        window.location= '../forms/login_form.php'
</script>";
    } else {        
        $_SESSION['iniciado'] = $usuario['id_usuario'];
        $_SESSION['iniciado'] = $nombre_usuario;
        header("Location: ../main/MainIn.php");
        exit;
    }
}
?>