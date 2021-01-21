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
$resultados = $pdo->query("SELECT 
bitacora.nombre_cliente, bitacora.contacto_soporte,
bitacora.motivo, bitacora.solucion, bitacora.fecha, tipo_soporte.soporte, usuarios.usuario
FROM easy_net.bitacora
inner join easy_net.tipo_soporte on easy_net.bitacora.tipo_soporte_id = easy_net.tipo_soporte.id_soporte
inner join easy_net.usuarios on easy_net.bitacora.usuarios_id = easy_net.usuarios.id_usuario");

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
          <li class="menu-active"><a href="../main/MainIn.php">Inicio</a></li>
          <!--<li><a href="#">Mi Bitacora</a></li>-->
          <li class="menu-has-children"><a href="bitacora.php">Bitácora</a>
              <ul>
                  <li><a href="../bitacora/miBitacora.php">Mi Bitácora</a></li>
              </ul>
          </li>
          <li class="menu-has-children"><a href="">Clientes</a>
                      <ul>
                        <li><a href="../forms/agregar_clientes.php">Agregar Clientes</a></li>
                        <li><a href="../views/clientes.php">Ver Clientes</a></li>
                      </ul>
          </li>
            <i class="ion-android-person" style="color: white"></i>
            <li class="menu-has-children"><a href="">Perfil</a>
                <ul>
                    <li><?php echo $_SESSION['iniciado']?></li>
                    <li><a href="../conexionDB/logout.php">Cerrar Sesión</a></li>
                </ul>
            </li>        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- End Header -->
   <script src="https://unpkg.com/vue/dist/vue.js"></script>
        <script src="https://unpkg.com/vuesax"></script>
  <!-- ======= Bitacora ======= -->

  <!-- ======= Intro Section ======= -->
  <section id="intro">


    <div class="intro-text">
        <h2>BITACORAS DE SOPORTE GENERAL</h2>
        <div class="w-75 p-3"  style="background-color: #eeeeee">
            <div class="card-body">
                <div id="table" class="table-editable">

                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <input class="form-control mb-4" id="tableSearch" type="text"
                               placeholder="Busqueda de bitacora">
                        <thead>
                        <tr>
                            <th class="text-center">CLIENTE</th>
                            <th class="text-center">CONTACTO</th>
                            <th class="text-center">MOTIVO</th>
                            <th class="text-center">SOLUCION</th>
                            <th class="text-center">SOPORTE</th>
                            <th class="text-center">FECHA</th>
                            <th class="text-center">SOPORTISTA</th>
                        </tr>
                        </thead>
                        <tbody id="myTable">
                        <?php foreach ($resultados as $bitacoras):?>
                            <tr>
                                <th class="pt-3-half" contenteditable="true"><?php echo $bitacoras['nombre_cliente']?></th>
                                <td class="pt-3-half" contenteditable="true"><?php echo $bitacoras['contacto_soporte']?></td>
                                <td class="pt-3-half" contenteditable="true"><?php echo $bitacoras['motivo']?></td>
                                <td class="pt-3-half" contenteditable="true"><?php echo $bitacoras['solucion']?></td>
                                <td class="pt-3-half" contenteditable="true"><?php echo $bitacoras['soporte']?></td>
                                <td class="pt-3-half" contenteditable="true"><?php echo $bitacoras['fecha']?></td>
                                <td class="pt-3-half" contenteditable="true"><?php echo $bitacoras['usuario']?></td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      <div class="footer">

        <div class="copyright">
          &copy; Copyright <strong>EasyNet</strong>. All Rights Reserved 2020
        </div>
          Designed by <strong>EasyNet Team</strong>
        </div>
      </div>
  </section>
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
