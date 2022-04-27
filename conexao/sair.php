<?php session_start();
unset($_SESSION['iduser'], $_SESSION['nome'], $_SESSION['usuario'], $_SESSION['email']);

$_SESSION['msg'] = "Desconectado com sucesso";
header("Location: ../pags/login.php");