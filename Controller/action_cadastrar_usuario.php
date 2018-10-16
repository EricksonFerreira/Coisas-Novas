<?php
	include "conexao.php";

	if(isset($_POST['nome']) && isset($_POST['user']) && isset($_POST['pass'])){


		$nome = $_POST['nome'];
		$user = $_POST['user'];
		$pass = sha1($_POST['pass']);

		$checking=("SELECT * FROM users WHERE user = ? ");

		$queryOne = $conn->prepare($checking);
		$queryOne->bindParam(1,$user);
		$queryOne -> execute();

		$stmt = $queryOne->fetchAll();

		if ($queryOne->rowCount() > 1){

?>
		<script type="text/javascript">
			alert("Este usuário já existe");
		</script>

<?php 


		} else {
			
			$sql = "INSERT INTO Users(name, user, password) VALUES (:nome, :user, :pass)";
			$query = $conn->prepare($sql);
			$query->bindParam(':nome', $nome);
			$query->bindParam(':user', $user);
			$query->bindParam(':pass', $pass);
			$stmt = $query->execute();

			header('Location: ../index.php');
		}
		
	}

?>