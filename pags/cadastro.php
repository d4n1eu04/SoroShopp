<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se no SoroShopp</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/mainpag.css">
</head>
<body>
    <main id="login" class="cadastro">
        <div id="cadastro" class="logincard">
            <form action="../conexao/vaildacadastro.php" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" placeholder="Seu nome completo">
                <label for="user">Nome de usuário</label>
                <input type="text" name="user" placeholder="">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Um email válido">
                <label for="data_nasc">Data de Nascimento</label>
                <input type="date" name="data_nasc">
                <label for="local">Local</label>
                <input type="text" name="local">
                <label for="senha">Senha</label>
                <input type="password" id="password" name="senha">
                <label for="senha">Confirme a senha</label>
                <input type="password" id="confirm_password" name="senhaconf">
                <button type="submit" name="btnEnvia">Cadastrar</button>
            </form>
            <p>
                <?php
                    if(isset($_SESSION['msgerro'])){
                        echo $_SESSION['msgerro'];
                        unset ($_SESSION['msgerro']);
                    }
                ?>
            </p>
        </div>
    </main>
    <script src="../js/validasenha.js"></script>
</body>
</html>