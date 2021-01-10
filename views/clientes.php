<?php
require_once "../conexionDB/conexion.php";
$resultados = $pdo->query("SELECT * FROM cliente");
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

      <title>EasyNet - Clientes</title>
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
    <!-- MdBootstrap jquery -->
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/mdb.min.js"></script>
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
            <li class="menu-has-children"><a href="">Bitacora</a>
                <ul>
                    <li><a href="#">Mi Bitacora</a></li>
                    <li><a href="../bitacora/bitacora.php">Nueva Bitacora</a></li>
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
      <!-- <a href="#intro"><img src="../imgs/logo_easynet.png" alt=""></a> -->
      <h2>CLIENTES EASYNET</h2>
      <!--<p>Distribuidor Autorizado de PSKLOUD</p>-->
      <!-- TABLA DE CLIENTES -->

      <div class="table-responsive-l">
          <input class="form-control mb-4" id="tableSearch" type="text"
                 placeholder="Busqueda de clientes...">
      <table class="table table-hover" style="color:#fff">
        <thead>
          <tr>
              <th scope="col">R.T.N.</th>
              <th scope="col">Nombre Cliente</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Acción</th>
          </tr>
        </thead>
        <tbody id="myTable"     >
          <?php foreach ($resultados as $cliente):?>
              <tr>
                  <th scope="row"><?php echo $cliente['rtn']?></th>
                  <td><?php echo $cliente['nombre_cliente']?></td>
                  <td><?php echo $cliente['telefono']?></td>
                  <td><submitt onclick="windowOpen()" class="icon"><i class="ion-ios-gear-outline"></i></submitt></td>
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
            &copy; Copyright <strong>EasyNet</strong>. Todos Derechos Reservados 2020
        </div>
          <div class="credits">
              Somos <strong>Equipo EasyNet</strong>
          </div>
      </div>
        <script>
            $(document).ready(function(){
                $("#tableSearch").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>

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
  <script>
      var Window;
      function windowOpen() {
          Window = window.open(
              "../forms/login.html",
              "_blank", "width=400, height=450");
      }

  </script>
</body>

</html>
