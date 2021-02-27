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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
<!--Login-->
    <!--<img src="../img/" class="fondo" alt="">-->
    <form class="box" action="" method="post" >
      <h1 style="font-family: sans-serif; font-weight: bold; justify-content: center ">Login Soportistas</h1>
        <label>Usuario</label>
        <input type="text" name="nombre"  id="nombre" placeholder="Ingrese su Usuario">
        <label>Contraseña</label>
        <input type="password" name="contra" id="contra" placeholder="Ingrese su contraseña">
        <input type="submit" value="Iniciar Sesión">
    </form>
    <form class="boton_principal" action="../main/main.html" method="post" data-toggle="popover" data-trigger="focus" data-content="Click anywhere">
      <input type="submit" name="" value="Pagina Principal">
    </form>
</body>
</html>
