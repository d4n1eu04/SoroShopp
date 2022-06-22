<?php
session_start();
include_once("../conexao/conexao.php")
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
    <script src="../js/dropdown.js" defer></script>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/mainpag.css">
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../css/product.css">
    <title>Resultado de <?= $_GET['search']?></title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <div class="logo" onclick="window.location.href = '../index.php'">
            Soro<span>Shopp</span>
        </div>
        <div class="search">
            <form action="pesquisa.php" method="get">
                <input type="text" name="search" id="searchbar" placeholder="Procure o que precisa aqui" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>">
            </form>
        </div>
        <nav>
            <ul>
                <li><a href="../pags/usuario.php#favoritos">Favoritos</a></li>
            </ul>
        </nav>
        <div class="dropuser" data-dropdown >
            <button class="dropbtn" data-dropdown-button >Menu</button>
            <div class="dropcntt">
                <li class="droplist"><a href="../pags/anunciar.php">Anunciar</a></li>
                <li class="droplist"><a href="../pags/usuario.php">Minha Conta</a></li>
                <li class="droplist"><a href="../pags/login.php">Sair/Entrar</a></li>
            </div>
        </div>
    </header>
    <main style="margin: 1.5em;">
    <!--<section class="galeriaprodutos flexcol">
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
        </section>-->
        <section>
            <div class="resultados"  style="margin: 5em 0;">
                <?php
                    $pesquisa = $_GET['search'];
                    $resultados = mysqli_query($connect, "SELECT * FROM anuncio INNER JOIN usuario on anuncio.iduser = usuario.iduser INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE concat(titulo,descricao,nome,username,local) LIKE '%$pesquisa%'");

                    if(mysqli_num_rows($resultados) != 0){
                    foreach($resultados as $result){
                        $slug = $result['slug'];
                        ?>
                        <div class="produtoresult" onclick="window.location.href = '../pags/produto.php?produto=<?=$slug?>'">
                        <img src="../arquivos/<?=$result['arquivo']?>" alt="" style="width: 200px; height: 200px">
                        <div class="sobreproduto">
                        <h2><?=$result['titulo']?></h2>
                        <p style="width: 100%; margin: 1em 0; text-align:justify;"><?=$result['descricao']?></p>
                        <span><strong><?=$result['valor']?></strong></span>
                        </div>
                        <div class="sobreproduto">
                        <h2><?=$result['nome']?></h2>
                        <p style="width: 100%; margin: 1em 0; text-align:justify;"><?=$result['local']?></p>
                        <h2><strong><?=$result['telefone']?></strong></h2>
                    </div>
                </div>
                        <?php
                    }
                    }else{
                        ?>
                            <h1 class="nomecategoria">Sem resultado para a busca</h1>
                        <?php
                    }
                ?>
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