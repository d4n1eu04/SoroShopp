<?php
session_start();
include_once("conexao.php");
$produto_query = "SELECT * FROM anuncio INNER JOIN usuario on anuncio.iduser = usuario.iduser INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE slug = '".$_GET['anuncio']."' LIMIT 1";
$run_query = mysqli_query($connect, $produto_query);
$infos = mysqli_fetch_assoc($run_query);

if(isset($_POST['btnEnvia'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $value = $_POST['value'];
    $category = $_POST['category'];
    $slug = $infos['slug'];
    $idanuncio = $infos['idanuncio'];
    $img1 = $infos['arquivo'];
    $img2 = $infos['arquivo1'];
    $img3 = $infos['arquivo2'];
    $fileName1 = "";
    $fileName2 = "";
    $fileName3 = "";
    $fileType1 = "";
    $fileType2 = "";
    $fileType3 = "";
    if(!empty($title) && !empty($description) && !empty($value)){
        $anuncioexiste = "SELECT * FROM anuncio INNER JOIN usuario on anuncio.iduser = usuario.iduser INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE slug = '$slug'";
        $query = mysqli_query($connect, $anuncioexiste);
        if(mysqli_num_rows($query) == 0){
            $_SESSION['msgerro'] = "Desculpa, houve um problema requisitando o anuncio em questão";
            header("Location: ../conexao/atualizaanuncio.php");  
        }else{
            if(!empty($_FILES["image"]["name"])){$fileName1 = generateRandomString(20).basename($_FILES["image"]["name"]);}
            if(!empty($_FILES["image1"]["name"])){$fileName2 = generateRandomString(20).($_FILES["image1"]["name"]);}
            if(!empty($_FILES["image2"]["name"])){$fileName3 = generateRandomString(20).($_FILES["image2"]["name"]);}
            $targetDir = "./../arquivos/";
            if(!empty($fileName1)){$fileType1 = pathinfo($fileName1, PATHINFO_EXTENSION);}
            if(!empty($fileName2)){$fileType2 = pathinfo($fileName2, PATHINFO_EXTENSION);}
            if(!empty($fileName3)){$fileType3 = pathinfo($fileName3, PATHINFO_EXTENSION);}
            $allowTypes = array('jpg','png','jpeg','gif');

            if(!empty($_FILES["image"]["name"]) && !empty($_FILES["image1"]["name"]) && !empty($_FILES["image2"]["name"])){
                if(in_array($fileType1, $allowTypes) && in_array($fileType2, $allowTypes) && in_array($fileType3, $allowTypes)){
                    unlink($targetDir . $img1);
                    unlink($targetDir . $img2);
                    unlink($targetDir . $img3);
                    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir .$fileName1) && move_uploaded_file($_FILES["image1"]["tmp_name"], $targetDir .$fileName2) && move_uploaded_file($_FILES["image2"]["tmp_name"], $targetDir .$fileName3)){
                        if(empty($category)){
                            $updateanuncio = "UPDATE anuncio SET titulo = '$title', descricao = '$description', valor = '$value' WHERE idanuncio = '$idanuncio'";
                            $run = mysqli_query($connect, $updateanuncio);
                        }else{
                            $updateanuncio = "UPDATE anuncio SET titulo = '$title', descricao = '$description', valor = '$value', idcategoria = '$category' WHERE idanuncio = '$idanuncio'";
                            $run = mysqli_query($connect, $updateanuncio);
                        }
                        $updateimgs = "UPDATE imganuncio SET arquivo = '$fileName1', arquivo1 = '$fileName2', arquivo2 = '$fileName3' WHERE idanuncio = '$idanuncio'";
                        $runimg = mysqli_query($connect, $updateimgs);
                        
                        if($run && $runimg){
                            $_SESSION['msg'] = "Editado com sucesso!";
                            header("Location: ../pags/produto.php?produto=".$slug."");
                        }else{
                            $_SESSION['msgerro'] = "Tente novamente, caso o erro persista mude as informações";
                            header("Location: ../pags/editaranuncio.php");
                        }
                    }else{
                        $_SESSION['msgerro'] = "Erro ao inserir imagem";
                        header("Location: ../pags/editaranuncio.php");
                    }
                }else{
                    $_SESSION['msgerro'] = "Tipo de arquivo não suportado";
                    header("Location: ../conexao/atualizaanuncio.php");
                }
            }
            //caso apenas imagens 1 e 2
            if(!empty($_FILES["image"]["name"]) && !empty($_FILES["image1"]["name"]) && empty($_FILES['image2']['name'])){
                if(in_array($fileType1, $allowTypes) && in_array($fileType2, $allowTypes)){
                    unlink($targetDir . $img1);
                    unlink($targetDir . $img2);
                    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir .$fileName1) && move_uploaded_file($_FILES["image1"]["tmp_name"], $targetDir .$fileName2)){
                        if(empty($category)){
                            $updateanuncio = "UPDATE anuncio SET titulo = '$title', descricao = '$description', valor = '$value' WHERE idanuncio = '$idanuncio'";
                            $run = mysqli_query($connect, $updateanuncio);
                        }else{
                            $updateanuncio = "UPDATE anuncio SET titulo = '$title', descricao = '$description', valor = '$value', idcategoria = '$category' WHERE idanuncio = '$idanuncio'";
                            $run = mysqli_query($connect, $updateanuncio);
                        }

                        $updateimgs = "UPDATE imganuncio SET arquivo = '$fileName1', arquivo1 = '$fileName2' WHERE idanuncio = '$idanuncio'";
                        $runimg = mysqli_query($connect, $updateimgs);
                        
                        if($run && $runimg){
                            $_SESSION['msg'] = "Editado com sucesso!";
                            header("Location: ../pags/produto.php?produto=".$slug."");
                        }else{
                            $_SESSION['msgerro'] = "Tente novamente, caso o erro persista mude as informações";
                            header("Location: ../pags/editaranuncio.php");
                        }
                    }else{
                        $_SESSION['msgerro'] = "Erro ao inserir imagem";
                        header("Location: ../pags/editaranuncio.php");
                    }
                }else{
                    $_SESSION['msgerro'] = "Tipo de arquivo não suportado";
                    header("Location: ../conexao/atualizaanuncio.php");
                }
            }
            //caso apenas imagens 1 e 3
            if(!empty($_FILES["image"]["name"]) && !empty($_FILES["image2"]["name"]) && empty($_FILES['image1']['name'])){
                if(in_array($fileType1, $allowTypes) && in_array($fileType3, $allowTypes)){
                    unlink($targetDir . $img1);
                    unlink($targetDir . $img3);
                    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir .$fileName1) && move_uploaded_file($_FILES["image2"]["tmp_name"], $targetDir .$fileName3)){
                        if(empty($category)){
                            $updateanuncio = "UPDATE anuncio SET titulo = '$title', descricao = '$description', valor = '$value' WHERE idanuncio = '$idanuncio'";
                            $run = mysqli_query($connect, $updateanuncio);
                        }else{
                            $updateanuncio = "UPDATE anuncio SET titulo = '$title', descricao = '$description', valor = '$value', idcategoria = '$category' WHERE idanuncio = '$idanuncio'";
                            $run = mysqli_query($connect, $updateanuncio);
                        }

                        $updateimgs = "UPDATE imganuncio SET arquivo = '$fileName1', arquivo2 = '$fileName3' WHERE idanuncio = '$idanuncio'";
                        $runimg = mysqli_query($connect, $updateimgs);
                        
                        if($run && $runimg){
                            $_SESSION['msg'] = "Editado com sucesso!";
                            header("Location: ../pags/produto.php?produto=".$slug."");
                        }else{
                            $_SESSION['msgerro'] = "Tente novamente, caso o erro persista mude as informações";
                            header("Location: ../pags/editaranuncio.php");
                        }
                    }else{
                        $_SESSION['msgerro'] = "Erro ao inserir imagem";
                        header("Location: ../pags/editaranuncio.php");
                    }
                }else{
                    $_SESSION['msgerro'] = "Tipo de arquivo não suportado";
                    header("Location: ../conexao/atualizaanuncio.php");
                }
            }
             //caso apenas imagens 2 e 3
            if(!empty($_FILES["image1"]["name"]) && !empty($_FILES["image2"]["name"]) && empty($_FILES['image']['name'])){
                if(in_array($fileType2, $allowTypes) && in_array($fileType3, $allowTypes)){
                    unlink($targetDir . $img2);
                    unlink($targetDir . $img3);
                    if(move_uploaded_file($_FILES["image1"]["tmp_name"], $targetDir .$fileName2) && move_uploaded_file($_FILES["image2"]["tmp_name"], $targetDir .$fileName3)){
                        if(empty($category)){
                            $updateanuncio = "UPDATE anuncio SET titulo = '$title', descricao = '$description', valor = '$value' WHERE idanuncio = '$idanuncio'";
                            $run = mysqli_query($connect, $updateanuncio);
                        }else{
                            $updateanuncio = "UPDATE anuncio SET titulo = '$title', descricao = '$description', valor = '$value', idcategoria = '$category' WHERE idanuncio = '$idanuncio'";
                            $run = mysqli_query($connect, $updateanuncio);
                        }
                        $updateimgs = "UPDATE imganuncio SET arquivo1 = '$fileName2', arquivo2 = '$fileName3' WHERE idanuncio = '$idanuncio'";
                        $runimg = mysqli_query($connect, $updateimgs);
                        
                        if($run && $runimg){
                            $_SESSION['msg'] = "Editado com sucesso!";
                            header("Location: ../pags/produto.php?produto=".$slug."");
                        }else{
                            $_SESSION['msgerro'] = "Tente novamente, caso o erro persista mude as informações";
                            header("Location: ../pags/editaranuncio.php");
                        }
                    }else{
                        $_SESSION['msgerro'] = "Erro ao inserir imagem";
                        header("Location: ../pags/editaranuncio.php");
                    }
                }else{
                    $_SESSION['msgerro'] = "Tipo de arquivo não suportado";
                    header("Location: ../conexao/atualizaanuncio.php");
                }
            }
            //caso apenas imagem 1
            if(!empty($_FILES["image"]["name"]) && empty($_FILES["image1"]["name"]) && empty($_FILES['image2']['name'])){
                if(in_array($fileType1, $allowTypes)){
                    unlink($targetDir . $img1);
                    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir .$fileName1)){
                        if(empty($category)){
                            $updateanuncio = "UPDATE anuncio SET titulo = '$title', descricao = '$description', valor = '$value' WHERE idanuncio = '$idanuncio'";
                            $run = mysqli_query($connect, $updateanuncio);
                        }else{
                            $updateanuncio = "UPDATE anuncio SET titulo = '$title', descricao = '$description', valor = '$value', idcategoria = '$category' WHERE idanuncio = '$idanuncio'";
                            $run = mysqli_query($connect, $updateanuncio);
                        }
                        $updateimgs = "UPDATE imganuncio SET arquivo = '$fileName1' WHERE idanuncio = '$idanuncio'";
                        $runimg = mysqli_query($connect, $updateimgs);
                        
                        if($run && $runimg){
                            $_SESSION['msg'] = "Editado com sucesso!";
                            header("Location: ../pags/produto.php?produto=".$slug."");
                        }else{
                            $_SESSION['msgerro'] = "Tente novamente, caso o erro persista mude as informações";
                            header("Location: ../pags/editaranuncio.php");
                        }
                    }else{
                        $_SESSION['msgerro'] = "Erro ao inserir imagem";
                        header("Location: ../pags/editaranuncio.php");
                    }
                }else{
                    $_SESSION['msgerro'] = "Tipo de arquivo não suportado";
                    header("Location: ../conexao/atualizaanuncio.php");
                }
            }
            //caso apenas imagem 2
            if(!empty($_FILES["image1"]["name"]) && empty($_FILES["image"]["name"]) && empty($_FILES['image2']['name'])){
                if(in_array($fileType2, $allowTypes)){
                    unlink($targetDir . $img2);
                    if(move_uploaded_file($_FILES["image1"]["tmp_name"], $targetDir .$fileName2)){
                        if(empty($category)){
                            $updateanuncio = "UPDATE anuncio SET titulo = '$title', descricao = '$description', valor = '$value' WHERE idanuncio = '$idanuncio'";
                            $run = mysqli_query($connect, $updateanuncio);
                        }else{
                            $updateanuncio = "UPDATE anuncio SET titulo = '$title', descricao = '$description', valor = '$value', idcategoria = '$category' WHERE idanuncio = '$idanuncio'";
                            $run = mysqli_query($connect, $updateanuncio);
                        }
                        $updateimgs = "UPDATE imganuncio SET arquivo1 = '$fileName2' WHERE idanuncio = '$idanuncio'";
                        $runimg = mysqli_query($connect, $updateimgs);
                        
                        if($run && $runimg){
                            $_SESSION['msg'] = "Editado com sucesso!";
                            header("Location: ../pags/produto.php?produto=".$slug."");
                        }else{
                            $_SESSION['msgerro'] = "Tente novamente, caso o erro persista mude as informações";
                            header("Location: ../pags/editaranuncio.php");
                        }
                    }else{
                        $_SESSION['msgerro'] = "Erro ao inserir imagem";
                        header("Location: ../pags/editaranuncio.php");
                    }
                }else{
                    $_SESSION['msgerro'] = "Tipo de arquivo não suportado";
                    header("Location: ../conexao/atualizaanuncio.php");
                }
            }
            //caso apenas imagem 3
            if(!empty($_FILES["image2"]["name"]) && empty($_FILES["image1"]["name"]) && empty($_FILES['image']['name'])){
                if(in_array($fileType3, $allowTypes)){
                    unlink($targetDir . $img3);
                    if(move_uploaded_file($_FILES["image2"]["tmp_name"], $targetDir .$fileName3)){
                        if(empty($category)){
                            $updateanuncio = "UPDATE anuncio SET titulo = '$title', descricao = '$description', valor = '$value' WHERE idanuncio = '$idanuncio'";
                            $run = mysqli_query($connect, $updateanuncio);
                        }else{
                            $updateanuncio = "UPDATE anuncio SET titulo = '$title', descricao = '$description', valor = '$value', idcategoria = '$category' WHERE idanuncio = '$idanuncio'";
                            $run = mysqli_query($connect, $updateanuncio);
                        }
                        $updateimgs = "UPDATE imganuncio SET arquivo2 = '$fileName3' WHERE idanuncio = '$idanuncio'";
                        $runimg = mysqli_query($connect, $updateimgs);
                        
                        if($run && $runimg){
                            $_SESSION['msg'] = "Editado com sucesso!";
                            header("Location: ../pags/produto.php?produto=".$slug."");
                        }else{
                            $_SESSION['msgerro'] = "Tente novamente, caso o erro persista mude as informações";
                            header("Location: ../pags/editaranuncio.php");
                        }
                    }else{
                        $_SESSION['msgerro'] = "Erro ao inserir imagem";
                        header("Location: ../pags/editaranuncio.php");
                    }
                }else{
                    $_SESSION['msgerro'] = "Tipo de arquivo não suportado";
                    header("Location: ../conexao/atualizaanuncio.php");
                }
            }
            if(empty($_FILES["image"]["name"]) && empty($_FILES["image1"]["name"]) && empty($_FILES["image2"]["name"])){
                if(empty($category)){
                    $updateanuncio = "UPDATE anuncio SET titulo = '$title', descricao = '$description', valor = '$value' WHERE idanuncio = '$idanuncio'";
                    $run = mysqli_query($connect, $updateanuncio);
                }else{
                    $updateanuncio = "UPDATE anuncio SET titulo = '$title', descricao = '$description', valor = '$value', idcategoria = '$category' WHERE idanuncio = '$idanuncio'";
                    $run = mysqli_query($connect, $updateanuncio);
                }
                    if($run){
                    $_SESSION['msg'] = "Editado com sucesso!";
                    header("Location: ../pags/produto.php?produto=".$slug."");
                }else{
                    $_SESSION['msgerro'] = "Tente novamente, caso o erro persista mude as informações";
                    header("Location: ../pags/editaranuncio.php");
                }
            }
        }
    }else{
            $_SESSION['msgerro'] = "Você não preencheu os campos corretamente";
            header("Location: ../pags/editaranuncio.php");
        }
    }else{
    $_SESSION['msgerro'] = 'Você não tem permissões para estar naquela página';
    header("Location: ../index.php");
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