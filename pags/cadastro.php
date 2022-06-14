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
        <?php
            if(isset($_SESSION['msgerro'])){
                ?>
                    <p>
                        <?=$_SESSION['msgerro']?>
                    </p>
                <?php
                unset($_SESSION['msgerro']);
            }
        ?>
            <form action="../conexao/validacadastro.php" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" placeholder="Seu nome completo" required required>
                <label for="user">Nome de usuário</label>
                <input type="text" name="user" placeholder="" required>
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Um email válido" required>
                <label for="email">Telefone</label>
                <input type="text" name="phone" placeholder="Um telefone válido" maxlength="15" required>
                <label for="email">CPF</label>
                <input type="text" name="cpf" placeholder="Seu CPF" required>
                <label for="data_nasc">Data de Nascimento</label>
                <input type="date" name="data_nasc" required>
                <label>Cep: 
                <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
                    onblur="pesquisacep(this.value);" required /></label><br />
                <label>Rua:
                <input name="rua" type="text" id="rua" size="60" /></label><br />
                <label>Bairro:
                <input name="bairro" type="text" id="bairro" size="40" /></label><br />
                <label>Cidade:
                <input name="cidade" type="text" id="cidade" size="40" /></label><br />
                <label>Estado:
                <input name="uf" type="text" id="uf" size="2" /></label><br />
                <label>IBGE:
                <input name="ibge" type="text" id="ibge" size="8" /></label><br />
                <label for="">Complemento</label>
                <input type="text" name="comp" id="comp" required>
                <label for="tipo">Tipo de Usuário <i class="fa-solid fa-question" onclick="alert('Usuário: Apenas acessa e favorita produtos; Vendedor: Adicionalmente pode realizar anúncios')"></i></label>
                <select name="tipo" id="tipo">
                    <option value="1">Usuário</option>
                    <option value="2">Vendedor</option>
                </select>
                <label for="senha">Senha</label>
                <input type="password" id="password" name="senha" required>
                <label for="senha">Confirme a senha</label>
                <input type="password" id="confirm_password" name="senhaconf" required>
                <button type="submit" name="btnEnvia">Cadastrar</button>
            </form>
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
    <script src="../js/validasenha.js"></script>
    <script src="../js/validacep.js"></script>
</body>
</html>