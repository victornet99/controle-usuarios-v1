<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="my-4"></div>

        <form action="../controller/auth.php" method="post" class="text-center">
            <div class="form-row d-flex justify-content-center">
                <div class="col-5">
                    <div class="form-group">
                        <label for="log">Login</label>
                        <input type="text" class="form-control" name="usuario" id="usuario">
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-5">
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha">
                    </div>
                </div>
            </div>

            <div class="my-4"></div>

            <input type="submit" class="btn btn-lg btn-success" value="Logar">

        </form>

    </div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>