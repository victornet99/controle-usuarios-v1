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

                if($user->salvarUsuarios($usuario)){
                    echo "<script>alert('Salvo com sucesso!'); window.location = '../view/index.php';</script>";
                } else {
                    echo "<script>alert('Erro ao salvar'); window.location = '../view/index.php';</script>";
                }
            }
           
        }

        public function atualizaUsuario (Usuario $usuario){

            if(isset($_GET['id'])){
                $usuario->setIdusuario($_GET['id']);
            } 

            if(isset($_GET['atualizar'])){
                $usuario->setNomeusuario($_POST['nomeusuario']);
                $usuario->setSobrenome($_POST['sobrenome']);
                $usuario->setIdadeusuario($_POST['idade']);
                $usuario->setContato($_POST['contato']);
                $usuario->setLogin($_POST['login']);
                $usuario->setSenha($_POST['senha']);

                $user = new userAccess();
                if($user->atualizarUsuarios($usuario)){
                    echo "<script>alert('Alterado com sucesso!'); window.location = '../view/listar.php';</script>";
                } else {
                    echo "<script>alert('Erro ao atualizar'); window.location = '../view/listar.php';</script>";
                }
            }

            $user = new userAccess();
            return $user->listarUsuarios($usuario);
        }

        public function deletarUsuario (Usuario $usuario){

            if(isset($_GET['id'])){
                $usuario->setIdusuario($_GET['id']);

                $user = new UserAccess();
                if($user->deletarUsuarios($usuario)){
                    echo "<script>alert('Deletado com sucesso!'); window.location = '../view/listar.php';</script>";
                } else {
                    echo "<script>alert('Erro ao deletar'); window.location = '../view/listar.php';</script>";
                }
            } 
        }
    }