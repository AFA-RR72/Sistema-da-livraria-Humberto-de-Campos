<?php
function error_info(){
ini_set('display_errors', 1);
error_reporting(E_ALL);
}
function conexao(){
$localhost = $_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER=['HTTP_HOST'] == '127.0.0.1';

if($localhost){
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'livraria';
}else{
    $host = 'sql100.infinityfree.com';
    $user = 'if0_41492011';
    $password = 'bancolivraria';
    $database = 'if0_41492011_livraria';
}

$conn = mysqli_connect($host, $user, $password, $database);

mysqli_set_charset($conn, 'utf8');

if(!$conn){
    die("Erro: " . mysqli_connect_error());
}
return $conn;
}
?>