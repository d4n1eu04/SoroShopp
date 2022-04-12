<?php
$server = "localhost";
$user = "root";
$psswd = "3003";
$database = "soroshopp";

$connect = mysqli_connect($server, $user, $psswd, $database);

if(!$connect){
    die ("conexao cagou");
}
?>
