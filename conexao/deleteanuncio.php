<?php
session_start();
include_once("conexao.php");

if(isset($_POST['btnApaga'])){
    $produto_query = "SELECT * FROM anuncio INNER JOIN usuario on anuncio.iduser = usuario.iduser INNER JOIN imganuncio on anuncio.idanuncio = imganuncio.idanuncio WHERE slug = '".$_GET['anuncio']."' LIMIT 1";
    $run_query = mysqli_query($connect, $produto_query);
    $infos = mysqli_fetch_assoc($run_query);
    $idanuncio = $infos['idanuncio'];
    $img1 = $infos['arquivo'];
    $img2 = $infos['arquivo1'];
    $img3 = $infos['arquivo2'];
    $targetDir = "./../arquivos/";

    $deleteanuncio = mysqli_query($connect, "DELETE FROM anuncio WHERE idanuncio = '$idanuncio'");
    $deleteanuncioimgs = mysqli_query($connect, "DELETE FROM imganuncio WHERE idanuncio = '$idanuncio'");

    unlink($targetDir . $img1);
    unlink($targetDir . $img2);
    unlink($targetDir . $img3);

    $_SESSION['msg'] = "Anuncio excluido!";
    header("Location: ../pags/usuario.php");
}else{
    $_SESSION['msgerro'] = "Você não devia estar aqui!";
    header("Location: ../pags/editaranuncio.php");
}