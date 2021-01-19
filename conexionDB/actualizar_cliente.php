<?php
require '../conexionDB/conexion.php';

if (isset($_GET['id'])){
    $id = $_GET['id_cliente'];
    $rtn = $_POST['rtn'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $contacto = $_POST['contacto'];
    if (isset($_REQUEST['id_cliente'])) {
        $id = $_REQUEST['id_cliente'];
    } else {
        $id = "";
    }
    $sql=("UPDATE easy_net.cliente 
SET  cliente.rtn= :rtn, cliente.nombre_cliente=:nombre, cliente.direccion=:direccion, cliente.correo=:correo, cliente.telefono=:telefono, cliente.contacto=:contacto 
WHERE id_cliente = :id");
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':rtn', $rtn);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':contacto', $contacto);   
    $stmt->bindParam(':id', $id);
    $stmt->execute();

}

