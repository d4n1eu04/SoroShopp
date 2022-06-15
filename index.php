<?php
session_start();
include_once('conexao/conexao.php')
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/d53a163e8b.js" crossorigin="anonymous"></script>
    <script src="js/dropdown.js" defer></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/mainpag.css">
    <link rel="shortcut icon" href="./img/Magigetlogo.ico" type="image/x-icon">
</head>
<body>
    <header>
        <div class="logo" onclick="window.location.href = 'index.php'">
            Soro<span>Shopp</span>
        </div>
        <div class="search">
            <form action="pags/pesquisa.php" method="get">
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
    <main class="container_main">
        <section class="flexrow categcarrossel">
            <nav class="catigurias">
                <aside class="menu_categorias">
                    <span class="title_categorias">Categorias</span>
                    <ul class="categorias">
                        <?php
                            $querycategoria = "SELECT * FROM categorias";
                            $run = mysqli_query($connect, $querycategoria);

                            if(mysqli_num_rows($run) > 0 ){
                                foreach ($run as $categoria){
                        ?>
                        <li title="<?=$categoria['categoria']?>"><a href="#<?=$categoria['categoria']?>">
                            <?php
                                if(strlen($categoria['categoria']) > 15){
                                    echo substr($categoria['categoria'], 0, 12) . '...';
                                }else{
                                    echo $categoria['categoria'];
                                }
                            ?>
                        </a></li>
                        <?php 
                            }
                        }else{
                            ?>
                                <li><a href="">Ocorreram problemas</a></li>
                            <?php
                        }
                        ?>
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
            <h1 class="nomecategoria" id="Esportes">Esportes</h1>
            <section class="prodcategs flexrow" style="justify-content: flex-start; margin: .5em 2em;">
            <?php
                $categoria = mysqli_query($connect, "SELECT * FROM anuncio INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE idcategoria = 1");
                if(mysqli_num_rows($categoria) != 0){
                foreach($categoria as $anunciodacategoria){
            ?>
                <div class="produto" onclick="window.location.href = '../pags/produto.php?produto=<?=$anunciodacategoria['slug']?>'">
                    <picture>
                        <img src="./arquivos/<?=$anunciodacategoria['arquivo']?>" alt="" style="width: 175px; height: 175px">
                    </picture>
                    <h1>
                        <?php
                            if(strlen($anunciodacategoria['titulo']) > 21){
                                echo substr($anunciodacategoria['titulo'], 0, 18) . '...';
                            }else{
                                echo $anunciodacategoria['titulo'];
                            }
                        ?>
                    </h1>
                    <span><strong><?=$anunciodacategoria['valor']?> </strong></span>
                </div>
                <?php
                }unset($anunciodacategoria);
            }else{
                ?>
                    <h1 class="nomecategoria" style="display: flex; justify-content: center;">Sem Mais da Categoria</h1>
                <?php

            }
            ?>
            </section>
            <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria" id="Eletrônicos">Eletrônicos</h1>
            <section class="prodcategs flexrow" style="justify-content: flex-start; margin: .5em 2em;">
            <?php
                $categoria = mysqli_query($connect, "SELECT * FROM anuncio INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE idcategoria = 2");
                if(mysqli_num_rows($categoria) != 0){
                foreach($categoria as $anunciodacategoria){
            ?>
                <div class="produto" onclick="window.location.href = '../pags/produto.php?produto=<?=$anunciodacategoria['slug']?>'">
                    <picture>
                        <img src="./arquivos/<?=$anunciodacategoria['arquivo']?>" alt="" style="width: 175px; height: 175px">
                    </picture>
                    <h1>
                        <?php
                            if(strlen($anunciodacategoria['titulo']) > 21){
                                echo substr($anunciodacategoria['titulo'], 0, 18) . '...';
                            }else{
                                echo $anunciodacategoria['titulo'];
                            }
                        ?>
                    </h1>
                    <span><strong><?=$anunciodacategoria['valor']?> </strong></span>
                </div>
                <?php
                }unset($anunciodacategoria);
            }else{
                ?>
                    <h1 class="nomecategoria" style="display: flex; justify-content: center;">Sem Mais da Categoria</h1>
                <?php

            }
            ?>
            </section>
            <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria" id="Moda e Acessórios">Moda e Acessórios</h1>
            <section class="prodcategs flexrow" style="justify-content: flex-start; margin: .5em 2em;">
            <?php
                $categoria = mysqli_query($connect, "SELECT * FROM anuncio INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE idcategoria = 3 ");
                if(mysqli_num_rows($categoria) != 0){
                foreach($categoria as $anunciodacategoria){
            ?>
                <div class="produto" onclick="window.location.href = '../pags/produto.php?produto=<?=$anunciodacategoria['slug']?>'">
                    <picture>
                        <img src="./arquivos/<?=$anunciodacategoria['arquivo']?>" alt="" style="width: 175px; height: 175px">
                    </picture>
                    <h1>
                        <?php
                            if(strlen($anunciodacategoria['titulo']) > 21){
                                echo substr($anunciodacategoria['titulo'], 0, 18) . '...';
                            }else{
                                echo $anunciodacategoria['titulo'];
                            }
                        ?>
                    </h1>
                    <span><strong><?=$anunciodacategoria['valor']?> </strong></span>
                </div>
                <?php
                }unset($anunciodacategoria);
            }else{
                ?>
                    <h1 class="nomecategoria"style="display: flex; justify-content: center;">Sem Mais da Categoria</h1>
                <?php

            }
            ?>
            </section>
            <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria" id="Automóveis e Peças">Automóveis e Peças</h1>
            <section class="prodcategs flexrow" style="justify-content: flex-start; margin: .5em 2em;">
            <?php
                $categoria = mysqli_query($connect, "SELECT * FROM anuncio INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE idcategoria = 4" );
                if(mysqli_num_rows($categoria) != 0){
                foreach($categoria as $anunciodacategoria){
            ?>
                <div class="produto" onclick="window.location.href = '../pags/produto.php?produto=<?=$anunciodacategoria['slug']?>'">
                    <picture>
                        <img src="./arquivos/<?=$anunciodacategoria['arquivo']?>" alt="" style="width: 175px; height: 175px">
                    </picture>
                    <h1>
                        <?php
                            if(strlen($anunciodacategoria['titulo']) > 21){
                                echo substr($anunciodacategoria['titulo'], 0, 18) . '...';
                            }else{
                                echo $anunciodacategoria['titulo'];
                            }
                        ?>
                    </h1>
                    <span><strong><?=$anunciodacategoria['valor']?> </strong></span>
                </div>
                <?php
                }unset($anunciodacategoria);
            }else{
                ?>
                    <h1 class="nomecategoria" style="display: flex; justify-content: center;">Sem Mais da Categoria</h1>
                <?php

            }
            ?>
            </section>
            <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria" id="Brinquedos e Artigos Infantis">Brinquedos e Artigos Infantis</h1>
            <section class="prodcategs flexrow" style="justify-content: flex-start; margin: .5em 2em;">
            <?php
                $categoria = mysqli_query($connect, "SELECT * FROM anuncio INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE idcategoria = 5");
                if(mysqli_num_rows($categoria) != 0){
                foreach($categoria as $anunciodacategoria){
            ?>
                <div class="produto" onclick="window.location.href = '../pags/produto.php?produto=<?=$anunciodacategoria['slug']?>'">
                    <picture>
                        <img src="./arquivos/<?=$anunciodacategoria['arquivo']?>" alt="" style="width: 175px; height: 175px">
                    </picture>
                    <h1>
                        <?php
                            if(strlen($anunciodacategoria['titulo']) > 21){
                                echo substr($anunciodacategoria['titulo'], 0, 18) . '...';
                            }else{
                                echo $anunciodacategoria['titulo'];
                            }
                        ?>
                    </h1>
                    <span><strong><?=$anunciodacategoria['valor']?> </strong></span>
                </div>
                <?php
                }unset($anunciodacategoria);
            }else{
                ?>
                    <h1 class="nomecategoria" style="display: flex; justify-content: center;">Sem Mais da Categoria</h1>
                <?php

            }
            ?>
            </section>
            <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria" id="Imóveis">Imóveis</h1>
            <section class="prodcategs flexrow" style="justify-content: flex-start; margin: .5em 2em;">
            <?php
                $categoria = mysqli_query($connect, "SELECT * FROM anuncio INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE idcategoria = 6");
                if(mysqli_num_rows($categoria) != 0){
                foreach($categoria as $anunciodacategoria){
            ?>
                <div class="produto" onclick="window.location.href = '../pags/produto.php?produto=<?=$anunciodacategoria['slug']?>'">
                    <picture>
                        <img src="./arquivos/<?=$anunciodacategoria['arquivo']?>" alt="" style="width: 175px; height: 175px">
                    </picture>
                    <h1>
                        <?php
                            if(strlen($anunciodacategoria['titulo']) > 21){
                                echo substr($anunciodacategoria['titulo'], 0, 18) . '...';
                            }else{
                                echo $anunciodacategoria['titulo'];
                            }
                        ?>
                    </h1>
                    <span><strong><?=$anunciodacategoria['valor']?> </strong></span>
                </div>
                <?php
                }unset($anunciodacategoria);
            }else{
                ?>
                    <h1 class="nomecategoria" style="display: flex; justify-content: center;">Sem Mais da Categoria</h1>
                <?php

            }
            ?>
            </section>
            <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria" id="Comércio e Escritório">Comércio e Escritório</h1>
            <section class="prodcategs flexrow" style="justify-content: flex-start; margin: .5em 2em;">
            <?php
                $categoria = mysqli_query($connect, "SELECT * FROM anuncio INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE idcategoria = 7");
                if(mysqli_num_rows($categoria) != 0){
                foreach($categoria as $anunciodacategoria){
            ?>
                <div class="produto" onclick="window.location.href = '../pags/produto.php?produto=<?=$anunciodacategoria['slug']?>'">
                    <picture>
                        <img src="./arquivos/<?=$anunciodacategoria['arquivo']?>" alt="" style="width: 175px; height: 175px">
                    </picture>
                    <h1>
                        <?php
                            if(strlen($anunciodacategoria['titulo']) > 21){
                                echo substr($anunciodacategoria['titulo'], 0, 18) . '...';
                            }else{
                                echo $anunciodacategoria['titulo'];
                            }
                        ?>
                    </h1>
                    <span><strong><?=$anunciodacategoria['valor']?> </strong></span>
                </div>
                <?php
                }unset($anunciodacategoria);
            }else{
                ?>
                    <h1 class="nomecategoria" style="display: flex; justify-content: center;">Sem Mais da Categoria</h1>
                <?php

            }
            ?>
            </section>
            <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria" id="Pets">Pets</h1>
            <section class="prodcategs flexrow" style="justify-content: flex-start; margin: .5em 2em;">
            <?php
                $categoria = mysqli_query($connect, "SELECT * FROM anuncio INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE idcategoria = 8 ");
                if(mysqli_num_rows($categoria) != 0){
                foreach($categoria as $anunciodacategoria){
            ?>
                <div class="produto" onclick="window.location.href = '../pags/produto.php?produto=<?=$anunciodacategoria['slug']?>'">
                    <picture>
                        <img src="./arquivos/<?=$anunciodacategoria['arquivo']?>" alt="" style="width: 175px; height: 175px">
                    </picture>
                    <h1>
                        <?php
                            if(strlen($anunciodacategoria['titulo']) > 21){
                                echo substr($anunciodacategoria['titulo'], 0, 18) . '...';
                            }else{
                                echo $anunciodacategoria['titulo'];
                            }
                        ?>
                    </h1>
                    <span><strong><?=$anunciodacategoria['valor']?> </strong></span>
                </div>
                <?php
                }unset($anunciodacategoria);
            }else{
                ?>
                    <h1 class="nomecategoria" style="display: flex; justify-content: center;">Sem Mais da Categoria</h1>
                <?php

            }
            ?>
            </section>
            <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria" id="Casa e Móveis">Casa e Móveis</h1>
            <section class="prodcategs flexrow" style="justify-content: flex-start; margin: .5em 2em;">
            <?php
                $categoria = mysqli_query($connect, "SELECT * FROM anuncio INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE idcategoria = 9");
                if(mysqli_num_rows($categoria) != 0){
                foreach($categoria as $anunciodacategoria){
            ?>
                <div class="produto" onclick="window.location.href = '../pags/produto.php?produto=<?=$anunciodacategoria['slug']?>'">
                    <picture>
                        <img src="./arquivos/<?=$anunciodacategoria['arquivo']?>" alt="" style="width: 175px; height: 175px">
                    </picture>
                    <h1>
                        <?php
                            if(strlen($anunciodacategoria['titulo']) > 21){
                                echo substr($$anunciodacategoria['titulo'], 0, 18) . '...';
                            }else{
                                echo $anunciodacategoria['titulo'];
                            }
                        ?>
                    </h1>
                    <span><strong><?=$anunciodacategoria['valor']?> </strong></span>
                </div>
                <?php
                }unset($anunciodacategoria);
            }else{
                ?>
                    <h1 class="nomecategoria" style="display: flex; justify-content: center;">Sem Mais da Categoria</h1>
                <?php

            }
            ?>
            </section>
            <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria" id="Diversos">Diversos</h1>
            <section class="prodcategs flexrow" style="justify-content: flex-start; margin: .5em 2em;">
            <?php
                $categoria = mysqli_query($connect, "SELECT * FROM anuncio INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE idcategoria = 10");
                if(mysqli_num_rows($categoria) != 0){
                foreach($categoria as $anunciodacategoria){
            ?>
                <div class="produto" onclick="window.location.href = '../pags/produto.php?produto=<?=$anunciodacategoria['slug']?>'">
                    <picture>
                        <img src="./arquivos/<?=$anunciodacategoria['arquivo']?>" alt="" style="width: 175px; height: 175px">
                    </picture>
                    <h1>
                        <?php
                            if(strlen($anunciodacategoria['titulo']) > 21){
                                echo substr($anunciodacategoria['titulo'], 0, 18) . '...';
                            }else{
                                echo $anunciodacategoria['titulo'];
                            }
                        ?>
                    </h1>
                    <span><strong><?=$anunciodacategoria['valor']?> </strong></span>
                </div>
                <?php
                }unset($anunciodacategoria);
            }else{
                ?>
                    <h1 class="nomecategoria" style="display: flex; justify-content: center;">Sem Mais da Categoria</h1>
                <?php

            }
            ?>
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
<?php
 if (isset($_SESSION['msgerro'])){
 echo "<script type='text/javascript'>alert('{$_SESSION["msgerro"]}');</script>";
 unset($_SESSION["msgerro"]);
}
?>
<script src="js/carousel.js"></script>
<script src="js/dropdown.js"></script>
</html>
