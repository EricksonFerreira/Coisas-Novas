<?php 
 	require_once('conexao.php');
 	if(isset($_POST['nome_ponto']) && isset($_POST['logradouro']) && isset($_POST['bairro']) && isset($_FILES['imagem'])){
 		
 		$nome = $_POST['nome_ponto'];
		$logradouro = $_POST['logradouro'];
		$bairro = $_POST['bairro'];
		$numero = $_POST['numero'];

		//Cadastrar imagem
		$imagem = $_FILES['imagem']; //arquivo enviado
		if(isset($imagem)){
			mkdir(__DIR__.'/../upload/', 0777, true);//Cria a pasta upload e se já existir não faz nada.
			$extensao  =  strtolower(substr($imagem['name'], -4));//pega as 4 ultimas letras do nome
			$novo_nome =  "imagem_".md5(time()).$extensao;//nome do arquivo salvo
			$diretorio =  "../upload/";//onde ele será salvo
			move_uploaded_file($imagem['tmp_name'], $diretorio.$novo_nome);//mover o arquivo para o diretorio
		}	

 		
 		$sql = "INSERT INTO pontos_turisticos (nome_ponto, logradouro, bairro, numero_ponto, imagem) 
						VALUES('$nome', '$logradouro', '$bairro', '$numero', '$novo_nome')";
 		
 		$query = $conn->prepare($sql);
 		$query->bindParam(':nome', $nome);
		$query->bindParam(':logradouro', $logradouro);
		$query->bindParam(':bairro', $bairro);
		$query->bindParam(':numero', $numero);
		$query->bindParam(':imagem', $novo_nome);
 		$stmt = $query->execute();
		header('Location: ../index.php');
		
	} else {
 		echo "Erro!!";
 	}
	
  ?> 
