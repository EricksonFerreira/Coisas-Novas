<?php 	
include('conexao.php');

if (isset($_POST["query"])){
	$dado = $_POST["query"];

	$output = '';



	$checking=("SELECT * FROM pontos_turisticos WHERE nome_ponto LIKE :pesquisa");

	$checking=("SELECT * FROM pontos_turisticos WHERE nome_ponto LIKE :pesquisa");

	$queryOne = $conn->prepare($checking);
	$queryOne->bindValue(':pesquisa', '%'.$dado.'%');
	$return = $queryOne -> execute();
	
	
		$stmt = $queryOne->fetchAll();
		$output = '<ul class="listas_result">';
		if ($stmt!=null){
		
		
		for ($i = 0; $i < sizeof($stmt); $i++){
			$output .= '<li>' .$stmt[$i]['nome_ponto']. '</li>';
		
		}
	}
		else { 
			$output .= '<li> nada encontrado</li>';
	
	}
	$output .= '</ul>';
	echo $output;
}

?>
