<?php

session_start();
$login = $_POST['usuario'];
$senha = $_POST['senha'];

$query =  "select * from usuario where login = '".$login."' and senha = '".$senha."';";

$connect = mysqli_connect('localhost', 'root', '0000','controle-usuarios','3306');
$result = mysqli_query($connect,$query);

if((mysqli_num_rows($result) > 0)&&(mysqli_num_rows($result) < 2)){

    $rows = mysqli_fetch_array($result);
    $_SESSION['nomeusuario'] = $rows['nomeusuario'];
    $_SESSION['usuario'] = $login;
    $_SESSION['senha'] = $senha;

    echo "
		<script>
			alert('Bem vindo, ".$_SESSION['nomeusuario']. "');
			window.location = '../view/index.php';
		</script>
	";
} else {
    unset ($_SESSION['idusuario']);
    unset ($_SESSION['usuario']);
    unset ($_SESSION['senha']);

    echo "
		<script>
			alert('Usuário ou senha inválida');
			window.location = '../view/login.php';
		</script>
	";
}
