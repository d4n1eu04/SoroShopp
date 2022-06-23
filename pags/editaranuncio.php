<?php
session_start();
include_once('../conexao/conexao.php');
$produto_query = "SELECT * FROM anuncio INNER JOIN usuario on anuncio.iduser = usuario.iduser INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE slug = '".$_GET['anuncio']."' LIMIT 1";
$run_query = mysqli_query($connect, $produto_query);
$infos = mysqli_fetch_assoc($run_query);
if(!$_SESSION['id'] && !$_SESSION['nome'] && !$_SESSION['usuario'] && !$_SESSION['email']){
    $_SESSION['msgerro1'] = 'Você não está conectado';
    header("Location: ../pags/login.php");
}else if($_SESSION['tipo_user'] <= 1){
    $_SESSION['msgerro1'] = 'Você não pode anunciar nem gerenciar anúncios, mude suas credenciais para vendedor';
    header("Location: ../pags/usuario.php");
}else if($_SESSION['id'] != $infos['iduser']){
    $_SESSION['msgerro1'] = 'Você não deveria estar aqui';
    header("Location: ../pags/usuario.php");
}
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
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/mainpag.css">
    <title>Anúncio - <?=$infos['titulo']?></title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
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
    <main id="login">
        <div class="logincard">
            <h1>Anunciar</h1>
            <form method="post" action="../conexao/atualizaanuncio.php?anuncio=<?=$infos['slug']?>" enctype="multipart/form-data">
                    <label for="title">Título do Produto</label>
                    <input type="text" name="title" id="title" value="<?=$infos['titulo']?>" required>
                    <label for="description">Descrição</label>
                    <textarea name="description" id="desc" cols="53" rows="5" style="border:solid #20ac35;border-radius: .3rem;resize:none; padding: .6rem; font-size: .9rem; width:100%" maxlength="220" require><?=$infos['descricao']?></textarea>
                    <label for="">Categoria</label>
                    <select name="category" id="categoria">
                        <option value="">--Selecione a Categoria</option>
                        <option value="1">Esportes</option>
                        <option value="2">Eletrônicos</option>
                        <option value="3">Moda e Acessórios</option>
                        <option value="4">Automóveis e Peças</option>
                        <option value="5">Brinquedos e Artigos Infantis</option>
                        <option value="6">Imóveis</option>
                        <option value="7">Comércio e Escritório</option>
                        <option value="8">Pets</option>
                        <option value="9">Casa e Móveis</option>
                        <option value="10">Diversos</option>
                    </select>
                    <label>Imagens:</label>
                    <input type="file" name="image">
                    <input type="file" name="image1">
                    <input type="file" name="image2">
                    <label for="value">Valor</label>
                    <input type="text" name="value" id="value" value="<?=$infos['valor']?>">
                <div class="botoes">
                    <button type="submit" name="btnEnvia">Editar</button>
                </div>
            </form>
            <form action="../conexao/deleteanuncio.php?anuncio=<?=$infos['slug']?>" method="post"><button type="submit" name="btnApaga" style="color: white; background-image: linear-gradient(to right,#aa2c2c, #a00e0e);">Apagar</button></form>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://plentz.github.io/jquery-maskmoney/javascripts/jquery.maskMoney.min.js" type="text/javascript"></script>
<script>
jQuery(function() {
    
    jQuery("#value").maskMoney({
	prefix:'R$ ', 
	thousands:'.', 
	decimal:','
})

});
</script>

</html>