<?php

  /*
     Esta classe é a mesma declarada, apenas com um novo nome e
     em vez de utilizar os getters e setters vistos anteriormente, utiliza
     métodos mágicos de acesso aos dados privados
  */

class Usuario{

  private $idusuario;
  private $nomeusuario;
  private $sobrenome;
  private $idadeusuario;
  private $contato;
  private $login;
  private $senha;

  # O get retorna o valor contido na variável privada
  public function __get($name){
    return $this->$name;
  }

  # O set atribui um valor para dentro da variável privada
  public function __set($name, $value){
    $this->$name = $value;
  }

}