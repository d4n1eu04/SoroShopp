<?php
session_start();
include_once("conexao.php");
if(isset($_POST["btnEnvia"])){
    $user = $_POST["user"];
    $password = $_POST["passwd"];
    if((!empty($user)) && (!empty($password))){
        $result_user = "SELECT * FROM usuario WHERE (username = '$user') or (email = '$user')LIMIT 1";
        $resultado_usuario = mysqli_query($connect, $result_user);
        if($resultado_usuario){
            $row_user = mysqli_fetch_assoc($resultado_usuario);
            if(password_verify($password, $row_user['senha'])){
                $_SESSION['id'] = $row_user['iduser'];
                $_SESSION['nome'] = $row_user['nome'];
                $_SESSION['usuario'] = $row_user['username'];
                $_SESSION['email'] = $row_user['email'];
                $_SESSION['telefone'] = $row_user['telefone'];
                $_SESSION['cpf'] = $row_user['cpf'];
                $_SESSION['local'] = $row_user['local'];
                $_SESSION['tipo_user'] = $row_user['tipo_usuario'];
                header("Location: ../pags/usuario.php");
            }else{
                $_SESSION['msgerro'] = "Credenciais inválidas!";
                header("Location: ../pags/login.php");
            }
        }
    }else{
        $_SESSION['msgerro'] = "Volte à página de login e preencha os campos, caso o erro persista cadastre-se corretamente em nossa aplicação";
        header("Location: ../pags/login.php");
    }
}else{
    $_SESSION['msgerro'] = 'Você deve apertar o botão "Entrar" primeiro';
    header("Location: ../pags/login.php");
}
?>
