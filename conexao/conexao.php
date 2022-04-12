<?php
$server = "localhost";
$user = "root";
$psswd = "3003"; 
/*
    caso dê erro apague a senha, 3003 é a senha do servidor no meu LAMP (Linux, Apache, MySQL, PHP)
*/
$database = "soroshopp";

$connect = mysqli_connect($server, $user, $psswd, $database);

if(!$connect){
    die ("Credencias do banco inválidas");
}
?>
