<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cadastro de Usuários</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="estilos/Login_Style1.css">
</head>
<body id="cadastrarphp">

<div class="wrapper fadeInDown">
  <div id="formContent"> 
    <!-- Guias de Titulos -->
   <h1 class="logo-caption"><span class="tweak">C</span>adastro</h1>

	    <!-- Login do Formulario -->
	    <form action="Controller/action_cadastrar_usuario.php" method="POST">
	      <input type="text" id="nome" class="fadeIn second" name="nome" required="" placeholder="Nome">
	      <input type="text" id="usuario" class="fadeIn second" name="user" required="" placeholder="Usuario">
	      <input type="password" id="password" class="fadeIn third" name="pass" required="" placeholder="Senha">
	      <input type="submit" class="fadeIn fourth" value="Cadastrar"><br>
	      <a href="index.php">Voltar</a>
	    </form>
  </div>
</div>
	
</body>
</html>