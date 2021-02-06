<?php
require '../conexionDB/conexion.php';

if (isset($_POST['id_usuario'])){

    $id = $_POST['id_usuario'];
    $usuario = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    $pdoQuery = "UPDATE usuarios SET usuario=:nombre, contra=:contraseña WHERE id_usuario=:id";
    $pdoQuery_run = $pdo->prepare($pdoQuery);
    $pdoQuery_exec = $pdoQuery_run->execute(array(":nombre"=>$usuario, ":contra"=>$contraseña, ":id_usuario"=>$id));

    if ($pdoQuery_exec)
    {
        echo '<script>alert("Soportista Actualizado")</script>';
    }else{
        echo '<script>alert("Soportista no actualizado")</script>';
    }
}
