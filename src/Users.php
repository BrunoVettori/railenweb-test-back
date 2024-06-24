<?php

header("Content-type: application/json; charset=UTF-8");

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');

$uris = explode("/", $_SERVER["REQUEST_URI"]);

$method = $_SERVER["REQUEST_METHOD"];

$query = $_SERVER['QUERY_STRING'];

$body =  file_get_contents('php://input');

// if ($method == "GET") {
//     echo $method;
// } elseif ($method == "POST") {
//     echo $method;
// } elseif ($method == "PUT") {
//     echo $method;
// } elseif ($method == "DELETE") {
//     echo $method;
// }

$host = "127.0.0.1";
$user = "user";
$pass = "password";
$dbase = "mydatabase";
$dsn = "mysql:host=$host;dbname=$dbase";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e;
}

$sth = $pdo->prepare('SELECT * FROM produtos');

$sth->execute();

$result = $sth->fetchall();

echo "[";

for ($i = 0; $i < count($result); $i++) {


    $myObjet = new stdClass();

    $myObjet->id = $result[$i][0];
    $myObjet->codigo=$result[$i][1];
    $myObjet->nome=$result[$i][2];
    $myObjet->descricao=$result[$i][3];
    $myObjet->imagem=$result[$i][4];
    $myObjet->valor=$result[$i][5];
    
    $myJSON = json_encode($myObjet);

    echo $myJSON;

    if($i != count($result)-1){
        echo ",";
    }

}

echo "]";
