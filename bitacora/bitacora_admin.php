<?php
require_once "../conexionDB/conexion.php";
session_start();
$resultados = $pdo->query("SELECT id_usuario FROM usuarios where usuario = '" . $_SESSION['iniciado'] . "'");
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

$resultados = $pdo->query("SELECT id_usuario FROM usuarios where usuario = '" . $_SESSION['iniciado'] . "'");
$clientes = $pdo->query("SELECT id_cliente, nombre_cliente, usuarios_id, usuarios.id_usuario, usuarios.usuario FROM easy_net.cliente
inner join usuarios on cliente.usuarios_id = usuarios.id_usuario ORDER BY nombre_cliente ASC");
$soportes = $pdo->query("SELECT * FROM tipo_soporte");
$estado = $pdo->query("SELECT * FROM estado_soporte");
foreach ($resultados as $cliente):
    $cliente['id_usuario'];
endforeach;
if (!empty($_POST)) {
    $nombre = $_POST['cliente'];
    $contacto = $_POST['contacto_soporte'];
    $motivo = $_POST['motivo'];
    $solucion= $_POST['solucion'];
    $soporte = $_POST['soporte'];
    $fecha = $_POST['fecha'];
    $id = $cliente['id_usuario'];
    $estado = $_POST['estado'];

    if (empty($nombre) || empty($contacto) || empty($motivo) || empty($solucion) || empty($soporte)|| empty($fecha)|| empty($estado)) {
        $mensajes[] = "Todos los campos son obligatorios";
    }
    $ingreso = 0;

    if (empty($mensajes)) {
        $ingreso = $pdo->exec("INSERT INTO bitacora"
            . " (nombre_cliente, contacto_soporte, motivo, solucion, tipo_soporte_id, fecha, usuarios_id, estado_soporte_id )"
            . " VALUES ('$nombre', '$contacto', '$motivo', '$solucion', '$soporte', '$fecha', '$id', '$estado')");
    }

    if ($ingreso >= 1) {
        $mensajes[] = "Bitacora del cliente " . $nombre .  " agregado exitosamente";
    } else {
        $mensajes[] = "Hubo un error al crear su usuario.";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>EasyNet - Creación Bitácora</title>
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


    <!-- MdBootstrap jquery -->
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/mdb.min.js"></script>

    <!-- mdbootstrap -->
    <link rel="stylesheet" href="../https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/style.css">

    <!-- Template Main CSS File -->
    <link href="../assets/css/bitacora_form.css" rel="stylesheet">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

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
                <li class="menu-active"><a href="../main/MainIn.php">Inicio</a></li>
                <li><a href="../bitacora/miBitacora.php">Mi Bitacora</a></li>
                <li class="menu-has-children"><a href="">Clientes</a>
                    <ul>
                        <li><a href="../forms/agregar_clientes.php">Agregar Clientes</a></li>
                        <li><a href="../views/clientes.php">Ver Clientes</a></li>
                    </ul>
                </li>
                <li class="menu-has-children"><a href="">Soportistas</a>
                    <ul>
                        <li><a href="../forms/agregar_soportista.php">Agregar Soportistas</a></li>
                        <li><a href="../views/soportistas.php">Ver Soportistas</a></li>
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
        <h2>NUEVA BITACORA EASYNET</h2>
        <div class="form" >
            <form action="" method="post">
                <div class="form-row">
                    <div class="col-sm">
                        <div id="dato1" >
                            <label>Cliente Atendido</label>
                            <select  placeholder="Cliente Atendido" name="cliente" class="form-select" aria-label="Default select example">
                                <?php foreach ($clientes as $cliente):?>
                                    <option><?php echo $cliente['nombre_cliente']?></option>
                                <?php  endforeach; ?>
                            </select>
                            <!--<input type="text" name="nombre" placeholder="Nombre del Cliente">--->
                            <br>
                            <label>Problema/Motivo de Soporte</label>
                            <br>
                            <input type="text" name="motivo"  placeholder="Problema/Motivo de la llamada">
                            <br>

                            <label>Contacto</label>
                            <br>
                            <input type="text" name="contacto_soporte" placeholder="Contacto de la empresa que llamo para solicitar el soporte">
                            <br>
                            <label>Solución/Soporte Realizado</label>
                            <br>
                            <input type="text" name="solucion"  placeholder="Solución o Soporte realizado al cliente">
                            <br>
                            <div  class="d-flex flex-row bd-highlight mb-3 justify-content-center">
                                <label>Tipo de Soporte</label>
                                <select  placeholder="Tipo de Soporte" name="soporte" >
                                    <?php foreach ($soportes as $soport):?>
                                        <option value="<?php echo $soport['id_soporte']?>"><?php echo $soport['soporte']?></option>
                                    <?php  endforeach; ?>
                                </select>
                                <br>
                                <label>Estado del Soporte</label>
                                <br>
                                <select  placeholder="Estado del Soporte" name="estado">
                                    <?php foreach ($estado as $estados):?>
                                        <option value="<?php echo $estados['id_estado_soporte']?>"><?php echo $estados['estado_soporte']?></option>
                                    <?php  endforeach; ?>
                                </select>
                            </div>
                            <label>Fecha del Soporte</label>
                            <br>
                            <input type="date" name="fecha"  placeholder="Hora/Fecha del Soporte">
                            <br>
                            <div class="botones">
                                <input type="submit" value="Guardar nueva Bitácora" href="clientes.php">
                            </div>
            </form>
        </div>
        <!----Form Bitacora---->

        <!----End Form Bitacora---->
        <div class="footer">
            <div class="copyright">
                &copy; Copyright <strong>EasyNet</strong>. Todos los derechos Reservados 2020
            </div>
            Somos <strong>Equipo EasyNet</strong>
        </div>
</section>

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
