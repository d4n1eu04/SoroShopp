<?php
session_start();
if($_SESSION['id'] && $_SESSION['nome'] && $_SESSION['usuario'] && $_SESSION['email']){
    $_SESSION['msgerro1'] = "Você já está conectado!";
    header("Location: ../pags/usuario.php");
}
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
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/d53a163e8b.js" crossorigin="anonymous"></script>
    <script src="js/dropdown.js" defer></script>
    <link rel="shortcut icon" href="../img/Magigetlogo.ico" type="image/x-icon">
</head>
<body>
<header>
        <div class="logo" onclick="window.location.href = '../index.php'">
          Soro<span>Shopp</span>
        </div>
        <!--<div class="search">
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
                    <li><a href="pags/login.php">Sair/Entrar</a></li>
                </ul>
            </div>
        </div>-->
    </header>
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
                    if(isset($_SESSION['msgerro1'])){
                        echo $_SESSION['msgerro1'];
                        unset ($_SESSION['msgerro1']);
                    }
                ?>
            </p>
        </div>
    </main>
    <footer>
        <div class="foot">
            <div class="footlinks">
                <h4>Sobre Nós</h4>
                <ul>
                    <li><a href="#">Sobre a DevMagic</a></li>
                    <li><a href="#">Contato</a></li>
                    <li><a href="#">Ajude-nos</a></li>
                </ul>
            </div>
            <div class="footlinks">
            <h4>Usuário</h4>
                <ul>
                    <li><a href="pags/login.php">Login</a></li>
                    <li><a href="pags/usuario.php">Minha Conta</a></li>
                    <li><a href="#">Manual do usuário</a></li>
                </ul>
            </div>
            <div class="footlinks">
            <h4>Desenvolvido por</h4>
                <ul>
                    <li><a href="#"><i class="fa fa-github"></i> - Daniel Luís</a></li>
                    <li><a href="#"><i class="fa fa-github"></i> - Antonio Marcos</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>