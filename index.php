<?php 
require_once('Controller/conexao.php');

	// $sql = "SELECT nome_ponto, logradouro, bairro FROM pontos_turisticos";
$consulta = $conn -> query("SELECT id, nome_ponto, logradouro, bairro, imagem FROM pontos_turisticos;"); 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Seu Ponto turistico</title>
	<link rel="stylesheet" type="text/css" href="estilos/index-style.css">
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="icon" type="image/png" href="images/icon.png">
		<!-- Barra superior -->

</head>
<body>
<div>
	<nav class="navbar navbar-default navbar-lg navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
      	<img src="/images/icon-ponto.png" alt="Brand" class="logo">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  	
      <form class="navbar-form navbar-left">
        <div class="form-group" >
       	<div class="col-lg-4">
          <input type="text" name="form-controlpesq" id="form-controlpesq" class="form-control pesq" placeholder="Pesquise um ponto" autocomplete="off">
       	
        </div>
        </div>
       
        <button type="submit" class="btn btn-default">Pesquisa</button>
        <div id="locais" class="locais"></div>
      </form>
     
      <ul class="nav navbar-nav navbar-right">

      <?php 
      	if (!isset($_SESSION['user'])){
      ?>



		<li class="menu-item4">
			<button type="button" id='cadastro' class="btn btn-info modais" data-toggle="modal" data-target="#myCadastro">Sign Up  <span class="glyphicon glyphicon-user"></span></button>
		</li>
        <li id="" class="menu-item4">
			<button type="button" id='login' class="btn btn-info modais" data-toggle="modal" data-target="#myModal">Login <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></button>
		</li>



			<?php  
				}else{
			?>			

				<ul class="nav navbar-nav">
        	<li><a href="view_cadastrar_pontos.php">Cadastrar Pontos</a></li>
      	</ul>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conta <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Perfil</a></li>
            <li><a href="#">Configurações</a></li>
            <li><a href="#">Adiministrar contas</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="Controller/action_logout.php">Logout</a></li>
          </ul>
        </li>
      <?php 
      	} 

      ?>  
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
	<!-- MODAL DE LOGIN -->
	<?php  
		if (isset($_GET['error'])){
	?>
		<div class="alert alert-danger" role="alert">Login ou senha inválido!</div>		
	<?php  }

	?>
   <!-- Primeiro modal-->
 	<div class="modal fade" id="myModal" role="dialog">
    	<div class="modal-dialog">
    
	    	<div class="modal-content">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal">&times;</button>
	          		<h2>Login</h2>
	        	</div>
	        	<div class="modal-body">
	        		<form action="Controller/action_auth.php" method="POST">
	  					<div class="form-group">
	    					<label for="login">Usuário:</label>
	    					<input type="text" class="form-control" id="login" name="login">
	  					</div>
						<div class="form-group">
							<label for="pwd">Senha:</label>
					    	<input type="password" class="form-control" id="pwd" name="senha">
						</div>
						<div class="checkbox">
	    					<label><input type="checkbox"> Lembrar de mim</label>
	  					</div>
	  					<button type="submit" class="btn btn-primary btn-block">Entrar</button>
					</form>
	        	</div>
	    	</div>
		</div>
  	</div>
	     
		<!-- Segundo modal -->
	<div class="modal fade" id="myCadastro" role="dialog">
    	<div class="modal-dialog">
    
	    	<div class="modal-content">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal">&times;</button>
	          		<h2>Cadastro</h2>
	        	</div>
	        	<div class="modal-body">
	        		<form action="Controller/action_cadastrar_usuario.php" method="POST">
	  					<div class="form-group">
	    					<label for="email">Nome:</label>
	    					<input type="text" class="form-control" id="nome" name="nome">
	  					</div>
	  					<div class="form-group">
	    					<label for="login">Usuário:</label>
	    					<input type="text" class="form-control" id="login" name="user">
	  					</div>
						<div class="form-group">
							<label for="pwd">Senha:</label>
					    	<input type="password" class="form-control" id="pwd" name="pass">
						</div>
						<div class="form-group">
							<label for="pwd">Confirme a Senha:</label>
					    	<input type="password" class="form-control" id="pwd2" name="senha2">
						</div>
						
	  					<button type="submit" class="btn btn-primary btn-block">Cadastrar-se</button>
					</form>
	        	</div>
	    	</div>
		</div>
  	</div>
		<!--Carousel -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  		<!-- Indicadores do Carousel -->
		<ol class="carousel-indicators">
  	
  	<?php   	$ativo = 0;
  			while ($ativo < 3):
	      		if ($ativo == 0) { ?>
		      		<li data-target="#myCarousel" data-slide-to="<?=$ativo?>" class="active"></li>
	    	<?php $ativo++;
	    		}else{
					if($ativo <= 2):?>
	      				<li data-target="#myCarousel" data-slide-to="<?=$ativo;?>"></li>
	      		<?php $ativo++; ?>
			  <?php endif; 		
  				}
	      	endwhile ?>

  		</ol>

  		<!-- Slides do Carousel -->
  		<div class="carousel-inner" role="listbox">
	
	<?php 	$ativoCarr = 0;
      		while($linha = $consulta -> fetch(PDO::FETCH_ASSOC)):
      		 	if ($ativoCarr == 0) {?>
	      			<div class="item active">
      		 			<a href="view_visualizar_pontos.php?id=<?=$linha['id']?>">
	        			<img style="width: 100%;height: 31em;" src="upload/<?=$linha['imagem'];?>">
      		 			</a>
	      			</div>
    <?php 	$ativoCarr++;
      			}else{
      				if ($ativoCarr <= 2): ?>	
		      			<div class="item">
							<a href="view_visualizar_pontos.php?id=<?=$linha['id']?>">
		        			<img style="width: 100%;height: 31em;" src="upload/<?=$linha['imagem'];?>">
		        			</a>
		      			</div>
      		<?php 	$ativoCarr++;
      			 	endif;
      			};
      		endwhile; ?>
		
			<!-- Controles de Direita e Esquerda -->
		    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left"></span>
		      <span class="sr-only">Anterior</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right"></span>
		      <span class="sr-only">Próximo</span>
		    </a>
		</div>		
	</div>	
	<!-- Footer -->
	<div id="foot"></div>
		<footer class="page-footer font-small blue">
		  	<!-- Copyright -->
			<div class="footer-copyright text-center py-3">© 2018 Copyright:<strong>IFPE</strong></div>
		</footer>
	</div>

</body>
</html>

<script>//Função de pesquisa, Auto complete Input
$(document).ready(function(){
$('#form-controlpesq').keyup(function() {
var query = $(this).val();
	if(query != ''){
	
$.ajax({
	url:"Controller/action_search.php",
	method:"POST",
	data:{query:query},
	success:function(data)
	{
$('#locais').fadeIn();
$('#locais').html(data);
	
}
   });
	  }
    });
});
    $(document).on('click', 'li', function(){
    $('#form-controlpesq').val($(this) .text());
    $('#locais') .fadeOut();
	});
    </script>