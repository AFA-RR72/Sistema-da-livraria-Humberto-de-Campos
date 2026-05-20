<?php
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
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="email">Seu email: <input type="text" name="email"></label>
            <br>
            <label for="password">Sua senha: <input type="password" name="password"></label>
            <br>
            <input type="submit"> 
        </form>
        <a href="registrologin.php"><button>Ainda não tem uma conta?</button></a>
        <a href="../../index.php"><button>Voltar para o início</button></a>
    </div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$email = htmlspecialchars($_POST['email'])  ;
$password = htmlspecialchars($_POST['password']);

$sql_verify = "SELECT * FROM users WHERE email = '$email'";

$result = mysqli_query($conn, $sql_verify);

if (mysqli_num_rows($result) > 0){
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user['password'])){
        header("refresh: 1; url=tabela.php");
        echo "Você entrou na sua conta, " . $user['name'] . "! Redirecionando.";
        exit;
    }else{
        echo "A senha está errada.";
    }
}else{
    echo "Usuário não encontrado.";
}
}
?>