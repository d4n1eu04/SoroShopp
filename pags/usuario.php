<?php
session_start();
if(!$_SESSION['id'] && !$_SESSION['nome'] && !$_SESSION['usuario'] && !$_SESSION['email']){
    $_SESSION['msgerro'] = "Crie uma conta ou entre com a sua primeiro!";
    header("Location: ../pags/login.php");
}
$username = $_SESSION['usuario'];
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
    <script src="../js/dropdown.js" defer></script>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/mainpag.css">
    <link rel="stylesheet" href="../css/user.css">
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
                <li><a href="pags/usuario.php#favoritos">Favoritos</a></li>
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
    <main class="mainuser">
        <section class="user">
            <div class="informacoes">
                <div class="nomeduser">
                    <img src="../img/user.png" alt="" style="border-radius: 50%; height: 100px; width:100px;">
                    <!--<div class="fotouser" "></div>-->
                    <p class="nomeuser"><?=$_SESSION['nome']?> <span class="username" style="color: #3BD952;"> (@<?=$_SESSION['usuario']?>)</span></p>
                </div>
                <div class="sair">
                <?php if($_SESSION['tipo_user'] > 1){
                        ?>
                            <a href="../pags/anunciar.php" class="btnuser">Anunciar</a>   
                        <?php
                    }
                ?>
                <a href="../pags/editauser.php?usuario=<?=$username?>" class="btnuser">Info. da Conta</a>
                <a href="../conexao/sair.php" class="btnuser">Sair</a>
            </div>
            </div>
            
        </section>
        <section class="galeriaprodutos flexcol">
            <h1 class="nomecategoria">Seus Anúncios</h1>
            <section class="prodcategs flexrow" style="justify-content: center;">
                <?php
                    include_once("../conexao/conexao.php");
                    if(!empty($_SESSION['id']) && $_SESSION['nome'] && !empty($_SESSION['usuario']) && !empty($_SESSION['email'])){
                        $query = "SELECT * FROM anuncio INNER JOIN usuario ON anuncio.iduser = usuario.iduser INNER JOIN imganuncio ON anuncio.idanuncio = imganuncio.idanuncio where anuncio.iduser = '".$_SESSION['id']."'";
                        $query_run = mysqli_query($connect, $query);
                        if(mysqli_num_rows($query_run) > 0){
                            foreach($query_run as $produto){
                                ?>
                                <div class="produto" onclick="window.location.href = '../pags/produto.php?produto=<?=$produto['slug']?>'">
                                    <picture>
                                        <img src="../arquivos/<?=$produto['arquivo']?>" alt="">
                                    </picture>
                                    <h1>
                                        <?php
                                            if(strlen($produto['titulo']) > 21){
                                                echo substr($produto['titulo'], 0, 18) . '...';
                                            }else{
                                                echo $produto['titulo'];
                                            }
                                        ?>
                                    </h1>
                                    <span><strong><?=$produto['valor']?> </strong></span>
                                </div>
                                <?php
                            }unset($produto);
                        }else{
                            ?>
                                <h1 style="text-align: center;">Você não tem anuncios ainda</h1>
                            <?php
                        }
                    }
                ?>
                
            </section>
            <section class="galeriaprodutos flexcol" id="favoritos" name="favoritos" style="margin-top: 2em;">
            <h1 class="nomecategoria">Favoritos <i class="fa-regular fa-heart"></i></h1>
            <section class="prodcategs flexrow" style="justify-content: center;">
                <div class="produto">
                    <picture>
                        <img src="../img/products.png" alt="">
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
                    <li><a href="../pags/login.php">Login</a></li>
                    <li><a href="../pags/usuario.php">Minha Conta</a></li>
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
    unset($_SESSION["msg"]);}?>
</html>
