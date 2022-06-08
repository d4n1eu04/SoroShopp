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
    <link rel="stylesheet" href="../css/carousel.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/d53a163e8b.js" crossorigin="anonymous"></script>
    <script src="js/dropdown.js" defer></script>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/mainpag.css">
    <link rel="stylesheet" href="../css/user.css">
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
                    <li><a href="pags/login.php">Sair/Entrar</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main class="mainuser">
        <section class="user">
            <div class="informacoes">
                <!--<img src="" alt="">-->
                <div class="fotouser" style="border: solid black; border-radius: 50%; height: 100px; width:100px"></div>
                <p class="nomeuser">Nome do Usuário</p>
            </div>
            <div class="sair">
                <button>
                    Sair
                </button>
            </div>
        </section>
        <section class="anuncios">
            <div class="cardanuncios">
                <div class="anuncio">
                    <img src="../img/products.png" alt="" style="height: 150px; width: 150px;">
                    <h4>Produto</h4>
                    <p>descrição</p>
                    <h4>VALOR</h4>
                </div>
                <div class="anuncio">
                    <img src="../img/products.png" alt="" style="height: 150px; width: 150px;">
                    <h4>Produto</h4>
                    <p>descrição</p>
                    <h4>VALOR</h4>
                </div>
                <div class="anuncio">
                    <img src="../img/products.png" alt="" style="height: 150px; width: 150px;">
                    <h4>Produto</h4>
                    <p>descrição</p>
                    <h4>VALOR</h4>
                </div>
            </div>
        </section>
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
