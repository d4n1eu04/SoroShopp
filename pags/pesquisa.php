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
    <title>Resultado de <?= $_GET['search']?></title>
</head>
<body>
    <header>
        <div class="logo" onclick="window.location.href = 'index.php'">
            Soro<span>Shopp</span>
        </div>
        <div class="search">
            <form action="pesquisa.php" method="get">
                <input type="text" name="search" id="searchbar" placeholder="Procure o que precisa aqui" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>">
            </form>
        </div>
        <nav>
            <ul>
                <li><a href="pags/usuario.php#favoritos">Favoritos</a></li>
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
    <main style="margin: 1.5em;">
    <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria" style="text-align: left;">Mais Populares</h1>
            <section class="prodcategs flexrow" style="justify-content: flex-start;">
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
        </section>
        <section>
            <div class="resultados">
                <div class="produtoresult" style="display: flex; flex-direction: row; align-items:center;">
                    <img src="../img/products.png" alt="" style="width: 200px; height: 200px">
                    <div class="sobreproduto" style="display:flex; flex-direction: column; margin-left:3em;">
                        <h2>Nome Produto</h2>
                        <p style="width: 100%; margin: 1em 0; text-align:justify;">descrição do produto Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis illo sequi officia soluta eum eaque labore eius expedita quisquam iste.</p>
                        <span><strong>VALOR</strong></span>
                    </div>
                    <div class="sobreproduto" style="display:flex; flex-direction: column; margin-left:3em;">
                        <h2>Vendedor</h2>
                        <p style="width: 100%; margin: 1em 0; text-align:justify;">Bairro, Rua Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, praesentium?</p>
                        <h2><strong>Telefone</strong></h2>
                    </div>
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
                    <li><a href="login.php">Login</a></li>
                    <li><a href="usuario.php">Minha Conta</a></li>
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