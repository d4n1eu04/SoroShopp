<?php
session_start();
include_once('conexao.php');

if(isset($_POST['btnEnvia1'])){
$usuario = $_GET['usuario'];
$user_existe = mysqli_query($connect, "SELECT * FROM usuario WHERE username = '$usuario'");
$iduser = $_SESSION['id'];
if(mysqli_num_rows($user_existe) != 0){

    $nome = trim(ucwords($_POST['nome']));
    $telefone = trim($_POST['phone']);
    $tipo = $_POST['tipo'];
    if(!empty($nome) && !empty($telefone) && !empty($tipo)){
        if (preg_match('/[\'\\/^£$%&*()}{@#~?><>,|=_+¬\-0-9]/', $nome)){
            $_SESSION['msgerro'] = "Seu nome não pode conter caracteres especiais nem números";
            header("Location: ../pags/editauser.php?usuario=".$usuario."");
        }
        if(!preg_match('/\(?\d{2}\)?\s?\d{5}\-?\d{4}/', $telefone))
            {
                $_SESSION['msgerro'] = "Telefone inválido";
                header("Location: ../pags/editauser.php?usuario=".$usuario."");
            }
        $telefone = (int)str_replace(" ","",preg_replace('/[\'\\/^£$%&*()}{@#~?><>,|=_+¬\-]/', "",$telefone));
        
        $update_user = mysqli_query($connect, "UPDATE usuario SET nome = '$nome', telefone = '$telefone', tipo_usuario = '$tipo' WHERE iduser = '$iduser'");
        if($update_user){
            $_SESSION['msg'] = 'Alterado com sucesso';
            $_SESSION['nome'] = $nome;
            $_SESSION['telefone'] = $telefone;
            $_SESSION['tipo_user'] = $tipo;
            header("Location: ../pags/usuario.php");
        }else{
            $_SESSION['msgerro'] = 'Erro! Caso o erro persista mude as informações';
            header("Location: ../pags/editauser.php?usuario=".$usuario."");
        }
    }else{
        $_SESSION['msgerro'] = 'Preencha os campos corretamente!';
        header("Location: ../pags/editauser.php?usuario=".$usuario."");
    }
}else{
    $_SESSION['msgerro'] = 'Erro! Usuario não encontrado no Banco de Dados';
    header("Location: ../pags/editauser.php?usuario=".$usuario."");
}
}else{
    $_SESSION['msgerro'] = 'Você não tem permissões para estar naquela página';
    header("Location: ../index.php");
}
