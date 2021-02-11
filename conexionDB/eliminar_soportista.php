<?php
require '../conexionDB/conexion.php';
try {
    $sql =$pdo->query("DELETE FROM usuarios WHERE id_usuario='" . $_GET["id_usuario"] . "'");
}catch (PDOException $e){
//    echo "Error guapo->>> ".$e->getMessage();
    echo "<script>
                alert('El Soportista contiene historial, debe cambiar su estado laboral');
                window.location= '../views/soportistas.php'
    </script>";
}
if ($sql){
    echo "<script>
                alert('Soportista Eliminado');
                window.location= '../views/soportistas.php'
    </script>";
}
?>