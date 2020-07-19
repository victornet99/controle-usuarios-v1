<?php
    include_once('../controller/controleUsuarios.php');
    $user = new controleUsuarios();
    $user->salvarUsuario($user);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Usuário | Controle de Usuários</title>
</head>
<body>
    <form action="?new" method="post">

        <h2>Cadastrar Novo Usuário</h2>
        <hr>

        <label for="nomeusuario">Nome do Usuário</label>&nbsp;&nbsp;&nbsp;
        <input type="text" name="nomeusuario" placeholder="Digite aqui o nome do usuário" required>

        <br><br>

        <label for="sobrenome">Sobrenome do Usuário</label>&nbsp;&nbsp;&nbsp;
        <input type="text" name="sobrenome" placeholder="Digite aqui o sobrenome" required>

        <br><br>

        <label for="idade">Idade do Usuário</label>&nbsp;&nbsp;&nbsp;
        <input type="text" name="idade" placeholder="Digite aqui a idade do usuário" required>

        <br><br>

        <label for="contato">Contato do Usuário</label>&nbsp;&nbsp;&nbsp;
        <input type="text" name="contato" placeholder="Digite aqui o telefone" required>

        <br><br>

        <label for="login">Login de Usuário</label>&nbsp;&nbsp;&nbsp;
        <input type="text" name="login" placeholder="Digite o login de usuário" required>

        <br><br>

        <label for="senha">Senha de Usuário</label>&nbsp;&nbsp;&nbsp;
        <input type="password" name="senha" placeholder="Digite o login de usuário" required>

        <br><br>

        <input type="submit" value="Salvar Informações">
        <br><br>

    </form>
</body>
</html>