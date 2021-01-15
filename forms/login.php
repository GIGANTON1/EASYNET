
<?php
session_start();
require_once "../conexionDB/conexion.php";
$mensajes = [];
$iniciado = isset($_SESSION['iniciado'])? $_SESSION['iniciado']: false;
if (isset($_SESSION['cargo'])){
    switch ($_SESSION['cargo']){
        case 1:
            header('location: ../views/admin.php');
            break;
        case 2:
            header('location: ../views/soporte.php');
            break;

        default:
    }
}

if ($iniciado){
    header("Location: ../main/MainIn.php");
    exit();
} elseif (!empty($_POST)){
    $usuario = isset($_POST['usuario'])? $_POST['usuario']: '';
    $contra = isset($_POST['contra'])? $_POST['contra']: '';
    $sql = ("SELECT * FROM usuarios WHERE usuario = :usuario and contra = :contra");
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':contra', $contra);
    $stmt->execute();
    $_SESSION['usuario'] = $usuario['usuario'];
    $_SESSION['iniciado'] = true;
    $row = $stmt->fetch(PDO::FETCH_NUM);
    if ($row ==true){
        $cargo = $row[3];
        $_SESSION['cargo'] = $cargo;
        switch ($_SESSION['cargo']){
            case 1:
                header('location: ../views/admin.php');
                break;
            case 2:
                header('location: ../views/soporte.php');
                break;

            default:
        }

    }else{
        echo 'El usuario no existe';
    }


    // $resultado = $pdo ->query("SELECT * FROM usuarios WHERE apodo = '{$nombre_usuario}' and contraseña = '{$contra}'");
    /*$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($usuario===false){
        $mensajes[] = 'La combinación usuario/contraseña es incorrecta';
    } else {
        $_SESSION['id'] = $usuario['id_usuario'];
        $_SESSION['iniciado'] = true;
        header("Location: ../main/MainIn.php");
        exit;
    }*/
}
