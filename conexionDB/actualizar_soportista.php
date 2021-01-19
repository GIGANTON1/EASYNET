<?php
require '../conexionDB/conexion.php';

if (!isset($_GET['id'])){
    $id = $_GET['id_usuario'];
    $usuario = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];
    $cargo = $_POST['cargos'];

    $sql=("UPDATE easy_net.usuarios 
SET  usuarios.usuario=:usuario, usuarios.contra=:contraseña, usuarios.cargos_id=:cargo WHERE id_usuario ='" . $_POST["id_usuario"] . "'");
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':contraseña', $contraseña);
    $stmt->bindParam(':cargo', $cargo);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

}
