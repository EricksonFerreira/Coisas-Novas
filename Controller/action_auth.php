<?php 
	require_once 'conexao.php';

	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$private = sha1($senha);

	$consulta=$conn->prepare("SELECT user AND password FROM Users WHERE user=? AND password=? ");
	$consulta->bindParam(1,$login);
	$consulta->bindParam(2,$private);
	$consulta->execute();
	
	if ($consulta->rowCount() >= 1){
		session_start();
		$_SESSION['user'] = $login;
		header('Location: ../index.php');

	} else {
		header('Location: ../index.php?error');
	}


?>