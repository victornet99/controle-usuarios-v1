<?php
    include_once('../controller/controleUsuarios.php');
    session_start();

    if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true) and (!isset($_SESSION['nomeusuario']) == true))
    {
        unset($_SESSION['nomeusuario']);
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        echo "<script>alert('Você não está logado. Tente novamente!'); window.location = 'login.php';</script>";
    }

    $user = new controleUsuarios();
    $user->salvarUsuario($user);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Usuário | Controle de Usuários</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <div class="container-fluid">

        <?php include 'navbar.php'; ?>

        <div class="container">

            <div class="my-4"></div>

            <div class="jumbotron">
                <h1 class="display-4">Cadastro de Usuários</h1>
                <p class="lead">Informe os dados antes de continuar</p>
                <hr class="my-2">
            </div>

            <div class="my-4"></div>

            <form action="?new" method="post">
                <div class="form-row">
                    <div class="col-7">
                        <label for="nomeusuario">Nome do Usuário</label>&nbsp;&nbsp;&nbsp;
                        <input class="form-control" type="text" name="nomeusuario" placeholder="Digite aqui o nome do usuário" required>
                    </div>
                    <div class="col-5">
                        <label for="sobrenome">Sobrenome do Usuário</label>&nbsp;&nbsp;&nbsp;
                        <input class="form-control" type="text" name="sobrenome" placeholder="Digite aqui o sobrenome" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <label for="idade">Idade do Usuário</label>
                        <input type="text" class="form-control" name="idade" placeholder="Digite aqui a idade do usuário" required>
                    </div>
                    <div class="col-6">
                        <label for="contato">Contato do Usuário</label>
                        <input type="text" class="form-control" name="contato" placeholder="Digite aqui o telefone" required>
                    </div>
                    <div class="col-6">
                        <label for="login">Login de Usuário</label>
                        <input type="text" class="form-control" name="login" placeholder="Digite o login de usuário" required>
                    </div>
                    <div class="col-6">
                        <label for="senha">Senha de Usuário</label>
                        <input type="password" class="form-control" name="senha" placeholder="Digite o login de usuário" required>
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-12 text-center">
                        <input type="submit" value="Salvar Informações" class="btn btn-outline-success">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>