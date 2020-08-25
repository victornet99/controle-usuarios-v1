<?php

include_once '../model/database/db-connect.php';
session_start();

$connection = getConnection();
$query =  "select * from usuario where login = :login and senha = :senha;";

$statement = $connection->prepare($query);
$statement->bindParam(':login', $_POST['usuario']);
$statement->bindParam(':senha', $_POST['senha']);
$statement->execute();

$resultset = $statement->fetch(PDO::FETCH_ASSOC);

if($statement->rowCount() == 1){

    $_SESSION['nomeusuario'] = $resultset['nomeusuario'];
    $_SESSION['usuario'] = $resultset['login'];
    $_SESSION['senha'] = $resultset['senha'];

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
