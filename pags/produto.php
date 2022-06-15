<?php
session_start();
include_once('../conexao/conexao.php');
$produto_query = "SELECT * FROM anuncio INNER JOIN usuario on anuncio.iduser = usuario.iduser INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE slug = '".$_GET['produto']."' LIMIT 1";
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
    <script src="js/dropdown.js" defer></script>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/mainpag.css">
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../css/product.css">
    <title>Anúncio - <?=$infos['titulo']?></title>
    <link rel="shortcut icon" href="../img/Magigetlogo.ico" type="image/x-icon">
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
    <main>
        <?php
            if(mysqli_num_rows($run_query) > 0){
                foreach($run_query as $anuncio){
        ?>
        <section class="visuproduto">
            <div class="fotosprod">
                <div class="img-principal">
                    <img src="../arquivos/<?=$anuncio['arquivo']?>" id="imagem-principal" alt="" style="height: 400px; width: 100%">
                </div>
                <div class="imgs-pq">
                    <img src="../arquivos/<?=$anuncio['arquivo']?>" alt="" style="height: 115px; width: 170px" onclick="trocaImg(this)">
                    <img src="../arquivos/<?=$anuncio['arquivo1']?>" alt="" style="height: 115px; width: 170px" onclick="trocaImg(this)">
                    <img src="../arquivos/<?=$anuncio['arquivo2']?>" alt="" style="height: 115px; width: 170px" onclick="trocaImg(this)">
                </div>
            </div>
        <script src="../js/gallery.js"></script>
        <div class="infoprod">    
            <div class="infos">
                <h5><a href="../index.php">Início</a> / <a href="">
                    <?php
                        $query = "SELECT categoria FROM categorias INNER JOIN anuncio on categorias.idcategoria = anuncio.idcategoria WHERE anuncio.idcategoria = '".$anuncio['idcategoria']."'";
                        $querycateg = mysqli_query($connect, $query);
                        if(mysqli_num_rows($querycateg) != 0){
                            $rowcateg = mysqli_fetch_assoc($querycateg);
                            echo $rowcateg['categoria'];
                        }
                    ?>
                </a></h5>
                <h2><?=$anuncio['titulo']?></h2>
                <div class="textos">
                    <p>
                        <?php
                            echo $anuncio['descricao'];
                            ?><br><br>
                            <span class="endereco" style="text-align: left; font-size: .9em; font-wheight: 400"><strong>Endereço: </strong><?=$anuncio['local']?></span>
                    </p>
                    <h4>Preço: <?=$anuncio['valor']?></h4>
                </div>
                <div class="cardvendedor" style="overflow: none;">
                    <div class="vendedor">
                        <img src="../img/user.png" alt="" style="height: 80px; width: 80px; border-radius: 50%;">
                        <h2 class="nomevend" title="<?=$anuncio['nome']?>">
                            <?php
                                if(strlen($anuncio['nome']) > 15){
                                    echo substr($anuncio['nome'], 0, 12) . '...';
                                }else{
                                    echo $anuncio['nome'];
                                }
                            ?> 
                            <?php
                           /* echo '<br>'.$_SESSION['id'];*/
                                if($anuncio['iduser'] == $_SESSION['id'] && $anuncio['tipo_usuario'] == $_SESSION['tipo_user']){
                                    ?>
                                        <button class="btnuser" onclick="window.location.href = '../pags/editaranuncio.php?anuncio=<?=$anuncio['slug']?>'">Editar Anúncio</button>
                                    <?php
                                }
                            ?>
                        </h2>
                    </div>
                    <h3>Contato: <?=$anuncio['telefone']?></h3>
                </div>
            </div>
            </div>
        </section>
        <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria">Mais da Categoria</h1>
            <section class="prodcategs flexrow" style="justify-content: flex-start; margin: .5em 2em;">
            <?php
                $categoria = mysqli_query($connect, "SELECT * FROM anuncio INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE idcategoria = '".$anuncio['idcategoria']."'"."AND slug != '$slug' LIMIT 6");
                if(mysqli_num_rows($categoria) != 0){
                foreach($categoria as $anunciodacategoria){
            ?>
                <div class="produto" onclick="window.location.href = '../pags/produto.php?produto=<?=$anunciodacategoria['slug']?>'">
                    <picture>
                        <img src="../arquivos/<?=$anunciodacategoria['arquivo']?>" alt="" style="width: 175px; height: 175px">
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
            <section class="prodcategs flexrow" style="justify-content: flex-start; margin: .5em 2em;">
            <?php
                $vendedor = mysqli_query($connect, "SELECT * FROM anuncio INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE iduser = '".$anuncio['iduser']."'"."AND slug != '$slug' LIMIT 6");
                if(mysqli_num_rows($vendedor) != 0){
                    foreach($vendedor as $anunciodacategoria){
            ?>
                    <div class="produto" onclick="window.location.href = '../pags/produto.php?produto=<?=$anunciodacategoria['slug']?>'">
                        <picture>
                            <img src="../arquivos/<?=$anunciodacategoria['arquivo']?>" alt="" style="width: 175px; height: 175px">
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
echo "<script type='text/javascript'>alert('{$_SESSION["msgerro1"]}');</script>";
unset($_SESSION["msgerro1"]);}
if (isset($_SESSION['msg'])){
    echo "<script type='text/javascript'>alert('{$_SESSION["msg"]}');</script>";
    unset($_SESSION["msg"]);}
?>
</html>