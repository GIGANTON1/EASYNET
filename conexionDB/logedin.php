<?php

require '../conexionDB/conexion.php';
session_start();
if (isset($_POST['iniciado'])) {

    $usuario = $_POST['nombre'];
    $password = $_POST['contra'];

    $query = $pdo->prepare("SELECT * FROM usuarios WHERE usuario=:nombre AND contra=:contra");
    $query->bindParam("nombre", $usuario, PDO::PARAM_STR);
    $query->execute();

    $resultado = $query->fetch(PDO::FETCH_ASSOC);

    if (!$resultado) {
        echo '<p class="error">Username password combination is wrong!</p>';
    } else {
        if (password_verify($password, $resultado['contra'])) {
            $_SESSION['id_usuario'] = $resultado['id_usuario'];
            header("Location: ../views/admin.php");
        } else {
            header("Location: ../views/clientes.php");
        }
    }
}
?>