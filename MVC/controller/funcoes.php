<?php
function error_info(){
ini_set('display_errors', 1);
error_reporting(E_ALL);
}
function conexao(){
$conn = mysqli_connect('localhost', 'root', '', 'livraria');

mysqli_set_charset($conn, 'utf8');

if(!$conn){
    die("Erro: " . mysqli_connect_error());
}else{
    echo 'Conectado! Versão: ' . mysqli_get_client_info();
}
return $conn;
}
?>