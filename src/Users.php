<?php

header("Content-type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header('Access-Control-Allow-Credentials: false');

$uris = explode("/", $_SERVER["REQUEST_URI"]);

$method = $_SERVER["REQUEST_METHOD"];

$body =  file_get_contents('php://input');

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

if ($method == "GET") {

    $sth = $pdo->prepare('SELECT * FROM usuarios');

    $sth->execute();

    $result = $sth->fetchall();

    echo "[";

    for ($i = 0; $i < count($result); $i++) {

        $myObjet = new stdClass();

        $myObjet->id = $result[$i][0];
        $myObjet->roles = $result[$i][1];
        $myObjet->nome = $result[$i][2];
        $myObjet->senha = $result[$i][3];

        $myJSON = json_encode($myObjet);

        echo $myJSON;

        if ($i != count($result) - 1) {
            echo ",";
        }
    }

    echo "]";
    
}elseif ($method == "POST") {

    $data = json_decode($body);

    $sth = $pdo->prepare("SELECT * FROM usuarios WHERE nome='$data->nome' and senha='$data->senha';");

    $sth->execute();

    $result = $sth->fetchall();

    // echo $result[0][2];
    // echo $data->nome;

    // echo $result[0][3];
    // echo $data->senha;

    if ($result[0][2] == $data->nome && $result[0][3] == $data->senha){

        $cookie_name = "user";

        $cookie_value = "$data->nome"; 
    
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

        echo "sucesso";
    }

}