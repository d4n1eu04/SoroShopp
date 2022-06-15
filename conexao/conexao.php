<?php
$server = "localhost";
$user = "root";
$psswd = "3003";
$database = "soroshopp";
/*
    Caso ocorra um erro na conexão, tente deixar vazia a variável da senha
*/
$connect = mysqli_connect($server, $user, $psswd, $database);

if(!$connect){
    die ("Credencias do banco inválidas" . mysqli_error($erro));
}
?>
