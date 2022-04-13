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
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/mainpag.css">
</head>
<body>
    <main id="login">
        <div class="logincard">
            <h1>Entrar com sua conta</h1>
            <form method="post" action="../conexao/validalogin.php" >
                    <label for="user">Usuário ou Email</label>
                    <input type="text" name="user" id="usuer" required>
                    <label for="senha">Senha</label>
                    <input type="password" name="passwd" id="password" required>
                <div class="botoes">
                    <button type="submit" name="btnEnvia">Entrar</button>
                    <a href="cadastro.php">Cadastre-se</a>
                </div>
            </form>
            <p>
                <span>
                    <?php
                        if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset ($_SESSION['msg']);
                        }
                    ?>
                </span>
                <?php
                    if(isset($_SESSION['msgerro'])){
                        echo $_SESSION['msgerro'];
                        unset ($_SESSION['msgerro']);
                    }
                ?>
            </p>
        </div>
    </main>
</body>
</html>