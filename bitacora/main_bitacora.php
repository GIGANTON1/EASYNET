<?php
require_once "../conexionDB/conexion.php";
$resultados = $pdo->query("SELECT * FROM bitacora");

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
  <link href="../assets/css/bitacora.css" rel="stylesheet">

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

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Inicio</a></li>
          <!--<li><a href="#">Mi Bitacora</a></li>-->
          <li class="menu-has-children"><a href="bitacora.php">Bitácora</a>

          </li>
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
   <script src="https://unpkg.com/vue/dist/vue.js"></script>
        <script src="https://unpkg.com/vuesax"></script>
  <!-- ======= Bitacora ======= -->

  <!-- ======= Intro Section ======= -->
  <section id="intro">


    <div class="intro-text">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Fecha de Soporte</th>
            <th scope="col">Cliente Atendido</th>
            <th scope="col">Motivo de Soporte</th>
            <th scope="col">Soporte Dado</th>
            <th scope="col">Soporte solicitado por</th>
          </tr>
        </thead>
          <tbody id="myTable"    >
          <?php foreach ($resultados as $bitacora):?>
              <tr>
                  <th scope="row"><?php echo $bitacora['fecha']?></th>
                  <td><?php echo $bitacora['nombre_cliente']?></td>
                  <td><?php echo $bitacora['motivo']?></td>
                  <td><?php echo $bitacora['soporte']?></td>
                  <td><?php echo $bitacora['contacto_soporte']?></td>

              </tr>
          <?php endforeach; ?>
          </tbody>
      </table>
      <div class="footer">

        <div class="copyright">
          &copy; Copyright <strong>EasyNet</strong>. All Rights Reserved 2020
        </div>
          Designed by <strong>EasyNet Team</strong>
        </div>
      </div>

  </section>
  <!-- End Intro Section -->
<!--  <div class="footer">
    <div class="col-lg-6 text-lg-left text-center">
      <div class="copyright">
        &copy; Copyright <strong>Easy Net</strong>. All Rights Reserved 2020
      </div>
        Designed by <strong>Easy Net Team</strong>
      </div>
    </div>
  </div>-->

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