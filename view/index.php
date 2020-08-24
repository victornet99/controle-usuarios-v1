<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponto de Partida | Controle de Usuários</title>
</head>
<body>
    <?php
        session_start();
        if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true) and (!isset($_SESSION['nomeusuario']) == true))
        {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            echo "<script>alert('Você não está logado. Tente novamente!'); window.location = 'login.php';</script>";
        }
    ?>
    <h1>Sistema de Controle de Usuários</h1>
    <hr><br>
    <h3>
        <a href="cadastrar.php" target="_blank">
            Cadastrar Usuários
        </a>
    </h3>
    <h3>
        <a href="listar.php" target="_blank">
            Listar Usuários
        </a>
    </h3>
    <h3>
        <a href="logout.php">
            Sair
        </a>
    </h3>
</body>
</html>