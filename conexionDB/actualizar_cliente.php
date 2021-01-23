<?php
require '../conexionDB/conexion.php';

if (isset($_GET['id_cliente '])){
    $id = $_GET['id_cliente'];
    $rtn = $_POST['rtn'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $contacto = $_POST['contacto'];
    $usuario = $_POST['usuario'];


    $sql=("UPDATE easy_net.cliente 
SET  cliente.rtn= '$rtn', cliente.nombre_cliente='$nombre', cliente.direccion='$direccion', cliente.correo='$correo', cliente.telefono='$telefono', cliente.contacto='$contacto', cliente.usuarios_id='$usuario' 
WHERE id_cliente ='" . $_GET['id_cliente'] . "'");
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

}

