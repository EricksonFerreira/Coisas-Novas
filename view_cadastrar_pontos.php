<?php

session_start();
if (!isset($_SESSION['user'])) {
	header('location: login.php');
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Cadastrar Pontos Turísticos </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">
</head>
<style type="text/css">
	body {

		margin-top: 25px;
	}

	form {
		margin-top: 50px;
	}
</style>
<body>
	<div class="ui container">
		<h1> Cadastro de Pontos Turísticos </h1>
		<form method="post" action="Controller/action_cadastrar_ponto.php" class="ui form" enctype="multipart/form-data">
			<label><h3>Nome do Ponto Turístico </h3></label>
			<input type="text" name="nome_ponto" placeholder="Nome do Ponto Turístico" required=""><br><br>
			<label> <h3>Logradouro </h3></label>
			<input type="text" name="logradouro" placeholder="Logradouro" required=""><br><br>
			<label> <h3>Bairro </h3></label>
			<input type="text" name="bairro" placeholder="Bairro" required=""><br><br>
			<label> <h3>Número </h3></label>
			<input type="text" name="numero" placeholder="Número" ><br><br>
			<label> <h3>Imagem </h3></label>
			<input type="file" name="imagem" placeholder="Imagem" ><br><br>
			<input type="submit" value="Cadastrar" class="ui primary button">
		</form>
	</div>
</body>
</html>
