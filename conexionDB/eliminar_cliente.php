<?php
require '../conexionDB/conexion.php';
$sql =$pdo->query("DELETE FROM cliente WHERE id_cliente='" . $_GET["id_cliente"] . "'");
if ($sql){
    echo "<script>
                alert('Cliente Eliminado');
                window.location= '../views/clientes.php'
    </script>";
}else{
    echo "<script>
                alert('Error al eliminar al Cliente.');
                 window.location= '../views/clientes.php'
    </script>";
}
?>