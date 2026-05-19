<?php
function error_info(){
ini_set('display_errors', 1);
error_reporting(E_ALL);
}

$conn = mysqli_connect('localhost', 'root', '', 'livraria');

mysqli_set_charset($conn, 'utf8');

if(!$conn){
    die("Erro: " . mysqli_connect_error());
}else{
    echo "Conectado! Versão: " . mysqli_get_client_info();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Livraria Humberto de Campos</h1>
    <hr>
</body>
</html>