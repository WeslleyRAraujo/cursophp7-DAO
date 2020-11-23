<?php

//a classe criada extende do PDO do php entao tera todas as funcoes
class Sql extends PDO {

  private $conn;

  //construtor para criar a conexao com o banco
  public function __construct(){
    $this->conn = new PDO("mysql:host=127.0.0.1;dbname=dbphp7", "root", "40912398");
  }

  //funcao para setar os parametros, pegar o statment
  private function setParams($statment, $parameters = array()){
    foreach ($parameters as $key => $value) {
      $statment->setParam($statment, $key, $value);
    }
  }

  private function setParam($statment, $key, $value){
    $statment->bindParam($key, $value);
  }

  public function query($rawQuery, $params = array()){
    $stmt = $this->conn->prepare($rawQuery);

    $this->setParams($stmt, $params);

    $stmt->execute();

    return $stmt;
  }

  public function select($rawQuery, $params = array()):array{
    $stmt = $this->query($rawQuery, $params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);


  }

}


?>
