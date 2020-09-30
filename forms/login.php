<?php
session_start();
require '../conexionDB/conexion.php';
/*$mensajes = [];
$iniciado = isset($_SESSION['iniciado'])? $_SESSION['iniciado']: false;
if ($iniciado){
    header("Location: ../bitacora/main_bitacora.html");
    exit();
} elseif (!empty($_POST)){
    $nombre_usuario = isset($_POST['nombre'])? $_POST['nombre']: '';
    $contra = isset($_POST['contraseña'])? $_POST['contraseña']: '';
    $sql = ("SELECT * FROM usuario WHERE nombre = :nombre and contraseña = :contraseña");
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':contraseña', $contra);
    $stmt->execute();
   // $resultado = $pdo ->query("SELECT * FROM usuarios WHERE apodo = '{$nombre_usuario}' and contraseña = '{$contra}'");
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($usuario===false){
        $mensajes[] = 'La combinación usuario/contraseña es incorrecta';
    } else {
        $_SESSION['id'] = $usuario['id_user'];
        $_SESSION['iniciado'] = true;
        header("Location: ../bitacora/main_bitacora.html");
        exit;
    }
}*/
?>
<html>
<head>
<meta charset="UTF-8">
<title>Login - Easy Net Team Support </title>
<link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
<!--Login-->
    <!--<img src="../img/" class="fondo" alt="">-->
    <form class="box" action="" method="post" >
      <h1 style="font-family: sans-serif">Iniciar Sesión</h1>
        <label>Usuario</label>
        <input type="text" name="nombre"  placeholder="Ingrese su Usuario">
        <label>Contraseña</label>
        <input type="password" name="contraseña" placeholder="Ingrese su contraseña">
        <input type="submit" value="Iniciar Sesión">
    </form>
    <form class="boton_principal" action="../main/MainIn.html" method="post">
      <input type="submit" name="" value="Pagina Principal">
    </form>
</body>
</html>
