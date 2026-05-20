<?php
require_once('../controller/funcoes.php');
conexao();
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
    <div>
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="email">Seu email: <input type="text" name="email"></label>
            <br>
            <label for="password">Sua senha: <input type="password"></label>
            <br>
            <input type="submit"> 
        </form>
        <a href="registrologin.php"><button>Ainda não tem uma conta?</button></a>
        <a href="../../index.php"><button>Voltar para o início</button></a>
    </div>
</body>
</html>