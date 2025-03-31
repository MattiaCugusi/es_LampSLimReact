<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AlunniController
{
  public function index(Request $request, Response $response, $args){
    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    $result = $Db::->query("SELECT * FROM alunni");
    $results = $result->fetch_all(MYSQLI_ASSOC);

    $response->getBody()->write(json_encode($results));
    return $response->withHeader("Content-type", "application/json")->withStatus(200);
  }

  public function show(Request $request, Response $response, $args){
    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    $result = $mysqli_connection->query("SELECT * FROM alunni WHERE id = " . $args['id'])->fetch_assoc();

    $response->getBody()->write(json_encode($result));
    return $response->withHeader("Content-type", "application/json")->withStatus(200);

  }

  public function create(Request $request, Response $response, $args){
    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    $body = json_decode($request->getBody()->getContents(), true);
    $nome = $body["nome"];
    $cognome = $body["cognome"];

    $result = $mysqli_connection->query("INSERT INTO alunni (nome,cognome) VALUES ('$nome', '$cognome'");
    
    //inserimento nel DB

    $response->getBody()->write($result);
      return $response->withHeader("Content-type", "application/json")->withStatus(200);
  }

  public function update(Request $request, Response $response, $args){
    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    $body = json_decode($request->getBody()->getContents(), true);
    $nome = $body["nome"];
    $cognome = $body["cognome"];
    $result = $mysqli_connection->query("UPDATE alunni SET nome = '$nome', cognome = '$cognome' WHERE id = " . $args['id']);
    $response->getBody()->write($result);
    return $response->withHeader("Content-type", "application/json")->withStatus(200);
  }

  public function delete(Request $request, Response $response, $args){
  }

}

?>