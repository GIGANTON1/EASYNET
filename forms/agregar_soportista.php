<?php
require_once "../conexionDB/conexion.php";
session_start();
$iniciado = isset($_SESSION['iniciado'])? $_SESSION['iniciado']: false;
$usua = $pdo->query("SELECT cargos_id FROM usuarios where usuario = '" . $_SESSION['iniciado'] . "'");
foreach ($usua as $usu):
    $usu['cargos_id'];
endforeach;
if ($usu['cargos_id'] != 1) {
    header("Location: ../main/MainIn.php");
}
if (!$iniciado) {
    header("Location: ../forms/login_form.php");
    exit();
}
$cargo = $pdo->query("SELECT * FROM cargos");
$estado = $pdo->query("SELECT * FROM estado_usuario");
if (!empty($_POST)) {
    $usuario = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];
    $cargos = $_POST['cargos'];
    $estados = $_POST['estados'];

    if (empty($usuario) || empty($contraseña) || empty($cargos) || empty($estados)) {
        $mensajes[] = "Todos los campos son obligatorios";
    }
    $ingreso = 0;
    if (empty($mensajes)) {
        $ingreso = $pdo->exec("INSERT INTO usuarios"
            . " (usuario, contra, cargos_id, estado_id )"
            . " VALUES ('$usuario', '$contraseña', '$cargos', '$estados')");
    }
    if ($ingreso >= 1) {
        echo "<script>alert('Soportista Agregado Exitosamente');
        window.location= '../views/soportistas.php'</script>";

    } else {
        echo "<script>
                alert('Error al agregar Soportista');
    </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>EasyNet - Nuevo Agente Soporte Técnico</title>
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
    <link href="../assets/css/agregar_soportista.css" rel="stylesheet">

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
                <li><a href="../main/MainIn.php">Inicio</a></li>
                <li class="menu-has-children"><a href="">Bítacoras</a>
                    <ul>
                        <li><a href="../bitacora/miBitacora.php">Mi Bitacora</a></li>
                        <li><a href="../bitacora/bitacora.php">Nueva Bitacora</a></li>
                        <li><a href="../bitacora/main_bitacora.php">Bitácora General</a></li>
                    </ul>
                </li>
                <li class="menu-has-children"><a href="">Clientes</a>
                    <ul>
                        <li><a href="../views/clientes.php">Clientes</a></li>
                        <li><a href="../forms/agregar_clientes.php">Nuevo Cliente</a></li>
                        <li><a href="../forms/actualizar_cliente.php">Actualizar Cliente</a></li>
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
        <!-- <a href="#intro"><img src="../imgs/logo_easynet.png" alt=""></a> -->
        <h2>NUEVO SOPORTISTA</h2>
        <!--<p>Distribuidor Autorizado de PSKLOUD</p>-->

        <!-- formulario agregar clientes -->

        <form class="box" action="" method="post" >
            <!-- primera columna -->
            <div class="row">
                <div class="col-sm">
                    <div id="dato1" >
                        <label>Nombre de Soportista</label>
                        <br>
                        <input type="text" name="nombre" placeholder="Nombre del Soportista">
                    </div>
                </div>
                <!-- segunda columna -->
                <div class="col-sm">
                    <div id="dato2" >
                        <label>Contraseña</label>
                        <br>
                        <input type="password" name="contraseña" placeholder="Contraseña del soportista">
                    </div>
                </div>
            </div>
            <!--<div>
                <select  placeholder="Soportista" name="cargos">

                </select>
                <div>
                    <select  placeholder="Soportista" name="cargos">

                    </select>
                </div>
            </div>-->
            <div>
                <label class="mdb-main-label">Cargo</label<>
            <select class="mdb-select md-form" name="cargos">
                    <?php foreach ($cargo as $cargos):?>
                        <option value="<?php echo $cargos['id_cargos']?>"><?php echo $cargos['cargos']?></option>
                    <?php  endforeach; ?>
            </select>
                <label class="mdb-main-label">Estado</label>
            <select class="mdb-select md-form" name="estados">
                <?php foreach ($estado as $estados):?>
                    <option value="<?php echo $estados['id_estado']?>"><?php echo $estados['estado']?></option>
                <?php  endforeach; ?>
            </select>
            </div>

            <div class="botones">
                <input type="submit" value="Agregar Soportista" href="soportistas.php">
                <a href="../views/soportistas.php">Ver Soportistas</a>
            </div>

        </form>

        <!-- End formulario agregar clientes -->

        <div class="footer">
            <div class="copyright">
                <div class="footer">
                    <div class="copyright">
                        <div class="footer">
                            <div class="copyright">
                                <div class="footer">
                                    <div class="copyright">
                                        &copy; Copyright <strong>EasyNet</strong>. Todos Derechos Reservados 2020
                                    </div>
                                    <div class="credits">
                                        Somos <strong>Equipo EasyNet</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

</section>
<script>
    // Material Select Initialization
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });

    Outline select
</script>
<!-- End Intro Section -->

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

