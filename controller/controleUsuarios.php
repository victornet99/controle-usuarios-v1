<?php

    include_once '../model/mapping/usuario.class.php';
    include_once '../model/functions/userAccess.class.php';

    header("Content-type: text/html; charset=utf-8");

    class controleUsuarios extends Usuario {

        public function carregarUsuario (Usuario $usuario){

            $user = new UserAccess();
            return $user->listarUsuarios($usuario);

        }

        public function salvarUsuario (Usuario $usuario){

            if(isset($_GET['new'])){
                $usuario->setNomeusuario($_POST['nomeusuario']);
                $usuario->setSobrenome($_POST['sobrenome']);
                $usuario->setIdadeusuario($_POST['idade']);
                $usuario->setContato($_POST['contato']);
                $usuario->setLogin($_POST['login']);
                $usuario->setSenha($_POST['senha']);

                $user = new UserAccess();

                if($user->salvarUsuario($usuario)){
                    echo "<script>alert('Salvo com sucesso!');</script>";
                } else {
                    echo "<script>alert('Erro ao salvar');</script>";
                }

            } else {
                echo "<script>alert('Erro ao processar a requisição.');</script>";
            }
        }

        public function atualizaUsuario (Usuario $usuario){

            if(isset($_GET['id'])){
                $usuario->setIdusuario($_GET['id']);
            } else {
                echo "<script>alert('Nenhum id retornado da tela.');</script>";
            }

            if(isset($_GET['atualizar'])){
                $usuario->setNomeusuario($_POST['nomeusuario']);
                $usuario->setSobrenome($_POST['sobrenome']);
                $usuario->setIdadeusuario($_POST['idade']);
                $usuario->setContato($_POST['contato']);
                $usuario->setLogin($_POST['login']);
                $usuario->setSenha($_POST['senha']);

                $user = new UserAccess();
                if($user->atualizarUsuarios($usuario)){
                    echo "<script>alert('Alterado com sucesso!');</script>";
                } else {
                    echo "<script>alert('Erro ao atualizar');</script>";
                }

            } else {
                
                echo "<script>alert('Erro ao processar a requisição.');</script>";

            }
            $user = new UserAccess();
            return $user->listarUsuarios($usuario);

        }

        public function deletarUsuario (Usuario $usuario){

            if(isset($_GET['id'])){
                $usuario->setIdusuario($_POST['id']);

                $user = new UserAccess();
                if($user->deletarUsuarios($usuario)){
                    echo "<script>alert('Deletado com sucesso!');</script>";
                } else {
                    echo "<script>alert('Erro ao deletar');</script>";
                }
            } else {
                echo "<script>alert('Erro ao processar a requisição.');</script>";
            }
        }
    }