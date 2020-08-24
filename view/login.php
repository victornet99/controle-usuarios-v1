<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="../controller/auth.php" method="post">
        <label for="log">Login</label>
        <input type="text" name="usuario" id="usuario">
        <label for="password">Senha</label>
        <input type="password" name="senha" id="senha">
        <input type="submit" value="Logar">
    </form>
</body>
</html>