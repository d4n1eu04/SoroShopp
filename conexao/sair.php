<?php session_start();
unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['usuario'], $_SESSION['email'],$_SESSION['telefone'], $_SESSION['cpf'], $_SESSION['local'], $_SESSION['tipo_usuario']);

$_SESSION['msg'] = "Desconectado com sucesso";
header("Location: ../pags/login.php");