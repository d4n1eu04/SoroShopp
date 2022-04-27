<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anunciar - SoroShopp</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/mainpag.css">
</head>
<body>
    <header>
        <div class="logo">
            Soro<span>Shopp</span>
        </div>
        <div class="search">
            <input type="text" name="search" id="searchbar" placeholder="Procure o que precisa aqui">
        </div>
        <nav>
            <ul>
                <li><a href="">Favoritos</a></li>
            </ul>
        </nav>
        <div class="userDropdown">
            <button class="btnDrop">Login</button>
            <div class="dropContent">
                <ul class="dropdown">
                    <li><a href="">Meus Anúncios</a></li>
                    <li><a href="">Conta</a></li>
                    <li><a href="">Sair/Entrar</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main id="login">
        <div class="logincard">
            <h1>Anunciar</h1>
            <form method="post" action="../conexao/anuncio.php" >
                    <label for="title">Título do Produto</label>
                    <input type="text" name="title" id="title" required>
                    <label for="description">Descrição</label>
                    <textarea name="description" id="desc" cols="53" rows="5" style="border:solid #20ac35;border-radius: .3rem;resize:none; padding: .6rem; font-size: .9rem; width:100%" maxlength="220"></textarea>
                    <label for="value">Valor</label>
                    <input type="text" name="value" id="value">
                <div class="botoes">
                    <button type="submit" name="btnEnvia">Anunciar</button>
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