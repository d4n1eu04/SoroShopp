<?php
session_start();
include_once('../conexao/conexao.php');
$produto_query = "SELECT * FROM anuncio INNER JOIN usuario on anuncio.iduser = usuario.iduser INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio INNER JOIN categorias on anuncio.idcategoria = categorias.idcategoria WHERE slug = '".$_GET['produto']."' LIMIT 1";
$run_query = mysqli_query($connect, $produto_query);
$infos = mysqli_fetch_assoc($run_query);
$slug = $_GET['produto'];
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
    <title>Anúncio - <?=$infos['titulo']?></title>
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
    <main>
        <?php
            if(mysqli_num_rows($run_query) > 0){
                foreach($run_query as $anuncio){
        ?>
        <section class="visuproduto">
            <div class="fotosprod">
                <div class="img-principal">
                    <img src="../arquivos/<?=$anuncio['arquivo']?>" id="imagem-principal" alt="" >
                </div>
                <div class="imgs-pq">
                    <img src="../arquivos/<?=$anuncio['arquivo']?>" class="imgpq" alt="" onclick="trocaImg(this)">
                    <img src="../arquivos/<?=$anuncio['arquivo1']?>" class="imgpq" alt="" onclick="trocaImg(this)">
                    <img src="../arquivos/<?=$anuncio['arquivo2']?>" class="imgpq" alt="" onclick="trocaImg(this)">
                </div>
            </div>
            <div class="infoproduto">
                <span class="rotas"><a href="../index.php">Início</a>/<a href="../index.php#<?=$anuncio['categoria']?>"><?=$anuncio['categoria']?></a></span>
                <h1 class="titulo"><?=$anuncio['titulo']?></h1>
                <p class="descricao">
                    <?=$anuncio['descricao']?>
                </p>
                <span class="valor"><strong><?=$anuncio['valor']?></strong></span>
                <div class="cardvendedor">
                    <div class="nomefoto">
                        <img src="../img/user.png" alt="" style="height: 75px; width: 75px; border-radius:50%;">
                        <h3 class="nome"><?=$anuncio['nome']?></h3>
                    </div>
                    <div class="telefoneedita">
                        <span class="telefone"><?=$anuncio['telefone']?></span>
                        <?php
                            if($_SESSION['id'] == $anuncio['iduser']){
                                ?>
                                    <a href="../pags/editaranuncio.php?anuncio=<?=$anuncio['slug']?>" class="btnuser">Editar</a>
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <p class="endereco">
                    <strong>Endereço</strong>: <?=$anuncio['local']?>
                </p>
            </div>
        <script src="../js/gallery.js"></script>
        </section>
        <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria">Mais da Categoria</h1>
            <section class="prodcategs flexrow" style="justify-content: center; margin: .5em 2em;">
            <?php
                $categoria = mysqli_query($connect, "SELECT * FROM anuncio INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE idcategoria = '".$anuncio['idcategoria']."'"."AND slug != '$slug' LIMIT 6");
                if(mysqli_num_rows($categoria) != 0){
                foreach($categoria as $anunciodacategoria){
            ?>
                <div class="produto" onclick="window.location.href = '../pags/produto.php?produto=<?=$anunciodacategoria['slug']?>'">
                    <picture>
                        <img src="../arquivos/<?=$anunciodacategoria['arquivo']?>" alt="">
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
                    <h1 style="display: flex; justify-content: center;">Sem Mais da Categoria</h1>
                <?php
            }
            }
            ?>
            </section>
            <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria">Mais do vendedor</h1>
            <section class="prodcategs flexrow" style="justify-content: center; margin: .5em 2em;">
            <?php
                $vendedor = mysqli_query($connect, "SELECT * FROM anuncio INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE iduser = '".$anuncio['iduser']."'"."AND slug != '$slug' LIMIT 6");
                if(mysqli_num_rows($vendedor) != 0){
                    foreach($vendedor as $anunciodacategoria){
            ?>
                    <div class="produto" onclick="window.location.href = '../pags/produto.php?produto=<?=$anunciodacategoria['slug']?>'">
                        <picture>
                            <img src="../arquivos/<?=$anunciodacategoria['arquivo']?>" alt="">
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
                        <h1 style="display: flex; justify-content: center;">Sem Mais do Vendedor</h1>
                    <?php
    
                }
            ?>
            </section>
        <?php   
}else{
                ?>
                <h1 style="text-align: center; font-size:4em; margin:1em 0;">Produto não encontrado</h1>
                <button onclick="history.back()">Voltar</button>
                <?php
            }
        ?>
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
<?php
if (isset($_SESSION['msgerro1'])){
echo "<script type='text/javascript' defer>alert('{$_SESSION["msgerro1"]}');</script>";
unset($_SESSION["msgerro1"]);}
if (isset($_SESSION['msg'])){
    echo "<script type='text/javascript' defer>alert('{$_SESSION["msg"]}');</script>";
    unset($_SESSION["msg"]);}
?>
</html>