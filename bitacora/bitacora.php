<?php
require_once "../conexionDB/conexion.php";
$clientes = $pdo->query("SELECT * FROM cliente");
$soportes    = $pdo->query("SELECT soporte FROM tipo_soporte");
if (!empty($_POST)) {
    $nombre = $_POST['cliente'];
    $contacto = $_POST['contacto_soporte'];
    $motivo = $_POST['motivo'];
    $solucion= $_POST['solucion'];
    $soporte = $_POST['soporte'];
    $fecha = $_POST['fecha'];

    if (empty($nombre) || empty($contacto) || empty($motivo) || empty($solucion) || empty($soporte)|| empty($fecha)) {
        $mensajes[] = "Todos los campos son obligatorios";
    }
    $ingreso = 0;
    if (empty($mensajes)) {
        $ingreso = $pdo->exec("INSERT INTO bitacora"
            . " (nombre_cliente, contacto_soporte, motivo, solucion, soporte, fecha)"
            . " VALUES ('$nombre', '$contacto', '$motivo', '$solucion', '$soporte', '$fecha')");
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
          <li class="menu-active"><a href="../main/MainIn.php">Inicio</a></li>
          <li><a href="../bitacora/main_bitacora.php">Mi Bitacora</a></li>
          <li class="menu-has-children"><a href="">Clientes</a>
                      <ul>
                        <li><a href="../forms/agregar_cliente.html">Agregar Clientes</a></li>
                        <li><a href="../views/clientes.php">Ver Clientes</a></li>
                      </ul>
          </li>
          <li><a href="../conexionDB/logout.php">Cerrar Sesión</a></li>
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
      <div class="col-sm">
          <div id="dato1" >
              <label>Cliente Atendido</label>
              <select  placeholder="Cliente Atendido" name="cliente">
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
              <label>Fecha del Soporte</label>
              <br>
              <input type="date" name="fecha"  placeholder="Hora/Fecha del Soporte">
              <br>

          </div>
  </div>
  <div class="form-row">
      <div id="dato2" >
          <label>Contacto</label>
          <br>
          <input type="text" name="contacto_soporte" placeholder="Contacto de la empresa que llamo para solicitar el soporte">
          <br>
          <label>Solución/Soporte Realizado</label>
          <br>
          <input type="text" name="solucion"  placeholder="Solución o Soporte realizado al cliente">
          <br>
          <label>Tipo de Soporte</label>
          <br>
          <select  placeholder="Tipo de Soporte" name="soporte">
              <?php foreach ($soportes as $soporte):?>
                  <option><?php echo $soporte['soporte']?></option>
              <?php  endforeach; ?>
          </select>
      </div>
      <!--<input type="submit" value="Agregar BItacora" href="">-->
      <div class="botones">
          <input type="submit" value="Agregar Cliente" href="clientes.php">
      </div>
  </div>

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
