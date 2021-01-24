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
$estado = $pdo->query("SELECT * FROM estado_soporte");
$resultados = $pdo->query("SELECT 
bitacora.nombre_cliente, bitacora.contacto_soporte,
bitacora.motivo, bitacora.solucion, bitacora.fecha, bitacora.estado_soporte_id, tipo_soporte.soporte, usuarios.usuario, estado_soporte.estado_soporte, estado_soporte.id_estado_soporte
FROM easy_net.bitacora
inner join easy_net.tipo_soporte on easy_net.bitacora.tipo_soporte_id = easy_net.tipo_soporte.id_soporte
inner join easy_net.usuarios on easy_net.bitacora.usuarios_id = easy_net.usuarios.id_usuario
inner join estado_soporte on bitacora.estado_soporte_id = estado_soporte.id_estado_soporte WHERE estado_soporte_id = 2  
order by FECHA DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- mdbootstrap -->
    <link rel="stylesheet" href="../https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/style.css">

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>EasyNet - Bitácora de Soporte</title>
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
    <link href="../assets/css/actualizar_soporte.css" rel="stylesheet">

</head>

<body>
<!-- MdBootstrap jquery -->
<script type="text/javascript" src="../node_modules/mdbootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="../node_modules/mdbootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="../node_modules/mdbootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../node_modules/mdbootstrap/js/mdb.min.js"></script>
<!-- ======= Header ======= -->
<header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="#intro"><img src="../imgs/logo_easynet.png" alt=""></a>
            <h1><a href="#intro" class="scrollto">EasyNet</a></h1>
        </div>

<!-- #nav-menu-container -->
    </div>
</header><!-- End Header -->
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vuesax"></script>
<!-- ======= Bitacora ======= -->

<!-- ======= Intro Section ======= -->
<section id="intro">


    <div class="intro-text">
        <h2>ACTUALIZACION DE SOPORTE DE BITACORA</h2>
        <div class="w-75 p-3"  style="background-color: #eeeeee">
            <div class="card-body">
                <div id="table" class="table-editable">
                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <input class="form-control mb-4" id="tableSearch" type="text"
                               placeholder="Busqueda de clientes...">
                        <thead>
                        <tr>
                            <th class="text-center">EMPRESA</th>
                            <th class="text-center">MOTIVO</th>
                            <th class="text-center">FECHA</th>
                            <th class="text-center">ESTADO</th>
                            <th class="text-center">NUEVO ESTADO</th>
                        </tr>
                        </thead>
                        <tbody id="myTable">
                        <?php foreach ($resultados as $cliente):?>
                            <?php foreach ($estado as $soporte):?>
                            <tr>
                                <td class="pt-3-half" contenteditable="true"><?php echo $cliente['nombre_cliente']?></td>
                                <td class="pt-3-half" contenteditable="true"><?php echo $cliente['motivo']?></td>
                                <td class="pt-3-half" contenteditable="true"><?php echo $cliente['fecha']?></td>
                                <td class="pt-3-half" contenteditable="true"><?php echo $cliente['estado_soporte']?></td>
                                <td>
                                    <select class="mdb-select md-form" name="usuario">
                                            <option value="<?php echo $soporte['id_estado_soporte']?>"><?php echo $soporte['estado_soporte']?></option>
                                    </select>
                                </td>
                            </tr>
                            <?php  endforeach; ?>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="botones">
            <a href="../fpdf/main_bitacora.php">Guardar Cambio</a>
        </div>
                </div>
</section>
<script>

</script>
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
