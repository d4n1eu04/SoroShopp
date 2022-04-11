<?php
session_start();
include_once("conexao.php");

if(isset($_POST["btnEnvia"])){

    $user = $_POST["user"];
    $password = $_POST["passwd"];

    if((!empty($user)) && (!empty($password))){
        $joojusuario = "SELECT id, nome, usuario, email, senha FROM usuario WHERE usuario = '$user' LIMIT 1";
        $resultado_usuario = mysqli_query($connect, $joojusuario);

        if($resultado_usuario){
            $row_user = mysqli_fetch_assoc($resultado_usuario);
            echo $row_user;
            if(password_verify($password, $row_user['senha'])){
                echo "deu certo";
                $_SESSION['id'] = $row_user['id'];
                $_SESSION['nome'] = $row_user['nome'];
                $_SESSION['usuario'] = $row_user['usuario'];
                $_SESSION['email'] = $row_user['email'];
                header("Location: ../index.php");
            }else{
                $_SESSION['msgerro'] = "Credenciais inválidas!";
                header("Location: login.php");
            }
        }
    }else{
        $_SESSION['msgerro'] = "Volte à página de login e preencha os campos, caso o erro persista cadastre-se corretamente em nossa aplicação";
        header("Location: login.php");
    }
}else{
    $_SESSION['msgerro'] = 'Você deve apertar o botão "Entrar" primeiro';
    header("Location: login.php");
}
?>
