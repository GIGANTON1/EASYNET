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
$usuario = $pdo->query("SELECT * FROM usuarios");
$resultados = $pdo->query("select cliente.id_cliente, cliente.rtn, cliente.nombre_cliente, cliente.contacto, cliente.direccion, cliente.correo, cliente.telefono, 
 usuarios.usuario from easy_net.cliente inner join usuarios on easy_net.cliente.usuarios_id = easy_net.usuarios.id_usuario WHERE cliente.id_cliente = '" . $_GET["id_cliente"] . "'");


if (isset($_POST['update'])) {
    $id = $_GET['id_cliente'];
    $cliente = $_POST['nombre'];
    $rtn = $_POST['rtn'];
    $direccion = $_POST['direccion'];
    $contacto = $_POST['contacto'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $soportista = $_POST['usuario'];


    $pdoQuery = "UPDATE cliente SET nombre_cliente=:nombre, rtn=:rtn, direccion=:direccion, contacto=:contacto, telefono=:telefono, correo=:correo, usuarios_id=:usuarios WHERE id_cliente=:id";
    $pdoQuery_run = $pdo->prepare($pdoQuery);
    $pdoQuery_exec = $pdoQuery_run->execute(array(":nombre" => $cliente, ":rtn" => $rtn, ":direccion" => $direccion, ":contacto"=> $contacto, ":telefono"=>$telefono, ":correo"=>$correo, ":usuarios"=>$soportista, ":id"=>$id));

    if ($pdoQuery_exec) {
        echo '<script>alert("Soportista Actualizado")</script>';
        header("Location: ../views/clientes.php");

    } else {
        echo '<script>alert("Soportista no actualizado")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>EasyNet - Actualizar Cliente</title>
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
    <link href="../assets/css/agregar_clientes.css" rel="stylesheet">

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
                <li class="menu-has-children"><a href="">Soportistas</a>
                    <ul>
                        <li><a href="../views/soportistas.php">Soportistas</a></li>
                        <li><a href="../forms/agregar_soportista.php">Nuevo Soportistas</a></li>
                        <li><a href="../forms/actualizar_soportista.php">Actualizar</a></li>
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
        <h2>EDITAR CLIENTE EASYNET</h2>
        <!--<p>Distribuidor Autorizado de PSKLOUD</p>-->

        <!-- formulario agregar clientes -->



        <form class="box" action="" method="post" >
            <!-- primera columna -->
            <div class="row">

                <div class="col-sm">
                    <?php foreach ($resultados as $cliente):?>
                    <div id="dato1" >
                        <label>Empresa</label>
                        <br>
                        <input type="hidden" value="<?php echo $_GET['id_usuario']?>" name="id">
                        <input type="text" name="nombre" value="<?php echo $cliente['nombre_cliente']?>" placeholder="Nombre del Cliente" minlength="5" maxlength="45"
                               title="Mínino de 5 carácteres y Máximo de 45 carácteres.">
                        <br>
                        <label>R.T.N</label>
                        <br>
                        <input type="text" name="rtn"  placeholder="RTN del Cliente" value="<?php echo $cliente['rtn']?>" minlength="14" maxlength="14"
                               title="El RTN debe contener 14 dígitos.">
                        <br>
                        <label>Dirección</label>
                        <br>
                        <input type="text" name="direccion"  placeholder="Dirección del Cliente" value="<?php echo $cliente['direccion']?>">

                    </div>
                </div>
                <!-- segunda columna -->
                <div class="col-sm">
                    <div id="dato2" >
                        <label>Contacto</label>
                        <br>
                        <input type="text" name="contacto" placeholder="Contacto de la Empresa" value="<?php echo $cliente['contacto']?>" minlength="5" maxlength="45"
                               title="Mínino de 5 carácteres y Máximo de 45 carácteres.">
                        <br>
                        <label># Teléfono</label>
                        <br>
                        <input type="text" name="telefono"  placeholder="Número Telefónico del Cliente" value="<?php echo $cliente['telefono']?>"  maxlength="10"
                               title="El télefono debe contener 10 dígitos">
                        <br>
                        <label>Correo Electrónico</label>
                        <br>
                        <input type="text" name="correo"  placeholder="Correo Electrónico del Cliente" value="<?php echo $cliente['correo']?>" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"
                               title="El Correo no es válido">
                    </div>
                </div>

            </div>
            <?php endforeach; ?>
            <div>
                <label>Soportista</label>
                <br>
                <select  placeholder="Soportista" name="usuario">
                    <?php foreach ($usuario as $usu):?>
                    <option value="<?php echo $usu['id_usuario']?>"><?php echo $usu['usuario']?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="botones">
                <input type="submit" name="update" value="Actualizar Cliente">
                <a href="../views/clientes.php">Ver Clientes</a>
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
