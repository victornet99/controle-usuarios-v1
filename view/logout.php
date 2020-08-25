<?php
session_start();

unset ($_SESSION['nomeusuario']);
unset ($_SESSION['usuario']);
unset ($_SESSION['senha']);

session_destroy();

echo "<script>alert('Saiu com sucesso!'); window.location = '../view/login.php';</script>";