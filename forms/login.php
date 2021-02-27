<?php
require_once "../conexionDB/conexion.php";
$usuario=$_POST["nombre"];
$password=$_POST["contra"];

$soportista = $pdo->query("SELECT * FROM usuarios WHERE usuario = '$usuario' AND contra = '$password' AND estado_id = 1");
$pdo->prepare();
$soportista->bindParam("nombre", $usuario, PDO::PARAM_STR);
$soportista->bindParam("contra", $password, PDO::PARAM_STR);
$soportista->execute();
$resultado = $soportista->fetch(PDO::FETCH_ASSOC);


$iniciado = isset($_SESSION['iniciado'])? $_SESSION['iniciado']: false;
if ($resultado) {
    session_start();
    // $_SESSION['iniciado'] = $id['id_usuario'];
    // $_SESSION['iniciado']=$usuario;
     header("Location: ../main/MainIn.php");
exit();
}else
    {
        echo "<script>
                alert('Error al iniciar Sesion Guapo');
                window.location= '../forms/login_form.php'
    </script>";

    }
?>






