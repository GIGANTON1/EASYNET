<?php
require '../conexionDB/conexion.php';
if (!empty($_POST)) {
    $nombre = $_POST['nombre'];
    $rtn = $_POST['rtn'];
    $direccion = $_POST['direccion'];
    $contacto = $_POST['contacto'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];

    if (empty($nombre) || empty($rtn) || empty($direccion) || empty($contacto) || empty($telefono) || empty($correo) || empty($usuario)) {
        $mensajes[] = "Todos los campos son obligatorios";
    }
    $ingreso = 0;
    if (empty($mensajes)) {
        $ingreso = $pdo->exec("INSERT INTO cliente"
            . " (nombre_cliente, rtn, direccion, contacto, telefono, correo, usuarios_id)"
            . " VALUES ('$nombre', '$rtn', '$direccion', '$contacto', '$telefono', '$correo', '$usuario')");
    }
    if ($ingreso >= 1) {
        echo "<script>
                alert('Cliente agregado Exitosamente');
                window.location= '../views/clientes.php'
    </script>";
//        exit();
    } else {
        echo "<script>
                alert('Error al agregar cliente');
                window.location= '../forms/agregar_clientes.php'
    </script>";

    }
}
 ?>
