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
        $iduser = $_SESSION['id'];
        if(!empty($title) && !empty($description) && !empty($value) && !empty($date) && !empty($category)){
            $result_existe = "SELECT * FROM anuncio INNER JOIN usuario ON anuncio.iduser = usuario.iduser WHERE slug = '$slug'";
            $query_result_existe = mysqli_query($connect, $result_existe);
            
            if(mysqli_num_rows($query_result_existe) != 0){
                $_SESSION['msgerro'] = "Você já contém um anuncio com o exato mesmo nome";
                header("Location: ../pags/anunciar.php");    
            }else{
                $result_anuncio = "INSERT INTO anuncio (iduser, titulo, descricao, data_anuncio,valor, idcategoria, slug) VALUES ('$iduser', '$title', '$description', '$date', '$value', $category, '$slug');";
                $query_anuncio = mysqli_query($connect, $result_anuncio);
                
                if(mysqli_affected_rows($connect) != 0){
                    $result_existe1 = "SELECT * FROM anuncio INNER JOIN usuario ON anuncio.iduser = usuario.iduser WHERE slug = '$slug'";
                    $query = mysqli_query($connect, $result_existe1);

                    if(mysqli_num_rows($query) != 0){
                        $infoinsereimagem = mysqli_fetch_assoc($query);
                        $idanuncio = $infoinsereimagem['idanuncio'];
                        $status = $statusMsg = ''; 
                        if(!empty($_FILES["image"]["name"]) && !empty($_FILES["image1"]["name"]) && !empty($_FILES["image2"]["name"])){
                        $targetDir = "./../arquivos/";
                        $fileName1 = generateRandomString(20).basename($_FILES["image"]["name"]);
                        $fileName2 = generateRandomString(20).($_FILES["image1"]["name"]);
                        $fileName3 = generateRandomString(20).($_FILES["image2"]["name"]);

                        $fileSize1 = $_FILES["image"]["size"];
                        $fileSize2 = $_FILES["image1"]["size"];
                        $fileSize3 = $_FILES["image2"]["size"];                        
                        $targetFilePath1 = $targetDir . $fileName1;
                        $targetFilePath2 = $targetDir . $fileName2;
                        $targetFilePath3 = $targetDir . $fileName3;

                        $fileType1 = pathinfo($fileName1, PATHINFO_EXTENSION);
                        $fileType2 = pathinfo($fileName2, PATHINFO_EXTENSION);
                        $fileType3 = pathinfo($fileName3, PATHINFO_EXTENSION);
                        
                        // Allow certain file formats 
                        $allowTypes = array('jpg','png','jpeg','gif'); 
                        if(in_array($fileType1, $allowTypes) && in_array($fileType2, $allowTypes) && in_array($fileType3, $allowTypes)){ 
                            $image1 = $_FILES['image']['tmp_name']; 
                            $image2 = $_FILES['image1']['tmp_name'];
                            $image3 = $_FILES['image2']['tmp_name'];
                            criaPasta($targetDir);
                            
                            if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir .$fileName1) && move_uploaded_file($_FILES["image1"]["tmp_name"], $targetDir .$fileName2) && move_uploaded_file($_FILES["image2"]["tmp_name"], $targetDir .$fileName3)){
                                $queryimg = "INSERT INTO imganuncio (idanuncio, arquivo, arquivo1, arquivo2) VALUES ('$idanuncio', '$fileName1', '$fileName2', '$fileName3')";
                                //Insert image content into database
                                $insert = mysqli_query($connect, $queryimg); 
                                if($insert){ 
                                    $status = 'success'; 
                                    $statusMsg = "Arquivo enviado com sucesso."; 
                                    $_SESSION['msg'] = "Anunciado com sucesso!";
                                    header("Location: ../pags/usuario.php");
                                }else{  
                                    $delete = mysqli_query($connect, "DELETE FROM anuncio WHERE idanuncio = $idanuncio");
                                    unlink($targetFilePath1);
                                    unlink($targetFilePath2);
                                    unlink($targetFilePath3);
                                    $statusMsg = "Erro no envio do arquivo."; 
                                    header("Location: ../pags/anuncio.php");
                                }
                            }else{ 
                                $delete = mysqli_query($connect, "DELETE FROM anuncio WHERE idanuncio = $idanuncio");
                                $_SESSION['msgerro'] = "Erro ao anunciar, tente novamente, caso o erro persista, mude as informações!";
                                header("Location: ../pags/anunciar.php");
                            }
                        }else{ 
                            $delete = mysqli_query($connect, "DELETE FROM anuncio WHERE idanuncio = $idanuncio");
                            $_SESSION['msgerro'] = "Erro ao anunciar, tente novamente, caso o erro persista, mude as informações!";
                            header("Location: ../pags/anunciar.php");
                        }
                    }else{  
                            $delete = mysqli_query($connect, "DELETE FROM anuncio WHERE idanuncio = $idanuncio");
                            $_SESSION['msgerro'] = "Erro ao anunciar, tente novamente, caso o erro persista, mude as informações!";
                            header("Location: ../pags/anunciar.php");
                    } 
} }
                else{
                    $_SESSION['msgerro'] = "Erro ao anunciar, tente novamente";
                    header("Location: ../pags/anunciar.php");
                }
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
    $slug=  $slug.generateRandomString(50);
    return $slug;
}

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function criaPasta($dir){
    if(!is_dir($dir)){
        mkdir($dir);
    }else{
        return null;
    }
}
?>