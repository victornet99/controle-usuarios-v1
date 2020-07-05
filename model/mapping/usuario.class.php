<?php

class Usuario{

  private $idusuario;
  private $nomeusuario;
  private $sobrenome;
  private $idadeusuario;
  private $contato;
  private $login;
  private $senha;

  # o getIdusuario vai me trazer o conteúdo da variável privada $idusuario
  public function getIdusuario(){
    return $this->idusuario;
  }

  # o setIdusuario vai atribuir um valor para a variável privada $idusuario
  public function setIdusuario($idusuario){
    $this->idusuario = $idusuario;
  }

  public function getNomeusuario(){
    return $this->nomeusuario;
  }

  public function setNomeusuario($nomeusuario){
    $this->nomeusuario = $nomeusuario;
  }

  public function getSobrenome(){
    return $this->sobrenome;
  }

  public function setSobrenome($sobrenome){
    $this->sobrenome = $sobrenome;
  }

  public function getIdadeusuario(){
    return $this->idadeusuario;
  }

  public function setIdadeusuario($idadeusuario){
    $this->idadeusuario = $idadeusuario;
  }

  public function getContato(){
    return $this->contato;
  }

  public function setContato($contato){
    $this->contato = $contato;
  }

  public function getLogin(){
    return $this->login;
  }

  public function setLogin($login){
    $this->login = $login;
  }

  public function getSenha(){
    return $this->senha;
  }

  public function setSenha($senha){
    $this->senha = $senha;
  }

}