<?php

//a classe criada extende do PDO do php entao tera todas as funcoes
class Sql extends PDO {

  //atribuito de conexao com o banco
  private $conn;

  //construtor para criar a conexao com o banco
  public function __construct(){
    $this->conn = new PDO("mysql:host=127.0.0.1;dbname=dbphp7", "root", "40912398");
  }

  //passamos para o metodo setParams o nosso stmt e os parametros por meio de um array
  private function setParams($statment, $parameters = array()){
    //damos um foreach para atribuirmos chave e valor
    foreach ($parameters as $key => $value) {
      //passamos para o metodo setParam o statment, chave e valor so para bindar as variaveis do banco
      $this->setParam($statment, $key, $value);
    }
  }

  //passamos os parametros do stmt, chave e valor e bindamos os resultados
  private function setParam($statment, $key, $value){
    //o statment esta bindando a chave e o valor
    $statment->bindParam($key, $value);
  }

  //metodo query onde passamos a querycrua (rawquery) e um array com o parametro para pegarmos do banco
  public function query($rawQuery, $params = array()){
    //o stmt pega a nossa a nossa conexao e prepara nossa query
    $stmt = $this->conn->prepare($rawQuery);

    //setamos os parametros da nossa querycrua com o params que esta em nosso array, dessa forma os valores sao atribuidos pela chave e valor da proprio array.
    $this->setParams($stmt, $params);

    //executamos
    $stmt->execute();

    //retornamos o resultado
    return $stmt;
  }

  //metodo select, onde passamos a query crua (rawquery) e um array com o parametro para pegarmos do banco
  public function select($rawQuery, $params = array()):array{
    //passamos os resultados para a variavel $stmt que que ira herdar os resultados do nosso metodo query
    $stmt = $this->query($rawQuery, $params);
    //retornando somente as chaves e valores sem indices, por isso usamos o PDO::FETCH_ASSOC
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

?>
