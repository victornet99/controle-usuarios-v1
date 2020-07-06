<?php

  function getConnection(){
    
    # 1 - Estas tres variáveis recebem os valores que serão usados como para-
    # metro dentro da função PDO, que está dentro do try
    $instancia = 'mysql:host=localhost;dbname=controle-usuarios;charset=utf8';
    $usuario = 'root';
    $senha = '0000';
    
    try{
      
      # 2 - Foi criada a variável $pdo, que recebe uma nova instancia da classe
      # PDO (tendo como parametros os valores passados dentro das variáveis aci-
      # ma)
      $pdo = new PDO($instancia, $usuario, $senha);
      
      # Após instanciar a conexão, ela retorna a instancia realizada dentro da
      # variável $pdo, para que seja usada no decorrer do projeto
      return $pdo;

    } catch (PDOException $exception) {
      
      # 3 - Caso algum erro na conexão aconteça, é exibida uma mensagem de erro
      # ao usuário
      echo "Erro na conexão: " . $exception->getMessage();

    }

  }