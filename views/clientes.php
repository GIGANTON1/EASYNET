<?php
require_once "../conexionDB/conexion.php";
$resultados = $pdo->query("SELECT * FROM cliente");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Easy Net - Distribuidor VIP</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
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
  <link href="../assets/css/cliente.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="#intro"><img src="../imgs/logo_easynet.png" alt=""></a>
        <h1><a href="#intro" class="scrollto">Easy Net</a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="../main/MainIn.html">Inicio</a></li>
            <li class="menu-has-children"><a href="">Bitacora</a>
                <ul>
                    <li><a href="#">Mi Bitacora</a></li>
                    <li><a href="../bitacora/bitacora.php">Nueva Bitacora</a></li>
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
      <!-- <a href="#intro"><img src="../imgs/logo_easynet.png" alt=""></a> -->
      <h2>CLIENTES EASY NET</h2>
      <!--<p>Distribuidor Autorizado de PSKLOUD</p>-->
      <!-- TABLA DE CLIENTES -->
      <div class="d-flex justify-content-center">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre Cliente</th>
            <th scope="col">R.T.N.</th>
            <th scope="col">Dirección del Cliente</th>
            <th scope="col">Contacto Principal</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Correo</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($resultados as $cliente):?>
              <tr>
                  <th scope="row"><?php echo $cliente['id_cliente']?></th>
                  <td><?php echo $cliente['nombre_cliente']?></td>
                  <td><?php echo $cliente['rtn']?></td>
                  <td><?php echo $cliente['direccion']?></td>
                  <td><?php echo $cliente['contacto']?></td>
                  <td><?php echo $cliente['telefono']?></td>
                  <td><?php echo $cliente['correo']?></td>
              </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
</div>
<div class="botones">
    <a href="../forms/agregar_cliente.html">Agregar Nuevo Cliente</a>
    <a href="../fpdf/lista_clientes.php">Guardar en PDF</a>
</div>
      <!-- END TABLA DE CLIENTES -->

      <div class="footer">
        <div class="copyright">
          &copy; Copyright <strong>Easy Net</strong>. All Rights Reserved 2020
        </div>
          Designed by <strong>Easy Net Team</strong>
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
