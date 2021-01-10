<?php
require_once "../conexionDB/logedin.php";
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
          <li class="menu-has-children"><a href="">Bítacora/Soporte Técnico</a>
                          <ul>
                            <li><a href="#">Mi Bitacora</a></li>
                            <li><a href="../bitacora/bitacora.php">Nueva Bitacora</a></li>
                            <li><a href="../views/clientes.php">Clientes</a></li>
                            <li><a href="../forms/agregar_cliente.html">Agregar Nuevo Cliente</a></li>
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
