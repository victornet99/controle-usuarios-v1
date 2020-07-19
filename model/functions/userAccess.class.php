<?php

include_once '../model/database/db-connect.php';
include_once '../model/mapping/usuario.class.php';

class userAccess {

  public function salvarUsuarios (Usuario $usuario) {

    try {

      $conexao = getConnection();

      $sql = 'INSERT INTO usuario VALUES (null, :nome, :sobrenome, :idade, '.
             ':contato, :login, :senha);';

      $statement = $conexao->prepare($sql);

      $statement->bindValue(':nome', $usuario->getNomeusuario(), PDO::PARAM_STR);
      $statement->bindValue(':sobrenome', $usuario->getSobrenome(), PDO::PARAM_STR);
      $statement->bindValue(':idade', $usuario->getIdadeusuario(), PDO::PARAM_INT);
      $statement->bindValue(':contato', $usuario->getContato(), PDO::PARAM_INT);
      $statement->bindValue(':login', $usuario->getLogin(), PDO::PARAM_STR);
      $statement->bindValue(':senha', $usuario->getSenha(), PDO::PARAM_STR);

      $statement->execute();

      if($statement->rowCount() > 0){
        return true;
      }

      return false;

    } catch (PDOException $exception) {

      echo "A função retornou o seguinte erro: " . $exception->getMessage();

    }

  }

  public function listarUsuarios (Usuario $usuario) {

    try{

      $conexao = getConnection();

      if($usuario->getIdusuario() == null){

        $statement = $conexao->query('SELECT * FROM usuario');

        return $statement;

      } else {

        $statement = $conexao->query('SELECT * FROM usuario WHERE idusuario ='. $usuario->getIdusuario() . ';');
        
        $resultset = $statement->fetch(PDO::FETCH_ASSOC);
        
        $usuario->setIdusuario($resultset['idusuario']);
        $usuario->setNomeusuario($resultset['nomeusuario']);
        $usuario->setSobrenome($resultset['sobrenome']);
        $usuario->setIdadeusuario($resultset['idadeusuario']);
        $usuario->setContato($resultset['contato']);
        $usuario->setLogin($resultset['login']);
        $usuario->setSenha($resultset['senha']);

      }
  
      return null;

    } catch (PDOException $exception) {

      echo "A função retornou o seguinte erro: " . $exception->getMessage();

    }

  }

  public function atualizarUsuarios (Usuario $usuario) {

    try {
      
      $conexao = getConnection();
      $sql = 'UPDATE usuario SET nomeusuario = :nome, sobrenome = :sobrenome, idadeusuario = :idade, contato = :contato, login = :login, senha = :senha WHERE idusuario = :id';

      $statement = $conexao->prepare($sql);

      $statement->bindValue(':nome', $usuario->getNomeusuario(), PDO::PARAM_STR);
      $statement->bindValue(':sobrenome', $usuario->getSobrenome(), PDO::PARAM_STR);
      $statement->bindValue(':idade', $usuario->getIdadeusuario(), PDO::PARAM_INT);
      $statement->bindValue(':contato', $usuario->getContato(), PDO::PARAM_INT);
      $statement->bindValue(':login', $usuario->getLogin(), PDO::PARAM_STR);
      $statement->bindValue(':senha', $usuario->getSenha(), PDO::PARAM_STR);
      $statement->bindValue(':id', $usuario->getIdusuario(), PDO::PARAM_INT);

      $statement->execute();

      if($statement->rowCount() > 0){
        return true;
      }

      return false;

    } catch (PDOException $exception) {
      
      echo "A função retornou o seguinte erro: " . $exception->getMessage();

    }
  }

  public function deletarUsuarios (Usuario $usuario) {

    try {
      
      $conexao = getConnection();
      $sql = 'DELETE FROM usuario WHERE idusuario = :id';
      $statement = $conexao->prepare($sql);
      
      $statement->bindValue(':id', $usuario->getIdusuario(), PDO::PARAM_INT);
      $statement->execute();

      if($statement->rowCount() > 0){
        return true;
      }

      return false;

    } catch (PDOException $exception) {
      
      echo "A função retornou o seguinte erro: " . $exception->getMessage();

    }

  }

}