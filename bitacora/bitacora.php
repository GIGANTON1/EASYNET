<?php
require_once "../conexionDB/conexion.php";

$clientes = $pdo->query("SELECT * FROM cliente");
$soportes    = $pdo->query("SELECT soporte FROM tipo_soporte");
if (!empty($_POST)) {
    $nombre = $_POST['nombre_cliente'];
    $contacto = $_POST['contacto_soporte'];
    $motivo = $_POST['motivo'];
    $solucion = $_POST['solucion'];
    $soport = $_POST['soporte'];

    if (empty($nombre) ||empty($contacto) || empty($motivo) || empty($solucion) || empty($soport)) {
        $mensajes[] = "Todos los campos son obligatorios";
    }
    $ingreso = 0;
    if (empty($mensajes)) {
        $ingreso = ("INSERT INTO bitacora"
            . " (nombre_cliente, contacto_soporte, motivo, solucion, soporte)"
            . " VALUES ('$nombre','$contacto', '$motivo', '$solucion', '$soport')");
    }
    if ($ingreso >= 1) {
        $mensajes[] = "";
    } else {
        $mensajes[] = "Hubo un error al agregar la nueva bitacora.";
    }
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
  <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/bitacora_form.css" rel="stylesheet">

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
          <li class="menu-active"><a href="../main/MainIn.html">Inicio</a></li>
          <li><a href="#">Mi Bitacora</a></li>
          <li class="menu-has-children"><a href="">Clientes</a>
                      <ul>
                        <li><a href="../forms/agregar_cliente.html">Agregar Clientes</a></li>
                        <li><a href="../views/clientes.php">Ver Clientes</a></li>
                      </ul>
          </li>
          <li><a href="../forms/login.php">Cerrar Sesión</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Intro Section ======= -->
  <section id="intro">
      <div class="intro-text">
        <h2>NUEVA BITACORA EASYNET</h2>
         <div class="footer">
                    <div class="copyright">
                      &copy; Copyright <strong>EasyNet</strong>. Todos los derechos Reservados 2020
                    </div>
                      Somos <strong>Equipo EasyNet</strong>
        </div>
      </div>
      <div class="intro-text">
<!----Form Bitacora---->
<div class="form" >
<form action="" method="post">
  <div class="form-row">
    <div class="col-md-6 mb-3">
        <?php
        if (!empty($mensajes)):
            echo '<ul>';
            foreach ($mensajes as $mensaje){
                echo "<li>{$mensaje}</li>";
            }
            echo '</ul>';
        endif; ?>
      <label>Cliente atendido</label>
      <!--<input type="text" class="form-control" id="cliente_soporte" value="Cliente Atendido" required>-->
        <select class="custom-select" placeholder="Cliente Atendido" id="validationCustom04" required>
            <?php foreach ($clientes as $cliente):?>
                <option><?php echo $cliente['nombre_cliente']?></option>
            <?php  endforeach; ?>
        </select>

      <div class="valid-feedback">
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label>Contacto para el Soporte</label>
        <input type="text" class="form-control" id="contacto_soporte" placeholder="Contacto del Soporte" required/>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-row">

  <div class="col-md-6 mb-3">
        <label>Problema/Motivo del Soporte</label>
        <textarea class="form-control" id="motivo" placeholder="Ingrese Problema/Motivo del Soporte" required></textarea>
      </div>

    <div class="col-md-6 mb-3">
     <label>Solución o Soporte Realizado</label>
        <textarea class="form-control" id="solucion" placeholder="Ingrese Solución o Soporte Realizado" required></textarea>
    </div>
    <div class="col-md-6 mb-3">
       <label for="example-date-input" class="col-6 col-form-label">Fecha de Soporte</label>

    </div>
    <div class="col-md-3 mb-3">
        <label>Soporte</label>
        <!--<input type="text" class="form-control" id="cliente_soporte" value="Cliente Atendido" required>-->
        <select class="custom-select" placeholder="Tipo de Soporte" id="validationCustom05" required>
            <?php foreach ($soportes as $soporte):?>
                <option><?php echo $soporte['soporte']?></option>
            <?php  endforeach; ?>
        </select>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Ingresar Bitacora</button>
</form>
</div>
<!----End Form Bitacora---->
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
