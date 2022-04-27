<?php
    session_start();
    include_once("conexao.php");
    
    if(isset($_POST['btnEnvia'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $valuepost = $_POST['value'];
        $value = str_replace([','],'.', $valuepost);
        $date = date('Y-m-d');

        if(!empty($title) && !empty($description) && !empty($value) && !empty($date)){
            $result_anuncio = "INSERT INTO anuncio (iduser, titulo, descricao, data_anuncio,valor) VALUES (1, '$title', '$description', '$date', $value);
            ";
            $query_anuncio = mysqli_query($connect, $result_anuncio);
            $_SESSION['msg'] = "Anunciado com sucesso!";
            header("Location: ../pags/index.php");
        }else{
            $_SESSION['msgerro'] = "Você não preencheu os campos corretamente";
            header("Location: ../pags/anunciar.php");
        }
    }else{
        $_SESSION['msgerro'] = 'Você não tem permissões para estar naquela página';
        header("Location: ../index.php");
    }
?>