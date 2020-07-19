<?php

include_once '../database/db-connect.php';
include_once '../mapping/usuario.class.php';

class userAccess {

  public function salvarUsuario (Usuario $usuario) {

    try {
      
      # Abre a conexão com o banco de dados
      $conexao = getConnection();

      # Aqui na variável $sql vai estar a expressão que irá salvar os dados
      # no banco de dados
      $sql = 'INSERT INTO usuario VALUES (null, :nome, :sobrenome, :idade, '.
             ':contato, :login, :senha);';
      
      # A variável statement será responsável por executar os métodos de comunicação
      # com o banco de dados. Neste caso, o prepare irá "preparar" a expressão SQL 
      # a ser executada no sistema, ocultando os valores passados na query SQL
      $statement = $conexao->prepare($sql);
      
      # Os bindValues serão responsáveis por indicar quais valores serão passados
      # dentro da transação SQL que será realizada, e os PDO::PARAM_STR e PDO::PARAM_INT
      # são responsáveis por dizer que tipos de dados serão passados dentro dessas
      # expressões. Nesse caso, STR para string e INT para integer

      $statement->bindValue(':nome', $usuario->getNomeusuario(), PDO::PARAM_STR);
      $statement->bindValue(':sobrenome', $usuario->getSobrenome(), PDO::PARAM_STR);
      $statement->bindValue(':idade', $usuario->getIdadeusuario(), PDO::PARAM_INT);
      $statement->bindValue(':contato', $usuario->getContato(), PDO::PARAM_INT);
      $statement->bindValue(':login', $usuario->getLogin(), PDO::PARAM_STR);
      $statement->bindValue(':senha', $usuario->getSenha(), PDO::PARAM_STR);

      # O execute será responsável por executar a expressão SQL dentro do MySQL, com todos
      # os valores devidamente tratados, nas expressões acima
      $statement->execute();
      
      # O rowCount é responsável por contar quantas linhas foram modificadas pelo método
      # execute() do PDO. Neste caso, se o rowCount() retornar um valor maior que zero,
      # significa que a expressão executou adequadamente, retorna verdadeiro e encerra
      # a execução da função salvarUsuario()
      if($statement->rowCount() > 0){
        return true;
      }
      
      # Se o if retornar falso, a função é encerrada aqui, retornando falso, informando ao
      # controlador de que a expressão dentro do banco de dados não funcionou conforme
      # deveria
      return false;

    } catch (PDOException $exception) {

      # Retorna um erro, que está relacionado a aglum problema mais técnico da base de dados,
      # como problemas de driver, de transação SQL, etc.
      echo "A função retornou o seguinte erro: " . $exception->getMessage();

    }

  }

  public function listarUsuarios (Usuario $usuario) {

    try{

      # Abre a conexão com o banco de dados
      $conexao = getConnection();
      
      # Executa este if se o controlador não retornar nenhum ID para realizar a pesquisa
      # no banco de dados
      if($usuario->getIdusuario() == null){

        # Cria uma função de pesquisa no banco de dados, a função "query". Dentro dela,
        # é informado o SELECT a ser realizado dentro da tabela, ou seja, como não tem
        # id, ela retorna todos os dados que tem na tabela
        $statement = $conexao->query('SELECT * FROM usuario');

        # Retorna os valores de statement que serão acessados na tela para o usuário
        return $statement;
      
      # Caso a expressão retorne um ID vindo do controlador, o else é executado
      } else {

        # Cria uma função de pesquisa no banco de dados, a função "query". Dentro dela,
        # é informado o SELECT a ser realizado dentro da tabela, ou seja, como agora
        # teremos um ID, vai ser informado na query para que traga os dados que tenham
        # naquele id
        $statement = $conexao->query('SELECT * FROM usuario WHERE idusuario ='. $usuario->getIdusuario() . ';');
        
        # Cria uma variável chamada $resultset e ela receberá os dados oriundos da query
        # criando um array (uma matriz, para ser mais específico). Informando o 
        # PDO::FETCH_ASSOC, ele torna a matriz associativa, tornando a leitura dos dados
        # mais simplificada
        $resultset = $statement->fetch(PDO::FETCH_ASSOC);
        
        # Atribui aos atributos da classe Usuário, os valores que vem do banco de dados,
        # que estão no vetor associativo, gerado pelo fetch(). Vale lembrar de que os
        # indices do vetor associativo são os nomes das colunas do banco de dados
        $usuario->setIdusuario($resultset['idusuario']);
        $usuario->setNomeusuario($resultset['nomeusuario']);
        $usuario->setSobrenome($resultset['sobrenome']);
        $usuario->setIdadeusuario($resultset['idadeusuario']);
        $usuario->setContato($resultset['contato']);
        $usuario->setLogin($resultset['login']);
        $usuario->setSenha($resultset['senha']);

      }
      
      # Retorna a função nula, em caso de erro ao pesquisar as informações no if-else
      # acima
      return null;

    } catch (PDOException $exception) {

      # Retorna um erro, que está relacionado a aglum problema mais técnico da base de dados,
      # como problemas de driver, de transação SQL, etc.
      echo "A função retornou o seguinte erro: " . $exception->getMessage();

    }

  }

  public function atualizarUsuarios (Usuario $usuario) {

    try {
      
      $conexao = getConnection();
      $sql = 'UPDATE usuario SET nome = :nome, sobrenome = :sobrenome, idade = :idade,'.
      ' contato = :contato, login = :login, senha = :senha WHERE idusuario = :id';

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
      $statement->prepare($sql);
      
      $statement->bindValue(':iduser', $usuario->getIdusuario(), PDO::PARAM_INT);
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