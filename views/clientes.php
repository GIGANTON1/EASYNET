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
    $usuario = $_SESSION['iniciado'];
    header("Location: ../forms/login_form.php");
    exit();
}
$resultados = $pdo->query("select cliente.id_cliente, cliente.rtn, cliente.nombre_cliente, cliente.direccion, cliente.correo, cliente.telefono, 
 usuarios.usuario from easy_net.cliente inner join usuarios on easy_net.cliente.usuarios_id = easy_net.usuarios.id_usuario");

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
    <link rel="shortcut icon" type="image/x-icon" href="../imgs/logo_easynet.ico"/>

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
      <h2>CLIENTES EASYNET</h2>
      <!-- TABLA DE CLIENTES -->

        <div class="w-75 p-3"  style="background-color: #eeeeee">
            <div class="card-body">
                <div id="table" class="table-editable">

                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <input class="form-control mb-4" id="tableSearch" type="text"
                               placeholder="Busqueda de clientes...">
                        <thead>
                        <tr>
                            <th class="text-center">R.T.N.</th>
                            <th class="text-center">EMPRESA</th>
                            <th class="text-center">DIRECCION</th>
                            <th class="text-center">CORREO</th>
                            <th class="text-center">TELEFONO</th>
                            <th class="text-center">SOPORTISTA</th>
                            <th class="text-center">BORRAR</th>
                            <th class="text-center">EDITAR</th>
                        </tr>
                        </thead>
                        <tbody id="myTable">
                        <?php foreach ($resultados as $cliente):?>
                        <tr>
                            <th class="pt-3-half" contenteditable="true"><?php echo $cliente['rtn']?></th>
                            <td class="pt-3-half" contenteditable="true"><?php echo $cliente['nombre_cliente']?></td>
                            <td class="pt-3-half" contenteditable="true"><?php echo $cliente['direccion']?></td>
                            <td class="pt-3-half" contenteditable="true"><?php echo $cliente['correo']?></td>
                            <td class="pt-3-half" contenteditable="true"><?php echo $cliente['telefono']?></td>
                            <td class="pt-3-half" contenteditable="true"><?php echo $cliente['usuario']?></td>
                            <td>
                                <span class="table-remove"><button type="button" role="link     " onclick="location.href='../conexionDB/eliminar_cliente.php?id_cliente=<?php echo $cliente['id_cliente']?>  '; "
                                                                   class="btn btn-danger btn-rounded btn-sm my-0">Eliminar</button></span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" role="link" onclick="location.href='../forms/actualizar_cliente.php?id_cliente=<?php echo $cliente['id_cliente']?>'; "><i class="ion-edit" ></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="botones">
            <a href="../forms/agregar_clientes.php">Agregar Nuevo Cliente</a>
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
        <script>
            const $tableID = $('#table');
            const $BTN = $('#export-btn');
            const $EXPORT = $('#export');
            $tableID.on('click', '.table-remove', function () {
                $(this).parents('tr').detach();
            });
            // A few jQuery helpers for exporting only
            jQuery.fn.pop = [].pop;
            jQuery.fn.shift = [].shift;

            $BTN.on('click', () => {

                const $rows = $tableID.find('tr:not(:hidden)');
                const headers = [];
                const data = [];

                // Get the headers (add special header logic here)
                $($rows.shift()).find('th:not(:empty)').each(function () {

                    headers.push($(this).text().toLowerCase());
                });

                // Turn all existing rows into a loopable array
                $rows.each(function () {
                    const $td = $(this).find('td');
                    const h = {};

                    // Use the headers from earlier to name our hash keys
                    headers.forEach((header, i) => {

                        h[header] = $td.eq(i).text();
                    });

                    data.push(h);
                });

                // Output the result
                $EXPORT.text(JSON.stringify(data));
            });
        </script>
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
