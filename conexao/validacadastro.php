<?php
    session_start();
    include_once("conexao.php");

    if(isset($_POST['btnEnvia'])){
        $nome = $_POST['nome'];
        $usuario = $_POST['user'];
        $email = $_POST['email'];
        $data_nasc = $_POST['data_nasc'];
        $local = $_POST['local'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        
        if(!empty($nome) && !empty($usuario) && !empty($email) && !empty($senha)&& str_contains($email, '@')){
            $result_cadastro = "INSERT INTO usuario (nome, username, data_nasc, local,tipo_usuario, email, senha) VALUES ('$nome', '$usuario', '$data_nasc', '$local', 1, '$email', '$senha');
            ";
            $query_usuario = mysqli_query($connect, $result_cadastro);
            $_SESSION['msg'] = "Cadastrado com sucesso!";
            header("Location: ../pags/login.php");
        }else{
            $_SESSION['msgerro'] = "Insira um email válido e/ou preencha os campos corretamente";
            header("Location: ../pags/cadastro.php");
        }
    }else{
        $_SESSION['msgerro'] = 'Você não deveria estar aqui';
        header("Location: ../pags/cadastro.php");
    }
?>/