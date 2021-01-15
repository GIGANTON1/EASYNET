<?php
    session_start();

    if (isset($_SESSION['cargo']))
    {
        header('location: ../forms/login.html');
    }else{
        if ($_SESSION['rol'] != 1){
            header('location: ../forms/login.html');
        }
    }
echo 'ADMINISTRADOR';
?>