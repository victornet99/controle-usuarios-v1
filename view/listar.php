<?php
    include_once('../controller/controleUsuarios.php');
    session_start();

    if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true) and (!isset($_SESSION['nomeusuario']) == true))
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        unset($_SESSION['nomeusuario']);
        echo "<script>alert('Você não está logado. Tente novamente!'); window.location = 'login.php';</script>";
    }

    $userController = new controleUsuarios();
    $lista = $userController->carregarUsuario($userController);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários | Controle de Usuários</title>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="datatables/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="datatables/css/dataTables.bootstrap4.min.css">
    <script src="datatables/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready( function () {
            $('table.display').DataTable();
        } );
    </script>
</head>
<body>

    <div class="container-fluid">

        <?php include 'navbar.php'; ?>

        <div class="my-4"></div>

        <table class="display table table-bordered table-striped" cellspacing="0">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome de Usuário</td>
                    <td>Idade</td>
                    <td>Contato</td>
                    <td>Login</td>
                    <td>Opções</td>
                </tr>
            </thead>
            <tbody>
            <?php
            if($lista->rowCount() == 0){
                ?>
                <tr>
                    <td colspan="6">Nenhum dado a ser exibido. Volte mais tarde.</td>
                </tr>
                <?php
            } else {
                foreach($lista as $l){
                    ?>
                    <tr>
                        <td>
                            <?= $l['idusuario']; ?>
                        </td>
                        <td>
                            <?= $l['nomeusuario']; ?>
                        </td>
                        <td>
                            <?= $l['idadeusuario']; ?>
                        </td>
                        <td>
                            <?= $l['contato']; ?>
                        </td>
                        <td>
                            <?= $l['login']; ?>
                        </td>
                        <td>
                            <a href="atualizar.php?id=<?= $l['idusuario']; ?>">Alterar Usuário</a>
                            <a href="deletar.php?id=<?= $l['idusuario']; ?>">Deletar Usuário</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>

    </div>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html      