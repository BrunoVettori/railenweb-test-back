<?php

header("Content-type: application/json; charset=UTF-8");

$uris = explode("/", $_SERVER["REQUEST_URI"]);

$method = $_SERVER["REQUEST_METHOD"];

$query = $_SERVER['QUERY_STRING'];

$body =  file_get_contents('php://input');

if ($method =="GET"){
    echo $method;
}elseif($method == "POST"){
    echo $method;
}elseif($method == "PUT"){
    echo $method;
}elseif($method == "DELETE"){
    echo $method;
}

// echo $uris[3];