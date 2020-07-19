<?php
    include_once('../controller/controleUsuarios.php');
    $usuario = new controleUsuarios();
    $usuario->atualizaUsuario($usuario);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Usuário | Controle de Usuários</title>
</head>
<body>
    <form action="atualizar.php?atualizar&id=<?= $usuario->getIdusuario(); ?>" method="post">

        <h2>Cadastrar Novo Usuário</h2>
        <hr>

        <label for="nomeusuario">Nome do Usuário</label>&nbsp;&nbsp;&nbsp;
        <input type="text" name="nomeusuario" placeholder="Digite aqui o nome do usuário" required value="<?= $usuario->getNomeusuario(); ?>">

        <br><br>

        <label for="sobrenome">Sobrenome do Usuário</label>&nbsp;&nbsp;&nbsp;
        <input type="text" name="sobrenome" placeholder="Digite aqui o sobrenome" required value="<?= $usuario->getSobrenome(); ?>">

        <br><br>

        <label for="idade">Idade do Usuário</label>&nbsp;&nbsp;&nbsp;
        <input type="text" name="idade" placeholder="Digite aqui a idade do usuário" required value="<?= $usuario->getIdadeusuario(); ?>">

        <br><br>

        <label for="contato">Contato do Usuário</label>&nbsp;&nbsp;&nbsp;
        <input type="text" name="contato" placeholder="Digite aqui o telefone" required value="<?= $usuario->getContato(); ?>">

        <br><br>

        <label for="login">Login de Usuário</label>&nbsp;&nbsp;&nbsp;
        <input type="text" name="login" placeholder="Digite o login de usuário" required value="<?= $usuario->getLogin(); ?>">

        <br><br>

        <label for="senha">Senha de Usuário</label>&nbsp;&nbsp;&nbsp;
        <input type="password" name="senha" placeholder="Digite o login de usuário" required value="<?= $usuario->getSenha(); ?>">

        <br><br>

        <input type="submit" value="Atualizar Informações">
        <br><br>

    </form>
</body>
</html>