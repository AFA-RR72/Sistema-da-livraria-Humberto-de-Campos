<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('../controller/funcoes.php');
$conn = conexao();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Livraria Humberto de Campos</h1>
    <hr>
    <div>
        <h2>Criar conta</h2>
        <form action="registrologin.php" method="POST">
            <Label for="name">Insira seu nome: <input type="text" name="name"></Label>
            <br>
            <label for="email" name="email">Insira seu email:
                <input type="email" name="email">
            </label>
            <br>
            <label for="password">Insira sua senha: <input type="password" name="password"></label>
            <br>
            <label for="password_confirm">Confirme a senha: <input type="password" name="password_confirm"></label>
            <br>
            <input type="submit" value="Criar usuário">
        </form>
    </div>
    <a href="login.php"><button>Voltar para o login</button></a>
    <a href="../../index.php"><button>Voltar para o início</button></a>
</body>
<br>
</html>

<?php
if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' ){  

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$password_confirm = htmlspecialchars($_POST['password_confirm']);

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$sql_verify = "SELECT * FROM users WHERE email = '$email'";

$result = mysqli_query($conn, $sql_verify);

if(empty($name) || empty($email) || empty($password) || empty($password_confirm)){
    echo "Você precisa preencher todos os campos!";
}
elseif(mysqli_num_rows($result) > 0){
    echo "Este email já está em uso! Usuário não criado.";
}
else{
if($password == $password_confirm && !empty($password)){
$sql = "INSERT INTO Users (name, email, password) values ('$name', '$email', '$password_hash')";

if (mysqli_query($conn, $sql)){
    echo "Usuário criado! Seu ID é: " . mysqli_insert_id($conn);
}
else{
    echo "Erro, seu usuário não foi criado! Código: " . mysqli_error($conn);
}

}
else{
    echo "As senhas não são iguais e/ou não foram preenchidas corretamente.";
}
}
}
?>