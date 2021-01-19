<?php
require '../conexionDB/conexion.php';

if (!empty($_POST)){
    $rtn = $_POST['rtn'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $contacto = $_POST['contacto'];
    $sql=("UPDATE easy_net.cliente 
SET  cliente.rtn= :rtn, cliente.nombre_cliente=:nombre, cliente.direccion=:direccion, cliente.correo=:correo, cliente.telefono=:telefono, cliente.contacto=:contacto 
WHERE id_cliente = '" . $_GET["id_cliente"] . "'");
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':rtn', $rtn);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':contacto', $contacto);   
    $stmt->execute();

}
header("Location: ../views/clientes.php");
