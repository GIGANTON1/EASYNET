<?php
require_once "../conexionDB/conexion.php";
session_start();
$iniciado = isset($_SESSION['iniciado'])? $_SESSION['iniciado']: false;
$usua = $pdo->query("SELECT cargos_id, estado_id FROM usuarios where usuario = '" . $_SESSION['iniciado'] . "'");
foreach ($usua as $usu):
    $usu['estado_id'];
endforeach;
foreach ($usua as $usu):
    $usu['cargos_id'];
endforeach;
if ($usu['estado_id'] == 2) {
    header("Location: ../conexionDB/logout.php");
    exit();
}elseif ($usu['cargos_id'] == 2)
{
    header("Location: ../main/MainIn.php");
}
if (!$iniciado) {
    header("Location: ../forms/login_form.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>EasyNet - Distribuidor VIP</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="../imgs/logo_easynet.ico" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style1.css" rel="stylesheet">

</head>

<body>

<!-- ======= Header ======= -->
<header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="#intro"><img src="../imgs/logo_easynet.png" alt=""></a>
            <h1><a href="#intro" class="scrollto">EasyNet</a></h1>
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="#intro">Inicio</a></li>
                <li class="menu-has-children"><a href="">Bítacoras</a>
                    <ul>
                        <li><a href="../bitacora/miBitacora.php">Mi Bitacora</a></li>
                        <li><a href="../bitacora/bitacora_admin.php">Nueva Bitacora</a></li>
                        <li><a href="../bitacora/main_bitacora.php">Bitácora General</a></li>
                    </ul>
                </li>
                <li class="menu-has-children"><a href="">Clientes</a>
                    <ul>
                        <li><a href="../views/clientes.php">Clientes</a></li>
                        <li><a href="../forms/agregar_clientes.php">Nuevo Cliente</a></li>
                    </ul>
                </li>
                <li class="menu-has-children"><a href="">Soportistas</a>
                    <ul>
                        <li><a href="../views/soportistas.php">Soportistas</a></li>
                        <li><a href="../forms/agregar_soportista.php">Nuevo Soportistas</a></li>
                    </ul>
                </li>
                <i class="ion-android-person" style="color: white"></i>
                <li class="menu-has-children"><a href="">Perfil</a>
                    <ul>
                        <li><?php echo $_SESSION['iniciado']?></li>
                        <li><a href="../conexionDB/logout.php">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- End Header -->

<!-- ======= Intro Section ======= -->
<section id="intro">

    <div class="intro-text">
        <a href="#intro"><img src="../imgs/logo_nuevo.png" alt=""></a>

        <div class="footer">
            <div class="copyright">
                &copy; Copyright <strong>EasyNet</strong>. Todos Derechos Reservados 2020
            </div>
            <div class="credits">
                Somos <strong>Equipo EasyNet</strong>
            </div>
        </div>
    </div>


</section><!-- End Intro Section -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- Vendor JS Files -->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>
<script src="../assets/vendor/wow/wow.min.js"></script>
<script src="../assets/vendor/venobox/venobox.min.js"></script>
<script src="../assets/vendor/superfish/superfish.min.js"></script>
<script src="../assets/vendor/hoverIntent/hoverIntent.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>

</body>

</html>
