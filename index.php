<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoroShopp</title>
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/mainpag.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/d53a163e8b.js" crossorigin="anonymous"></script>
    <script src="js/dropdown.js" defer></script>
    <link rel="stylesheet" href="css/header.css">
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
    <main class="container_main">
        <section class="flexrow categcarrossel">
            <nav class="catigurias">
                <aside class="menu_categorias">
                    <span class="title_categorias">Categorias</span>
                    <ul class="categorias">
                        <li><a href="">Lorem</a></li>
                        <li><a href="">Lorem</a></li>
                        <li><a href="">Lorem</a></li>
                        <li><a href="">Lorem</a></li>
                        <li><a href="">Lorem</a></li>
                        <li><a href="">Lorem</a></li>
                        <li><a href="">Lorem</a></li>
                        <li><a href="">Lorem</a></li>
                        <li><a href="">Lorem</a></li>
                    </ul>
                </aside>
            </nav>
            <div class="slidecarrossel">
                <h1>Principais Ofertas</h1>
                <div class="carousel">
                    <div data-js="carousel__item" class="carousel__item carousel__item--visible">
                        <picture>
                              <img src="img/produto1.jpg" style="height: 360px; width: 800px;"/>
                        </picture>
                    </div>
            
                    <div data-js="carousel__item" class="carousel__item">
                        <picture>
                            <img src="img/produto2.jpg" style="height: 360px; width: 800px;"/>
                        </picture>
                    </div>
                    
                    <div data-js="carousel__item" class="carousel__item">
                        <picture>
                            <img src="img/produto3.jpg" style="height: 360px; width: 800px;"/>
                        </picture>
                    </div>

                    <div class="carousel__actions">
                      <button data-js="carousel__button--prev" aria-label="Slide anterior">
                        <
                      </button>
                      <button data-js="carousel__button--next" aria-label="Próximo slide">
                        >
                      </button>
                    </div>
                  </div>
                </div>
        </section>
        <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria">Categoria</h1>
            <section class="prodcategs flexrow">
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
            </section>
            <p><a href="#" class="vermais">Mais Anúncios</a></p>
        </section>
        <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria">Categoria</h1>
            <section class="prodcategs flexrow">
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
            </section>
            <p><a href="#" class="vermais">Mais Anúncios</a></p>
        </section>
        <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria">Categoria</h1>
            <section class="prodcategs flexrow">
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
            </section>
            <p><a href="#" class="vermais">Mais Anúncios</a></p>
        </section>
        <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria">Categoria</h1>
            <section class="prodcategs flexrow">
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
                <div class="produto">
                    <picture>
                        <img src="img/products.png" alt="" style="width: 150px; height: 150px">
                    </picture>
                    <h1>Produto</h1>
                    <span><strong>VALOR</strong></span>
                </div>
            </section>
            <p><a href="#" class="vermais">Mais Anúncios</a></p>
        </section>
    </main>
    <footer>
        <div class="foot">
            <div class="sobre">
                <h4>Sobre Nós</h4>
                <ul>
                    <li><a href="#">Sobre a DevMagic</a></li>
                    <li><a href="#">Contato</a></li>
                    <li><a href="#">Ajude-nos</a></li>
                </ul>
            </div>
            <div class="ajuda">
                <h4>Manual do Usuário</h4>
                <ul>
                    <li>Login</li>
                    <li>Minha Conta</li>
                    <li>Manual do usuário</li>
                </ul>
            </div>
        </div>
        <div class="pi">
            <p>2021/2022 - DevMagic</p>
        </div>
    </footer>
</body>
<?php
 if (isset($_SESSION['msgerro'])){
 echo "<script type='text/javascript'>alert('{$_SESSION["msgerro"]}');</script>";
 unset($_SESSION["msgerro"]);
}
?>
<script src="js/carousel.js"></script>
</html>
