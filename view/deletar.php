<?php

    session_start();
    if ((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true) and (!isset($_SESSION['nomeusuario']) == true)) {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        echo "<script>alert('Você não está logado. Tente novamente!'); window.location = 'login.php';</script>";
    }


    include_once '../controller/controleUsuarios.php';

    $controlador = new controleUsuarios();
    $controlador->deletarUsuario($controlador);