<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoroShopp - Entrar</title>
    <link rel="stylesheet" href="../css/mainpag.css">
</head>
<body>
    <div class="logincard">
        <form method="post" action="../conexao/validalogin.php" >
            <label for="user">Usuário ou Email</label>
            <input type="text" name="user" id="usuer">
            <label for="senha">Senha</label>
            <input type="text" name="passwd" id="password">
            <button type="submit" name="btnEnvia">Entrar</button>
        </form>
        <h4>Não possui uma conta? Cadastre-se agora!</h4>
        <button>Cadastrar</button>
    </div>
</body>
</html>