<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/carousel.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/d53a163e8b.js" crossorigin="anonymous"></script>
    <script src="js/dropdown.js" defer></script>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/mainpag.css">
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../css/product.css">
    <title>Produto</title>
</head>
<body>
<header>
        <div class="logo" onclick="window.location.href = '../index.php'">
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
    <main>
        <section class="visuproduto">
            <div class="fotosprod">
                <div class="img-principal">
                    <img src="../img/products.png" id="imagem-principal" alt="" style="height: 400px; width: 400px">
                </div>
                <div class="imgs-pq">
                    <img src="../img/products.png" alt="" style="height: 95px; width: 95px" onclick="trocaImg(this)">
                    <img src="../img/products1.png" alt="" style="height: 95px; width: 95px" onclick="trocaImg(this)">
                    <img src="../img/products2.png" alt="" style="height: 95px; width: 95px" onclick="trocaImg(this)">
                </div>
            </div>
        <script src="../js/gallery.js"></script>
        <div class="infoprod">    
            <div class="infos">
                <h5><a href="../index.php">Início</a> / <a href="">Categoria</a></h5>
                <h2>Lorem, ipsum dolor.</h2>
                <div class="textos">
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea, aliquam! Illum corrupti asperiores cupiditate voluptates eligendi aspernatur officia rerum numquam! Molestiae natus et enim. Quibusdam qui inventore vero similique laudantium!
                    </p>
                    <h4>R$ 99,99</h4>
                </div>
                <div class="cardvendedor">
                    <div class="vendedor">
                        <img src="../img/user.png" alt="" style="height: 80px; width: 80px; border-radius: 50%;">
                        <h2 class="nomevend">Nome do Vendedor</h2>
                    </div>
                    <h3>(XX) XXXXX-XXXX</h3>
                </div>
            </div>
            
        </div>
        </section>
        <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria">Mais da Categoria</h1>
            <section class="prodcategs flexrow">
                <div class="produto">
                    <picture>
                        <img src="../img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="../img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="../img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="../img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="../img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
            </section>
            <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria">Mais do vendedor</h1>
            <section class="prodcategs flexrow">
                <div class="produto">
                    <picture>
                        <img src="../img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="../img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="../img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="../img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="../img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
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