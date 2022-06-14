<?php
    session_start();
    include_once("conexao.php");
    
    if(isset($_POST['btnEnvia'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $value = $_POST['value'];
        $category = $_POST['category'];
        $slug = fixForUri($_POST['title']);
        $date = date('Y-m-d');

        if(!empty($title) && !empty($description) && !empty($value) && !empty($date)){
            $result_existe = "SELECT * FROM anuncio INNER JOIN usuario ON anuncio.iduser = usuario.iduser WHERE slug = '$slug'";
            $query_result_existe = mysqli_query($connect, $result_existe);
            
            if(mysqli_num_rows($query_result_existe) != 0){
                $_SESSION['msgerro'] = "Você já contém um anuncio com o exato mesmo nome";
                header("Location: ../pags/anunciar.php");
            }else{
                $result_anuncio = "INSERT INTO anuncio (iduser, titulo, descricao, data_anuncio,valor, idcategoria, slug) VALUES ('".$_SESSION['id']."', '$title', '$description', '$date', '$value', $category, '$slug');
                ";
                $query_anuncio = mysqli_query($connect, $result_anuncio);
                $_SESSION['msg'] = "Anunciado com sucesso!";
                header("Location: ../pags/usuario.php");
            }
        }else{
            $_SESSION['msgerro'] = "Você não preencheu os campos corretamente";
            header("Location: ../pags/anunciar.php");
        }
    }else{
        $_SESSION['msgerro'] = 'Você não tem permissões para estar naquela página';
        header("Location: ../index.php");
}
function fixForUri($string){
    $slug = trim($string);
    $slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug );
    $slug= str_replace(' ','-', $slug); 
    $slug= strtolower($slug);
    $slug=  $slug.generateRandomString();
    return $slug;
}

function generateRandomString($length = 50) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>