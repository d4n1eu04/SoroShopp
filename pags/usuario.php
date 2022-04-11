<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
    <link rel="stylesheet" href="../css/mainpag.css">
</head>
<body>
    <div>
        <?php
            echo $_SESSION['nome'] . "<br>";
            echo $_SESSION['usuario'] . "<br>";
            echo $_SESSION['email'] . "<br>";
        ?>
        <a href="../conexao/login.php" id="btnSair">Sair</a>
    </div>
</body>
</html>
