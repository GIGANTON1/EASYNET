<?php
require_once "../conexionDB/conexion.php";
session_start();
$iniciado = isset($_SESSION['iniciado'])? $_SESSION['iniciado']: false;
if ($iniciado) {
    $usuario = $_SESSION['iniciado'];
    header("Location: ../main/MainIn.php");
    exit();
}
?>
<html>
<head>
<meta charset="UTF-8">
<title>Login - EasyNet Team Support </title>
  <link rel="shortcut icon" type="image/x-icon" href="../imgs/logo_easynet.ico" />
<link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
<!--Login-->
    <!--<img src="../img/" class="fondo" alt="">-->
    <form class="box" action="login.php" method="post" >
      <h1 style="font-family: sans-serif">Iniciar Sesión</h1>
        <label>Usuario</label>
        <input type="text" name="nombre"  id="nombre" placeholder="Ingrese su Usuario">
        <label>Contraseña</label>
        <input type="password" name="contra" id="contra" placeholder="Ingrese su contraseña">
        <input type="submit" value="Iniciar Sesión">
    </form>
    <form class="boton_principal" action="../main/main.html" method="post">
      <input type="submit" name="" value="Pagina Principal">
    </form>
</body>
</html>
