<?php
    session_start();
    if(!$_SESSION['id'] && !$_SESSION['nome'] && !$_SESSION['usuario'] && !$_SESSION['email']){
        $_SESSION['msgerro1'] = 'Você não está conectado';
        header("Location: ../pags/login.php");
    }else if($_SESSION['tipo_user'] <= 1){
        $_SESSION['msgerro1'] = 'Você não pode anunciar, mude suas credenciais para vendedor';
        header("Location: ../pags/usuario.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anunciar - SoroShopp</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/mainpag.css">
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
    <main id="login">
        <div class="logincard">
            <h1>Anunciar</h1>
            <form method="post" action="../conexao/anuncio.php" >
                    <label for="title">Título do Produto</label>
                    <input type="text" name="title" id="title" required>
                    <label for="description">Descrição</label>
                    <textarea name="description" id="desc" cols="53" rows="5" style="border:solid #20ac35;border-radius: .3rem;resize:none; padding: .6rem; font-size: .9rem; width:100%" maxlength="220"></textarea>
                    <label for="">Categoria</label>
                    <select name="category" id="categoria">
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
                    <label for="value">Valor</label>
                    <input type="text" name="value" id="value">
                <div class="botoes">
                    <button type="submit" name="btnEnvia">Anunciar</button>
                </div>
            </form>
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