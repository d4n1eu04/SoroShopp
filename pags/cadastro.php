<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se no SoroShopp</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/mainpag.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/d53a163e8b.js" crossorigin="anonymous"></script>
    <script src="js/dropdown.js" defer></script>
</head>
<body>
<header>
        <div class="logo" onclick="window.location.href = '../index.php'">
          Soro<span>Shopp</span>
        </div>
        <!--<div class="search">
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
        </div>-->
    </header>
    <main id="login" class="cadastro">
        <div id="cadastro" class="logincard">
            <form action="../conexao/validacadastro.php" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" placeholder="Seu nome completo">
                <label for="user">Nome de usuário</label>
                <input type="text" name="user" placeholder="">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Um email válido">
                <label for="email">CPF</label>
                <input type="text" name="cpf" placeholder="Seu CPF">
                <label for="data_nasc">Data de Nascimento</label>
                <input type="date" name="data_nasc">
                <label for="local">CEP</label>
                <input type="text" name="local">
                <label for="rua">Rua</label>
                <input name="rua" type="text" id="rua" size="60" /></label>
                <label>Bairro</label>
                <input name="bairro" type="text" id="bairro" size="40" /></label>
                <label>Cidade
                <input name="cidade" type="text" id="cidade" size="40" /></label>
                <label for="tipo">Tipo de Usuário <i class="fa-solid fa-question" onclick="alert('Usuário: Apenas acessa e favorita produtos; Vendedor: Adicionalmente pode realizar anúncios')"></i></label>
                <div class="flexrow">
                    <input type="radio" name="tipo" value="0"><span style="margin: 0 .5em 0 .2em;">Usuário</span>
                    <input type="radio" name="tipo" value="0"><span style="margin: 0 .5em 0 .2em;">Vendedor</span>
                </div>
                <label for="senha">Senha</label>
                <input type="password" id="password" name="senha">
                <label for="senha">Confirme a senha</label>
                <input type="password" id="confirm_password" name="senhaconf">
                <button type="submit" name="btnEnvia">Cadastrar</button>
            </form>
            <p>
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
    <script src="../js/validasenha.js"></script>
</body>
</html>